<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - @yield('title') </title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href={{"http://localhost/"}}>Quacker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                {{--todo admin--}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                    @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="">Hello {{ auth()->user()->user_name }}</a>
                                    <p></p>
                                </li>
                        <li class="nav-item">
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="btn btn-primary" >Log Out</button>

                            </form>
                        </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard 2</a>--}}
{{--                                </li>--}}
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
            </ul>
        </div>


        {{--                <li class="nav-item dropdown">--}}
        {{--                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"--}}
        {{--                       aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
        {{--                    <div class="dropdown-menu">--}}
        {{--                        <a class="dropdown-item" href="#">Action</a>--}}
        {{--                        <a class="dropdown-item" href="#">Another action</a>--}}
        {{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
        {{--                        <div class="dropdown-divider"></div>--}}
        {{--                        <a class="dropdown-item" href="#">Separated link</a>--}}
        {{--                    </div>--}}
        {{--                </li>--}}
        </ul>
        {{--            <form class="d-flex">--}}
        {{--                <input class="form-control me-sm-2" type="text" placeholder="Search">--}}
        {{--                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>--}}
        {{--            </form>--}}
    </div>
    </div>
</nav>

<img src="{{ asset('/img/quacker-logo-1.png') }}" alt="Quacker Logo" height="200">

<h1>Quacker - @yield('title')</h1>

{{--@include('includes.navbar')--}}
<div>
    @yield('content')
</div>
</body>
</html>
