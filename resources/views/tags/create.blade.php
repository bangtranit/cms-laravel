@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create New Tag
        </div>
        <div class="card-body">
            <form action={{Route('tags.store')}} method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
@endsection