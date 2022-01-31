<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blogs::latest()->paginate(10);

        return Inertia::render('Blog/Index', ['blog' => $blog]);
    }
}
