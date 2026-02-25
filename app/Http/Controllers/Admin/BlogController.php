<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ──────────────────────────────────────────────────────────────
    // INDEX
    // ──────────────────────────────────────────────────────────────
    public function index()
    {
        $blogs = Blog::latest()->simplePaginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    // ──────────────────────────────────────────────────────────────
    // STORE
    // ──────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'slug.en' => 'required|string|max:255|unique:blogs,slug->en',
            'slug.ar' => 'required|string|max:255|unique:blogs,slug->ar',
            'excerpt.en' => 'required|string|max:500',
            'excerpt.ar' => 'required|string|max:500',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'author_name.en' => 'nullable|string|max:255',
            'author_name.ar' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title', 'slug', 'excerpt', 'content', 'author_name', 'published_at',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    // ──────────────────────────────────────────────────────────────
    // UPDATE
    // ──────────────────────────────────────────────────────────────
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'slug.en' => 'required|string|max:255|unique:blogs,slug->en,'.$blog->id,
            'slug.ar' => 'required|string|max:255|unique:blogs,slug->ar,'.$blog->id,
            'excerpt.en' => 'required|string|max:500',
            'excerpt.ar' => 'required|string|max:500',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'author_name.en' => 'nullable|string|max:255',
            'author_name.ar' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title', 'slug', 'excerpt', 'content', 'author_name', 'published_at',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    // ──────────────────────────────────────────────────────────────
    // DESTROY
    // ──────────────────────────────────────────────────────────────
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
