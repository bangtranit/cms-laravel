<!-- Header -->
@section('title')
    Category - {{$category->title}}
@endsection
@section('header_title_name')
    {{$category->title}}
@endsection
@section('header_description')
    {{$category->description}}
@endsection
@include('welcome_common.header')

<!-- /.header -->

<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @forelse($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="{{Route('blog.show', $post)}}"><img class="card-img-top"
                                                                                 src="{{generatePathImage($post->image)}}"
                                                                                 alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p>
                                            <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                                {{$post->title}}
                                            </a>
                                        </p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="#">
                                                {{$post->description}}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">
                                No results found for query <strong>{{request()->query('keyword')}}</strong>
                            </p>
                        @endforelse
                    </div>
                    @if($posts->count() > 0)
                        {{ $posts->appends( ['search' => request()->query('keyword') ])->links() }}
                    @endif
                </div>

                @include('partials.sidebar')

            </div>
        </div>
    </div>
</main>


<!-- Footer -->
@include('welcome_common.footer')
<!-- /.footer -->


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
