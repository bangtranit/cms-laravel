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
        $posts = Post::simplePaginate(2);
        $categories = Category::all();
        return view('welcome', compact('tags', 'posts', 'categories'));
    }

    public function listPostOfCategory(Category $category){
        $tags = Tag::all();
        $categories = Category::all();
        $posts = $category->posts()->get();
        return view('welcome', compact('tags', 'posts', 'categories'));
    }

    public function listPostByKeyword(){
        $keyword = request()->query('keyword');
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::query()
                ->where('title', 'LIKE', "%{$keyword}%")
                ->simplePaginate(2);
        return view('welcome', compact('tags', 'posts', 'categories'));
    }
}
