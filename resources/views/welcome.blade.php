@extends('layouts.app')

{{--<!DOCTYPE html>--}}

{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"--}}
{{--      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
{{--<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>--}}

{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title> Welcome to Quacker </title>--}}
{{--</head>--}}

{{--<body>--}}

@section('style')
    <style>
        body {
            background-image: url("{{'/img/flyingducks.jpg'}}");
        }

        h1 {
            color: white;
        }

        h4 {
            color: white;
            padding-left: 30px;
            padding-right: 30px;
        }
    </style>
@endsection

@section('title', 'Welcome to Quacker')

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center">
            <h4>Quacker is an online community for cool, quack-loving ducks like you!</h4>
            @if ( Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-info" role="button" style="font-size: 22px">Go To
                        Dashboard</a>
            @else
                    <a href="/register" class="btn btn-info" role="button" style="font-size: 22px">Register</a>
                @endauth
            @endif
        </div>
    </div>

@endsection
