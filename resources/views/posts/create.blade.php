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
                    <textarea class="form-control" cols="10" rows="5" placeholder="Content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"  class="form-control" placeholder="image" name="image">
                </div>
                <div class="form-group">
                    <label for="published_at">Publish At</label>
                    <input type="date"  class="form-control" placeholder="published_at" name="published_at">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection