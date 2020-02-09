<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

        <h6 class="sidebar-title">Search</h6>
        <form class="input-group" action="" method="GET">
            <input type="text" class="form-control" name="keyword"
                   placeholder="Search" value="{{request()->query('keyword')}}">
            <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
            </div>
        </form>
        <hr>
        <h6 class="sidebar-title">Categories</h6>
        <div class="row link-color-default fs-14 lh-24">
            @foreach($categories as $category)
                <div class="col-6"><a href="{{Route('blog.category', $category)}}">
                        {{$category->title}}
                    </a>
                </div>
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
                <a class="badge badge-secondary" href="{{Route('blog.tag', $tag)}}">{{$tag->name}}</a>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">About</h6>
        <p class="small-3">TheSaaS is a responsive, professional,
            and multipurpose SaaS, Software, Startup and WebApp landing
            template powered by Bootstrap 4. TheSaaS is a powerful and super
            flexible tool for any kind of landing pages.</p>


    </div>
</div>