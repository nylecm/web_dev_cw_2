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

@section('title', 'Welcome to Quacker')

@section('content')

<div>
{{--    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}
{{--    @if (Route::has('login'))--}}
{{--        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--            @auth--}}
{{--                <a href="{{ url('/dashboard') }}"--}}
{{--                   class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
{{--                @endif--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    @endif--}}


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Quacker is an online community for cool, quack loving ducks like you!

            Why use Quacker?

            We all sometimes need to talk to a ducks when solving problems,
            Quacker solves this problem by giving you a community to ducks to
            talk to!
        </div>
    </div>
</div>

@endsection
