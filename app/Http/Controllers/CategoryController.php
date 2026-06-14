<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\CategoryPhoto;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('photos')->with('photos')->where('type', 'photos')->orderBy('order')->get();
        return view('Dashboard.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);

        $slug = Str::slug($request->name);
        $count = Category::where('slug', 'like', $slug.'%')->count();
        if ($count) $slug .= '-'.$count;

        Category::create([
            'name'  => $request->name,
            'slug'  => $slug,
            'order' => (Category::max('order') ?? 0) + 1,
        ]);

        return back()->with('success', 'Catégorie créée.');
    }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);

        if ($cat->cover) Storage::disk('public')->delete($cat->cover);
        foreach ($cat->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }

        $cat->delete();
        return back()->with('success', 'Catégorie supprimée.');
    }

    public function uploadCover(Request $request, $id)
    {
        $request->validate(['cover' => 'required|image|max:10240']);
        $cat = Category::findOrFail($id);
        if ($cat->cover) Storage::disk('public')->delete($cat->cover);
        $cat->update(['cover' => $request->file('cover')->store('categories', 'public')]);
        return back()->with('success', 'Cover mise à jour.');
    }

    public function deleteCover($id)
    {
        $cat = Category::findOrFail($id);
        if ($cat->cover) Storage::disk('public')->delete($cat->cover);
        $cat->update(['cover' => null]);
        return back()->with('success', 'Cover supprimée.');
    }

    public function show($id)
    {
        $category = Category::with('photos')->findOrFail($id);
        $categories = Category::where('type', 'photos')->orderBy('order')->get();
        return view('Dashboard.category-photos', compact('category', 'categories'));
    }

    public function uploadPhoto(Request $request, $id)
    {
        $request->validate([
            'photos'   => 'required|array',
            'photos.*' => 'image|max:10240',
        ]);

        $category = Category::findOrFail($id);

        foreach ($request->file('photos') as $file) {
            $path = $file->store('categories', 'public');
            CategoryPhoto::create([
                'category_id' => $category->id,
                'path'        => $path,
            ]);
        }

        return back()->with('success', count($request->file('photos')).' photo(s) ajoutée(s).');
    }

    public function deletePhoto($photoId)
    {
        $photo = CategoryPhoto::findOrFail($photoId);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
        return back()->with('success', 'Photo supprimée.');
    }
}
