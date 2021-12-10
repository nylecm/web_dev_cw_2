<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        /*@media (max-width: 480px) {*/
        /*    .container {*/


        /*    }*/
        /*}*/
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - @yield('title') </title>
</head>

<body>
    @yield('content')
</body>
</html>
