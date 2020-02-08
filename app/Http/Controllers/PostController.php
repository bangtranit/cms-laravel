<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
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
        $imagePath = "";
        if ($request->image){
            $imagePath = ($request->image->store('posts'));
        }
        $post = new Post;
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->content = $request['content'];
        $post->image = $imagePath;
        $post->published_at = $request{'published_at'};
        $post->category_id = $request['category_id'];
        $post->user_id = auth()->user()->id;
        $post->save();
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest $request, Post $post
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $data = $request->only([
            'title',
            'description',
            'content',
            'published_at',
            'category_id',
        ]);
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->content = $request['content'];
        $post->published_at = $request['published_at'];
        $post->category_id = $request['category_id'];
        if ($request->hasFile('image')){
            $imagePath = ($request->image->store('posts'));
            $post->deleteImage();
            $post->image = $imagePath;
        }
        $post->save();
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }
        session()->flash('success', 'Updated Post Successfully');
        return Redirect()->route('posts.index');
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
                $post->deleteImage();
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

    public function restorePost($id){
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()){
            $post->restore();
            session()->flash('success', 'Restored Post Successfully');
        }else{
            session()->flash('success', 'Post Not Found');
        }
        return Redirect()->route('posts.index');
    }
}
