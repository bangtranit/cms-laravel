<!-- Header -->
@section('title')
    TheSaaS — Blog with sidebar
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
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="{{Route('blog.show', $post)}}"><img class="card-img-top" src="{{generatePathImage($post->image)}}"
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
                        @endforeach
                    </div>


                    <nav class="flexbox mt-30">
                        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                        <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav>
                </div>



                <div class="col-md-4 col-xl-3">
                    <div class="sidebar px-4 py-md-0">

                        <h6 class="sidebar-title">Search</h6>
                        <form class="input-group" target="#" method="GET">
                            <input type="text" class="form-control" name="s" placeholder="Search">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="ti-search"></i></span>
                            </div>
                        </form>

                        <hr>

                        <h6 class="sidebar-title">Categories</h6>
                        <div class="row link-color-default fs-14 lh-24">
                            @foreach($categories as $category)
                                <div class="col-6"><a href="#">{{$category->title}}</a></div>
                            @endforeach
                        </div>

                        <hr>
                            <h6 class="sidebar-title">Top posts</h6>
                            @foreach($posts as $post)
                                <a class="media text-default align-items-center mb-5"
                                   href="{{Route('blog.show', $post)}}">
                                    <img class="rounded w-65px mr-4" src="{{generatePathImage($post->image)}}">
                                    <p class="media-body small-2 lh-4 mb-0">
                                        Best practices for minimalist design
                                    </p>
                                </a>
                            @endforeach
                        <hr>

                        <h6 class="sidebar-title">Tags</h6>
                        <div class="gap-multiline-items-1">
                            @foreach($tags as $tag)
                                <a class="badge badge-secondary" href="#">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        <hr>

                        <h6 class="sidebar-title">About</h6>
                        <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>


                    </div>
                </div>

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
