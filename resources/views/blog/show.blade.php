@extends('layouts.blog')
@section('title_page')
    {{$post->title}}
@endsection
@section('header_post')
    <header class="header text-white h-fullscreen pb-80"
            style="background-image:
            url({{generatePathImage($post->image)}});"
            data-overlay="9">
        <div class="container text-center">

            <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">

                    <p class="opacity-70 text-uppercase small ls-1">
                        {{$post->category->title}}
                    </p>
                    <h1 class="display-4 mt-7 mb-8">
                        {{$post->description}}
                    </h1>
                    <p>
                        <span class="opacity-70 mr-1">
                            By
                        </span>
                        <a class="text-white" href="#">
                            {{$post->user->name}}
                        </a>
                    </p>
                    @if($post->user->avatar)
                        <p>
                            <img class="avatar avatar-sm"
                                 src={{generatePathImage($post->user->avatar)}}
                                         alt="...">
                        </p>
                    @else
                        <p>
                            <img class="avatar avatar-sm"
                                 src={{Gravatar::src($post->user->email)}}
                                         alt="...">
                        </p>
                    @endif


                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-white" href="#content"><span></span></a>
                </div>

            </div>

        </div>
    </header>
@endsection

@section('content')
    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
    <div class="section" id="section-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    {!! $post->content !!}}

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="gap-xy-2 mt-6">
                        @foreach($post->tags()->get() as $tag)
                            <a class="badge badge-pill badge-secondary" href="#">{{$tag->name}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>
        </div>
    </div>
    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <hr>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        var disqus_config = function () {
                        this.page.url = "{{Route('blog.show', $post)}}";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://saas-blog-1yo2kv0gjd.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                </div>
            </div>

        </div>
    </div>

@endsection
