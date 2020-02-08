@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <form action={{Route('users.update', $user)}} method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="About">Name</label>
                    <textarea class="form-control" name="about" id="about" cols="5"
                              rows="5" >{{$user->about}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Edit & Save</button>
            </form>
        </div>
    </div>
@endsection