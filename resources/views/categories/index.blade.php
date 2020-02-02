@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href={{Route('categories.create')}} class="btn btn-success float-right mr-2"> Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
    </div>
@endsection