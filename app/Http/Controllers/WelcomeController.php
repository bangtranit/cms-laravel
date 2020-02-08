<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $posts = Post::all();
        $categories = Category::all();
        return view('welcome', compact('tags', 'posts', 'categories'));
    }
}
