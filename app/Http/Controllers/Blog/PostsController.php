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
        $posts = array();
        $keyword = request()->query('keyword');
        if ($keyword){
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$keyword}%")
                ->where('category_id', '=' , '{$category->id}')
                ->simplePaginate(2);
        }else{
            $posts = $category->posts()->simplePaginate(2);
        }
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog.category', compact('posts', 'tags', 'categories', 'category'));
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function tag(Tag $tag){
//        $posts = array();
//        $keyword = request()->query('keyword');
//        if ($keyword){
//            $posts = Post::query()
//                ->where('title', 'LIKE', "%{$keyword}%")
//                ->where('tag_id', '=' , '{$tag->id}')
//                ->simplePaginate(2);
//        }else{
//            $posts = $tag->posts()->simplePaginate(2);
//        }
        $posts = $tag->posts()->simplePaginate(1);
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog.tag', compact('posts', 'tags', 'categories', 'tag'));
    }
}
