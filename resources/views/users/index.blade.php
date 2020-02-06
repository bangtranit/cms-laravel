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
                <th width="25%">Name</th>
                <th width="25%">Email</th>
                <th width="25%">Role</th>
                <th width="25%">Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->role}}
                        </td>
                        <td>
                            @if($user->role !== \App\User::USER_ADMIN)
                                <button class="btn btn-success btn-sm" onclick="handleMakeAdmin({{$user->id}})">
                                    Make Admin
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="makeAdminForm">
                        @method('DELETE')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you want to change to admin this user?
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Make success</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleMakeAdmin(id) {
            var form = document.getElementById('makeAdminForm')
            form.action = '/users/' + id
            console.log('make admin ', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection