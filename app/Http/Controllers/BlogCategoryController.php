<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;


class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategories::latest()->get();
        return Inertia::render('BlogCategory/Index', ['blogCategories' => $blogCategories]);
    }

    public function create(){
        $categories = Categories::get();
        $blogs = Blogs::get();
        return Inertia::render('BlogCategory/Create', ['categories' => $categories,'blogs' => $blogs]);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog' => [Rule::exists('blogs', 'id')],
            'category' => [Rule::exists('categories', 'id')]
        ]);

        $blogCategories = BlogCategories::create([
            'blog' => $request->blog,
            'category' => $request->category,
        ]);

        // $blogCategories = request()->validate([
        //     'blog' => [Rule::exists('blogs', 'id')],
        //     'category' => [Rule::exists('categories', 'id')]
        // ]);


        // BlogCategories::create($blogCategories);

        return redirect()->route('blogCategory')->with('message', 'Blog Category Created Successfully!');
    }
}
