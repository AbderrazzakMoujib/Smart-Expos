<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Contact;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPhoto;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ExternalLeadsService;

class DashboardController extends Controller
{
    /* ──────────────────────────────────────────
       LOGIN
    ────────────────────────────────────────── */

    public function loginForm()
    {
        if (session('dashboard_user')) {
            return redirect()->route('dashboard.home');
        }
        return view('Dashboard.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->whereNotNull('dashboard_role')
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
        }

        session([
            'dashboard_user' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->dashboard_role,
            ]
        ]);

        return redirect()->route('dashboard.home');
    }

    public function logout()
    {
        session()->forget('dashboard_user');
        return redirect()->route('dashboard.login');
    }

    /* ──────────────────────────────────────────
       REDIRECT TO ROLE-BASED DASHBOARD
    ────────────────────────────────────────── */

    public function home()
    {
        $role = session('dashboard_user.role');

        return match($role) {
            'admin'      => redirect()->route('dashboard.admin'),
            'commercial' => redirect()->route('dashboard.commercial'),
            'marketing'  => redirect()->route('dashboard.marketing'),
            default      => redirect()->route('dashboard.login'),
        };
    }

    /* ──────────────────────────────────────────
       ADMIN DASHBOARD
    ────────────────────────────────────────── */

    public function admin()
    {
        $stats = [
            'contacts'  => Contact::count(),
            'posts'     => Post::count(),
            'published' => Post::where('status', 'PUBLISHED')->count(),
            'users'     => User::whereNotNull('dashboard_role')->count(),
        ];

        $recentContacts = Contact::latest()->take(8)->get();
        $recentPosts    = Post::latest()->take(6)->get();
        $dashboardUsers = User::whereNotNull('dashboard_role')->get();

        return view('Dashboard.admin', compact('stats', 'recentContacts', 'recentPosts', 'dashboardUsers'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:8',
            'dashboard_role' => 'required|in:admin,commercial,marketing',
        ]);

        User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'dashboard_role' => $request->dashboard_role,
        ]);

        return back()->with('success', 'Utilisateur créé avec succès.');
    }

    public function deleteUser($id)
    {
        $me = session('dashboard_user.id');
        if ($id == $me) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        User::whereNotNull('dashboard_role')->findOrFail($id)->delete();
        return back()->with('success', 'Utilisateur supprimé.');
    }

    /* ──────────────────────────────────────────
       COMMERCIAL DASHBOARD
    ────────────────────────────────────────── */

    public function commercial(Request $request)
    {
        $role   = session('dashboard_user.role');
        $userId = session('dashboard_user.id');

        $query = Contact::latest();

        if ($role === 'commercial') {
            $query->where('assigned_to', $userId);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name',     'like', "%$s%")
                  ->orWhere('company','like', "%$s%")
                  ->orWhere('email',  'like', "%$s%")
                  ->orWhere('city',   'like', "%$s%");
            });
        }

        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        $contacts = $query->paginate(15)->withQueryString();

        $base = $role === 'commercial'
            ? Contact::where('assigned_to', $userId)
            : new Contact;

        $services = (clone $base)->select('service')->distinct()->whereNotNull('service')->pluck('service');

        $stats = [
            'total'     => (clone $base)->count(),
            'thisMonth' => (clone $base)->whereMonth('created_at', now()->month)->count(),
            'thisWeek'  => (clone $base)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
        ];

        return view('Dashboard.commercial', compact('contacts', 'services', 'stats'));
    }

    public function exportContacts()
    {
        $userId   = session('dashboard_user.id');
        $role     = session('dashboard_user.role');
        $filename = 'contacts-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new ContactsExport($userId, $role), $filename);
    }

    public function showContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Dashboard.contact-detail', compact('contact'));
    }

    /* ──────────────────────────────────────────
       EXTERNAL LEADS (refrigairexpo + seafood)
    ────────────────────────────────────────── */

    public function externalLeads(Request $request)
    {
        $role         = session('dashboard_user.role');
        $userId       = session('dashboard_user.id');
        $service      = new ExternalLeadsService();
        $forceRefresh = $request->boolean('refresh');
        $sources      = $service->getSources();
        $results      = $service->fetchAll($forceRefresh);

        // Commercial: filter rows assigned to him only
        if ($role === 'commercial') {
            foreach ($results as $key => &$result) {
                $result['data'] = array_values(array_filter(
                    $result['data'] ?? [],
                    fn($row) => ($row['assigned_to'] ?? null) == $userId
                ));
            }
            unset($result);
        }

        $commerciaux = \App\Models\User::where('dashboard_role', 'commercial')
            ->orderBy('id')
            ->pluck('name', 'id');

        return view('Dashboard.external-leads', compact('sources', 'results', 'commerciaux'));
    }

    public function exportExternalLeads(Request $request)
    {
        $role      = session('dashboard_user.role');
        $userId    = session('dashboard_user.id');
        $sourceKey = $request->query('source');
        $service   = new ExternalLeadsService();
        $sources   = $service->getSources();
        $results   = $service->fetchAll();

        // Commercial: filter to his assigned rows only
        if ($role === 'commercial') {
            foreach ($results as &$result) {
                $result['data'] = array_values(array_filter(
                    $result['data'] ?? [],
                    fn($row) => ($row['assigned_to'] ?? null) == $userId
                ));
            }
            unset($result);
        }

        $filename  = 'leads-externes-' . now()->format('Y-m-d') . '.xlsx';

        if ($sourceKey && isset($sources[$sourceKey])) {
            // Single sheet export
            $rows     = $results[$sourceKey]['data'] ?? [];
            $label    = $sources[$sourceKey]['label'];
            $filename = 'leads-' . preg_replace('/[^a-z0-9]+/', '-', strtolower($label)) . '-' . now()->format('Y-m-d') . '.xlsx';
            return Excel::download(
                new \App\Exports\ExternalLeadsSheetExport($rows, $label),
                $filename
            );
        }

        // Multi-sheet export (all sources)
        $sheets = [];
        foreach ($sources as $key => $source) {
            $rows = $results[$key]['data'] ?? [];
            if (count($rows) > 0) {
                $sheets[] = new \App\Exports\ExternalLeadsSheetExport($rows, $source['label']);
            }
        }

        return Excel::download(
            new \App\Exports\ExternalLeadsExport($sheets),
            $filename
        );
    }

    /* ──────────────────────────────────────────
       MARKETING DASHBOARD
    ────────────────────────────────────────── */

    public function marketing()
    {
        $posts = Post::latest()->get();
        $stats = [
            'total'     => $posts->count(),
            'published' => $posts->where('status', 'PUBLISHED')->count(),
            'draft'     => $posts->where('status', 'DRAFT')->count(),
        ];

        return view('Dashboard.marketing', compact('posts', 'stats'));
    }

    public function togglePost($id)
    {
        $post = Post::findOrFail($id);
        $post->status = ($post->status === 'PUBLISHED') ? 'DRAFT' : 'PUBLISHED';
        $post->save();
        return back()->with('success', 'Statut mis à jour.');
    }

    public function createPost()
    {
        $videos = $this->getVideoList();
        return view('Dashboard.event-form', compact('videos'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'body'        => 'nullable|string',
            'logo'        => 'nullable|image|max:10240',
            'image'       => 'nullable|image|max:10240',
            'img1'        => 'nullable|image|max:10240',
            'img2'        => 'nullable|image|max:10240',
            'img3'        => 'nullable|image|max:10240',
            'recap_video' => 'nullable|mimetypes:video/mp4,video/webm,video/ogg|max:512000',
        ]);

        $slug = $this->makeSlug($request->title);

        $data = [
            'title'            => $request->title,
            'slug'             => $slug,
            'body'             => $request->body ?: '',
            'status'           => $request->has('publish') ? 'PUBLISHED' : 'DRAFT',
            'event_type'       => $request->event_type ?: null,
            'date'             => $request->date ?: null,
            'location'         => $request->location ?: null,
            'excerpt'          => $request->excerpt ?: '',
            'seo_title'        => $request->seo_title ?: $request->title,
            'meta_description' => $request->meta_description ?: '',
            'video'            => $request->video_file ?: null,
            'what_happened'    => $request->what_happened ?: null,
            'what_upcoming'    => $request->what_upcoming ?: null,
            'author_id'        => session('dashboard_user.id'),
        ];

        foreach (['logo','image','img1','img2','img3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('posts', 'public');
            }
        }

        if ($request->hasFile('recap_video')) {
            $data['recap_video'] = $request->file('recap_video')->store('posts/videos', 'public');
        }

        $post = Post::create($data);
        $this->syncPostCategory($post);
        return redirect()->route('dashboard.marketing')->with('success', 'Événement créé avec succès.');
    }

    public function editPost($id)
    {
        $post   = Post::findOrFail($id);
        $videos = $this->getVideoList();
        return view('Dashboard.event-form', compact('post', 'videos'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'body'        => 'nullable|string',
            'logo'        => 'nullable|image|max:10240',
            'image'       => 'nullable|image|max:10240',
            'img1'        => 'nullable|image|max:10240',
            'img2'        => 'nullable|image|max:10240',
            'img3'        => 'nullable|image|max:10240',
            'recap_video' => 'nullable|mimetypes:video/mp4,video/webm,video/ogg|max:512000',
        ]);

        $post = Post::findOrFail($id);

        $data = [
            'title'            => $request->title,
            'body'             => $request->body ?: '',
            'status'           => $request->has('publish') ? 'PUBLISHED' : 'DRAFT',
            'event_type'       => $request->event_type ?: null,
            'date'             => $request->date ?: null,
            'location'         => $request->location ?: null,
            'excerpt'          => $request->excerpt ?: '',
            'seo_title'        => $request->seo_title ?: $request->title,
            'meta_description' => $request->meta_description ?: '',
            'video'            => $request->video_file ?: null,
            'what_happened'    => $request->what_happened ?: null,
            'what_upcoming'    => $request->what_upcoming ?: null,
        ];

        foreach (['logo','image','img1','img2','img3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('posts', 'public');
            }
        }

        if ($request->hasFile('recap_video')) {
            if ($post->recap_video) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->recap_video);
            }
            $data['recap_video'] = $request->file('recap_video')->store('posts/videos', 'public');
        }

        if ($request->input('remove_recap_video')) {
            if ($post->recap_video) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->recap_video);
            }
            $data['recap_video'] = null;
        }

        // Delete individual photo if requested
        foreach (['img1','img2','img3'] as $field) {
            if ($request->input('remove_'.$field)) {
                $data[$field] = null;
            }
        }

        $post->update($data);
        $post->refresh();
        $this->syncPostCategory($post);
        return redirect()->route('dashboard.marketing')->with('success', 'Événement mis à jour.');
    }

    public function videoCategories()
    {
        $videoMap = $this->videoMap();

        $posts = Post::latest()->get(['id','title','slug','logo','image','video','recap_video','status']);

        $items = [];
        foreach ($posts as $post) {
            if ($post->video) {
                $src  = asset('assets/img/video/' . $post->video);
                $type = 'local';
            } elseif ($post->recap_video) {
                $src  = asset('storage/' . $post->recap_video);
                $type = 'upload';
            } elseif (isset($videoMap[$post->slug])) {
                $src  = asset('assets/img/video/' . $videoMap[$post->slug]);
                $type = 'local';
            } else {
                continue;
            }

            $cover = $post->logo ?: $post->image;
            $items[] = [
                'post'  => $post,
                'src'   => $src,
                'type'  => $type,
                'cover' => $cover ? asset('storage/' . $cover) : null,
            ];
        }

        return view('Dashboard.video-categories', compact('items'));
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $this->cleanPostCategory($post);
        $post->delete();
        return redirect()->route('dashboard.marketing')->with('success', 'Événement supprimé.');
    }

    /* ──────────────────────────────────────────
       GALLERY MANAGEMENT
    ────────────────────────────────────────── */

    public function gallery()
    {
        $posts = Post::latest()->get(['id','title','slug','logo','image','img1','img2','img3','status']);

        $autoCategories = \App\Models\Category::whereIn('post_id', $posts->pluck('id'))
            ->with('photos')
            ->get()
            ->keyBy('post_id');

        foreach ($posts as $post) {
            $cat = $autoCategories->get($post->id);
            $post->extra_photos = $cat ? $cat->photos : collect();
            $post->category_id  = $cat ? $cat->id : null;
        }

        return view('Dashboard.gallery', compact('posts'));
    }

    public function updatePhotos(Request $request, $id)
    {
        $request->validate([
            'logo'  => 'nullable|image|max:10240',
            'image' => 'nullable|image|max:10240',
            'img1'  => 'nullable|image|max:10240',
            'img2'  => 'nullable|image|max:10240',
            'img3'  => 'nullable|image|max:10240',
        ]);

        $post = Post::findOrFail($id);
        $data = [];
        $errors = [];

        foreach (['logo','image','img1','img2','img3'] as $field) {
            if (!$request->hasFile($field)) continue;

            $file = $request->file($field);

            if (!$file->isValid()) {
                $phpError = $file->getError();
                if ($phpError === UPLOAD_ERR_INI_SIZE || $phpError === UPLOAD_ERR_FORM_SIZE) {
                    $errors[] = "\"$field\" : fichier trop volumineux (limite serveur dépassée).";
                } else {
                    $errors[] = "\"$field\" : erreur upload (code $phpError).";
                }
                continue;
            }

            $mb = round($file->getSize() / 1024 / 1024, 2);
            if ($file->getSize() > 10 * 1024 * 1024) {
                $errors[] = "\"$field\" : image trop lourde ({$mb} MB) — maximum 10 MB.";
                continue;
            }

            if (!str_starts_with($file->getMimeType(), 'image/')) {
                $errors[] = "\"$field\" : fichier non reconnu comme image ({$file->getMimeType()}).";
                continue;
            }

            $data[$field] = $file->store('posts', 'public');
        }

        if (!empty($errors)) {
            return back()->with('error', implode(' ', $errors));
        }

        if (!empty($data)) {
            $post->update($data);
            return back()->with('success', 'Photos mises à jour.');
        }

        return back()->with('error', 'Aucune photo sélectionnée.');
    }

    public function deletePhoto(Request $request, $id)
    {
        $field = $request->input('field');
        if (!in_array($field, ['logo','image','img1','img2','img3'])) {
            return back()->with('error', 'Champ invalide.');
        }

        $post = Post::findOrFail($id);

        // Delete file from storage
        if ($post->$field) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->$field);
        }

        $post->update([$field => null]);
        return back()->with('success', 'Photo supprimée.');
    }

    /* ── Helpers ── */

    private function syncPostCategory(Post $post): void
    {
        $cat = Category::firstOrCreate(
            ['post_id' => $post->id, 'type' => 'photos'],
            [
                'name'  => $post->title,
                'slug'  => 'event-photos-' . $post->slug,
                'order' => (Category::max('order') ?? 0) + 1,
                'cover' => $post->logo ?: $post->image,
            ]
        );

        $cat->update([
            'name'  => $post->title,
            'cover' => $post->logo ?: $post->image,
        ]);

        $paths = array_filter([$post->img1, $post->img2, $post->img3]);

        $cat->photos()->delete();
        foreach ($paths as $path) {
            CategoryPhoto::create(['category_id' => $cat->id, 'path' => $path]);
        }

        if (empty($paths)) {
            $cat->delete();
        }

        $this->syncPostVideoCategory($post);
    }

    private function syncPostVideoCategory(Post $post): void
    {
        if (!$post->recap_video) {
            Category::where('post_id', $post->id)->where('type', 'videos')->each(function ($c) {
                $c->photos()->delete();
                $c->delete();
            });
            return;
        }

        $vidCat = Category::firstOrCreate(
            ['post_id' => $post->id, 'type' => 'videos'],
            [
                'name'  => $post->title . ' - Vidéos',
                'slug'  => 'event-videos-' . $post->slug,
                'order' => (Category::max('order') ?? 0) + 1,
                'cover' => $post->logo ?: $post->image,
            ]
        );

        $vidCat->update([
            'name'  => $post->title . ' - Vidéos',
            'cover' => $post->logo ?: $post->image,
        ]);

        $vidCat->photos()->delete();
        CategoryPhoto::create(['category_id' => $vidCat->id, 'path' => $post->recap_video]);
    }

    private function cleanPostCategory(Post $post): void
    {
        Category::where('post_id', $post->id)->each(function ($cat) {
            $cat->photos()->delete();
            $cat->delete();
        });
    }

    private function videoMap(): array
    {
        return [
            'forum-exposition-internationale-refrigairexpo'      => 'Refrigairexpo_22-20Mai_202025.mp4',
            'forum-exposition-international-de-plasturgie'       => 'Forum Plasturgie 2024.mp4',
            'forum-international-de-la-plasturgie'               => 'Forum Plasturgie 2024.mp4',
            'forum-international-de-l-industrie-halieutique'     => 'Forum HALIEUTIQUE CASABLANCA.mp4',
            'forum-international-du-froid-et-climatisation'      => 'Journee du froid 2024.mp4',
            'la-6eme-edition-de-la-journee-mondiale'             => 'Journee du froid 2024.mp4',
            'un-gala-inoubliable-pour-le-personnel-d-airbus'     => '-AIRBUS-.mp4',
            'le-salon-immotech-protech-expo'                     => 'IMMOTECH 2024.mp4',
            'la-7eme-edition-des-rencontres-africaines'          => 'ITAF_HFT_26_FR_REV.mp4',
        ];
    }

    private function getVideoList(): array
    {
        $dir = public_path('assets/img/video');
        if (!is_dir($dir)) return [];
        return array_values(array_filter(scandir($dir), fn($f) => str_ends_with(strtolower($f), '.mp4')));
    }

    private function makeSlug(string $title): string
    {
        $slug = \Illuminate\Support\Str::slug($title);
        $count = Post::where('slug', 'like', $slug.'%')->count();
        return $count ? $slug.'-'.$count : $slug;
    }
}
