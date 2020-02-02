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
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>
                                <a href={{Route('categories.edit', $category->id)}}
                                        class="btn btn-info btn-sm ">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection