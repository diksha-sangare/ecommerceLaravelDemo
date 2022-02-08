<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::latest()->get();
        return Inertia::render('Category/Index', ['categories' => $categories]);
    }

    public function create(){
        return Inertia::render('Category/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $categories = Categories::create([
            'title' => $request->title,
            'slug' => $request->slug,
        ]);
        return redirect()->route('category')->with('message', 'Category Created Successfully!');
    }
}
