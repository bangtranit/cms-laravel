<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        a.btn-info {
            color: white;
        }
    </style>

    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.navigation')
        <main class="py-4">
        @auth()
                <div class="container">
                    @include('partials.error')
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                @if(auth()->user()->isAdmin())
                                    <li class="list-group-item">
                                        <a href={{Route('users.index')}}>Users</a>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href={{Route('categories.index')}}>Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href={{Route('posts.index')}}>Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href={{Route('tags.index')}}>Tags</a>
                                </li>
                            </ul>
                            <ul class="list-group mt-5">
                                <li class="list-group-item">
                                    <a href={{Route('posts.trashed')}}>Trashed Posts</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
