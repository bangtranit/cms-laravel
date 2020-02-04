@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Add New Post
        </div>
        <div class="card-body">
            <form action={{Route('posts.store')}} method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text"  class="form-control" placeholder="Description" name="description">
                </div>
                <div class="form-group">
                    <label for="Content">Content</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>

                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"  class="form-control" placeholder="image" name="image">
                </div>
                <div class="form-group">
                    <label for="published_at">Publish At</label>
                    <input type="text"  class="form-control" placeholder="published at"
                           name="published_at" id="published_at">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Post</button>
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
