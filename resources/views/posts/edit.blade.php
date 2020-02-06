@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">
            <form action={{Route('posts.update', $post)}} method="POST" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="hidden" value="{{$post->id}}">
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text"  class="form-control" placeholder="Description"
                           name="description" value="{{$post->description}}">
                </div>
                <div class="form-group">
                    <label for="Content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{$post->content}}">
                    <trix-editor input="content"></trix-editor>

                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"  class="form-control" placeholder="image" name="image">
                </div>
                <div class="form-group">
                    <label for="published_at">Publish At</label>
                    <input type="text"  class="form-control" placeholder="published at"
                           name="published_at" id="published_at" value="{{$post->published_at}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$post->category_id === $category->id ? 'selected' : ''}}>
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if(count($tags) > 0)
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <select class="form-control" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                        @if($post->hasTag($tag->id)) selected @endif>
                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#published_at", {//id of component
            enableTime: true
        })
    </script>
@endsection
