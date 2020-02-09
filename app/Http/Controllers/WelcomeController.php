<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $tags = Tag::all();
        $posts = Post::searched()->simplePaginate(2);
        $categories = Category::all();
        return view('welcome', compact('tags', 'posts', 'categories'));
    }
}
