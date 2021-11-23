<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swansea Zoo - @yield('title') </title>
</head>
<body>
    <h1>Swansea Zoo - @yield('title')</h1>

    <div>
        @yield('content')
    </div>
</body>
</html>
