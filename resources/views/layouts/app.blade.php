<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - @yield('title') </title>
</head>

<body>

<img src="{{ asset('/img/quacker-logo-1.png') }}" alt="Quacker Logo" height="200">

<h1>Quacker - @yield('title')</h1>

{{--@include('includes.navbar')--}}
<div>
    @yield('content')
</div>
</body>
</html>
