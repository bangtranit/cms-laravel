@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href={{Route('categories.create')}} class="btn btn-primary float-right mr-2"> Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($categories as $cat)
                    <li class="list-group-item">
                        {{$cat->title}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection