@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create New Category
        </div>
        <div class="card-body">
            <form method="POST" action={{Route('categories.store')}}>
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input class="form-control" name="title" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" name="description" placeholder="description">
                </div>
                <button class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
@endsection