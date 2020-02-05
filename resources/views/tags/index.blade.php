@extends('layouts.app')
@section('content')
    @php
        $routeName = Route::currentRouteName();
    @endphp
    <div class="d-flex justify-content-end mb-2">
        <a href={{Route('tags.create')}} class="btn btn-primary float-right mr-2"> Add Tag</a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Tag
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <th width="75%">Name</th>
                <th width="25%">Action</th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{$tag->name}}
                        </td>
                        <td>
                            <a href={{Route('tags.edit', $tag)}} class="btn btn-success btn-sm">View</a>
                            <button class="btn btn-danger btn-sm" onclick="handelDelete({{$tag->id}})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deletePostForm">
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
                                Do you want to delete this tag?
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Trash</button>
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
        function handelDelete(id) {
            var form = document.getElementById('deletePostForm')
            form.action = '/tags/' + id
            console.log('deleted ', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection