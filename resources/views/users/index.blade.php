@extends('layouts.app')
@section('content')
    @php
        $routeName = Route::currentRouteName();
    @endphp
    <div class="card card-default">
        <div class="card-header">
            User
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <th width="30%">Name</th>
                <th width="25%">Email</th>
                <th width="15%">Role</th>
                <th width="10%">Avatar</th>
                <th width="20%">Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{Route('users.edit', $user)}}">
                                {{$user->name}}
                            </a>
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->role}}
                        </td>
                        <td>
                            <img width="30px" height="30px" style="border-radius: 30px"
                                 src="{{ Gravatar::src($user->email) }}">
                        </td>
                        <td>
                            @if(!$user->isAdmin())
                                <form action="{{Route('users.setadmin')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Make Admin
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

@endsection

@section('scripts')
    <script>
        function handleMakeAdmin(id) {
            var form = document.getElementById('makeAdminForm')
            form.action = '/user/setadmin' + id
            console.log('make admin ', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection