@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create New Tag
        </div>
        <div class="card-body">
            <form action={{Route('tags.update', $tag)}} method="POST">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="id" value="{{$tag->id}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$tag->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection