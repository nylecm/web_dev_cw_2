<!DOCTYPE html>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - @yield('title') </title>
    @yield('style')
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
                    <a class="nav-link" href="{{ route('posts.index') }}">Quacks</a>
                </li>
                @if (auth()->user() != null)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.show', ['id' => auth()->user()->id]) }}">My
                            Profile</a>
                    </li>
                @endif

                @if ( auth()->user() != null && auth()->user()->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="#">You are an Administrator</a>
                    </li>
                @endif

                @if ( Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.create')}}">Post a Quack</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="">Hello {{ auth()->user()->user_name }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="/logout" name="logout">
                                @csrf
                                <a class="nav-link" href="#" onclick="this.parentNode.submit();">Log Out</a>
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
    </div>
</nav>

{{--<img src="{{ asset('/img/quacker-logo-1.png') }}" alt="Quacker Logo" height="200">--}}

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <h1>@yield('title')</h1>
    </div>
</div>

{{--@include('includes.navbar')--}}
<div>
    @yield('content')
</div>

</body>

</html>
