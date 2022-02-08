<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::latest()->get();
        return Inertia::render('Blog/Index', ['blogs' => $blogs]);
    }

    public function create(){
        return Inertia::render('Blog/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        

        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $blog = Blogs::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'image' => $image_path,
            'user' => auth()->user()->id,
        ]);
        return redirect()->route('blog')->with('message', 'Blog Created Successfully!');
    }

}
