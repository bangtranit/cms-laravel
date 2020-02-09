<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Category $category){
        $tags = Tag::all();
        $categories = Category::all();
        $posts = $category->posts()->searched()->simplePaginate(2);
        return view('blog.category', compact('posts', 'tags', 'categories', 'category'));
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function tag(Tag $tag){
        $posts = $tag->posts()->simplePaginate(1);
        $tags = Tag::all();
        $categories = Category::all();
        $posts = $tag->posts()->searched()->simplePaginate(2);
        return view('blog.tag', compact('posts', 'tags', 'categories', 'tag'));
    }
}
