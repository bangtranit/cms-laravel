@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Update Category
        </div>
        <div class="card-body">
            <form method="POST" action={{Route('categories.update', $category->id)}}>
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" value="{{$category->id}}">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input class="form-control" name="title" placeholder="title" value="{{$category->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" name="description" placeholder="description"
                           value="{{$category->description}}">
                </div>
                <button class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection