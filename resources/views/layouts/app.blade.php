<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - @yield('title') </title>
</head>
<body>

<img src="{{ URL('https://www.tripsavvy.com/thmb/1aXkdyIDI0OkKVHVC8fuvYHZDhY=/2125x1412/filters:fill(auto,1)/Banff-National-Park_janeteasche_Getty-Images-56a97eeb5f9b58b7d0fbf876.jpg')}}" alt="Quacker Logo" height="200" width="400">

<h1>Quacker - @yield('title')</h1>

    <div>
        @yield('content')
    </div>
</body>
</html>
