@extends('layouts.app')
@section('content')
    @php
        $routeName = Route::currentRouteName();
    @endphp
    @if($routeName !== "posts.trashed")
        <div class="d-flex justify-content-end mb-2">
            <a href={{Route('posts.create')}} class="btn btn-primary float-right mr-2"> Add Post</a>
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th width="40%">Name</th>
                    <th width="20%">Image</th>
                    <th width="15%">Category</th>
                    <th width="25%">Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>
                                @if($post->image)
                                    <img src = "{{ asset('storage/'.$post->image) }}"
                                         height="50px" width="50px"/>
                                @endif
                            </td>
                            <td>
                                <a href={{Route('categories.edit', $post->category->id)}}>
                                    {{$post->category->title}}</a>
                            </td>
                            <td>
                                @if(!$post->trashed())
                                    <a href={{Route('posts.edit', $post)}} class="btn btn-success btn-sm">View</a>
                                @else
                                    <form action={{Route('posts.restore', $post->id)}} method="POST">
                                    @csrf
                                    @method("PUT")
                                        <button class="btn btn-info btn-sm" type="submit">Restore</button>
                                    </form>
                                @endif
                                <button class="btn btn-danger btn-sm" onclick="handelDelete({{$post->id}})">
                                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
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
                                Do you want to delete this post?
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
            form.action = '/posts/' + id
            console.log('deleted ', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection