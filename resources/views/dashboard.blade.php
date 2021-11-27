@extends('layouts.app')

@section('title')
    {{ auth()->user()->user_name }}'s Dashboard
@endsection

@section('content')
    <iframe src="https://gifer.com/embed/4OC6" width=480 height=270.000 frameBorder="0" allowFullScreen></iframe><p><a href="https://gifer.com">via GIFER</a></p>
    <h3> {{ auth()->user()->user_name }}, we apologise for having you use this site.</h3>
    <p><a href="{{ route('posts.index') }}">View some cool Quacks!</a></p>
    <p><a href="{{ route('posts.create') }}">Post a Quack</a></p>
    {{$user = auth()->user()}}
    <div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
@endsection
