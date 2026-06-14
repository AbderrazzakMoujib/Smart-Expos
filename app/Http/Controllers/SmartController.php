<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Contact;


class SmartController extends Controller
{
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
            'best-off-alma-event-2025'                           => 'Best Off 02 ALMA Event 2025.mp4',
            '7eme-edition-efficacite-energetique'                => '7th EFFICACITE ENERGETIQUE.mp4',
        ];
    }

    public function home(){
        $posts = Post::orderBy('created_at','desc')->whereStatus('PUBLISHED')->get();

        $videoMap = $this->videoMap();

        // Build dynamic partners list from posts that have a video
        $partners = $posts->map(function ($post) use ($videoMap) {
            if ($post->video) {
                $videoSrc = asset('assets/img/video/' . $post->video);
            } elseif ($post->recap_video) {
                $videoSrc = asset('storage/' . $post->recap_video);
            } elseif (isset($videoMap[$post->slug])) {
                $videoSrc = asset('assets/img/video/' . $videoMap[$post->slug]);
            } else {
                return null;
            }

            $cover = $post->logo ?: $post->image;

            return [
                'name'   => $post->title,
                'tag'    => $post->event_type ?: 'Événement',
                'video'  => $videoSrc,
                'poster' => $cover ? asset('storage/' . $cover) : asset('assets/img/normal/about_22.webp'),
                'logo'   => $cover,
                'slug'   => $post->slug,
            ];
        })->filter()->values();

        return view('Principal.home', ['myposts' => $posts, 'partners' => $partners]);
    }

    public function about(){
        return view('Principal.about');
    }
    public function salons(){
        $posts = Post::orderBy('created_at' ,'desc')
        ->whereStatus('PUBLISHED')
        ->get();
        return view('Principal.salons', ['myposts' => $posts]);
    }

    public function gallery(){
        $posts = Post::whereStatus('PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->get(['id','title','slug','image','logo','img1','img2','img3','date','event_type']);

        // Load auto-category photos keyed by post_id
        $autoCategories = Category::whereIn('post_id', $posts->pluck('id'))
            ->where('type', 'photos')
            ->with('photos')
            ->get()
            ->keyBy('post_id');

        // Attach extra photos to each post
        foreach ($posts as $post) {
            $cat = $autoCategories->get($post->id);
            $existing = array_filter([$post->img1, $post->img2, $post->img3]);
            $post->extra_photos = $cat
                ? $cat->photos->pluck('path')->diff($existing)->values()->all()
                : [];
        }

        $postsBySlug = $posts->keyBy('slug');

        $categories = Category::withCount('photos')
            ->having('photos_count', '>', 0)
            ->whereNull('post_id')
            ->orderBy('order')
            ->with('photos')
            ->get();

        return view('Principal.gallery', [
            'myposts'     => $posts,
            'postsBySlug' => $postsBySlug,
            'categories'  => $categories,
        ]);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();

        $category = \App\Models\Category::where('post_id', $post->id)
            ->where('type', 'photos')
            ->with('photos')
            ->first();

        $videoMap = $this->videoMap();

        if ($post->video) {
            $video = asset('assets/img/video/' . $post->video);
        } elseif ($post->recap_video) {
            $video = asset('storage/' . $post->recap_video);
        } elseif (isset($videoMap[$slug])) {
            $video = asset('assets/img/video/' . $videoMap[$slug]);
        } else {
            $video = null;
        }

        return view('Principal.show', ['post' => $post, 'video' => $video, 'category' => $category]);
    }
    public function contact() {
        return view('Principal.contact');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'        => 'required|string|max:150',
            'company'     => 'nullable|string|max:150',
            'email'       => 'required|email|max:255',
            'number'      => 'nullable|string|max:30',
            'country'     => 'nullable|string|max:100',
            'city'        => 'nullable|string|max:100',
            'service'     => 'nullable|string|max:100',
            'message'     => 'required|string|max:5000',
        ]);

        $commercials = User::where('dashboard_role', 'commercial')
            ->orderBy('id')
            ->pluck('id');

        if ($commercials->isNotEmpty()) {
            $lastAssigned = Contact::whereNotNull('assigned_to')
                ->latest('id')
                ->value('assigned_to');

            $currentIndex = $commercials->search($lastAssigned);
            $nextIndex    = ($currentIndex === false || $currentIndex === $commercials->count() - 1)
                ? 0
                : $currentIndex + 1;

            $validated['assigned_to'] = $commercials[$nextIndex];
        }

        Contact::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true], 200);
        }

        return redirect('/')->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.');
    }


    public function terms() {
        return view('Principal.terms');
    }

    public function privacy() {
        return view('Principal.privacy');
    }

    public function switchLanguage($lang)
    {
        if (in_array($lang, ['en', 'fr', 'ar'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }

        return redirect()->back();
    }
}
