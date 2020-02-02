<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();
        $imagePath = ($request->image->store('posts'));
        Post::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
            'image' => $imagePath,
            'published_at' => $request{'published_at'},
        ]);
        session()->flash('success', 'Created Post Successfully');
        return Redirect()->Route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest $request, Post $post
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id) //change to $id if you want force delete post has trashed
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if (!$post){
            session()->flash('success', 'Not Found');
            return Redirect()->route('posts.index');
        }else{
            if ($post->trashed()){
                $post->forceDelete();
                Storage::delete($post->image);
                session()->flash('success', 'Deleted Post Successfully');
            }else{
                $post->delete();
                session()->flash('success', 'Trashed Post Successfully');
            }
        }
        return Redirect()->route('posts.index');
    }

    /**
     * Show the the trahsed posts.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trashedPosts()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.index', compact('posts'));
    }
}
