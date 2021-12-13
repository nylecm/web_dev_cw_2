@extends('layouts.app')

@section('title')
    Hello <a href="{{ route('users.show', ['id' => auth()->user()->id]) }}">{{ auth()->user()->user_name }}.</a>
@endsection

@section('content')
    <div class="container mt-5">
        <h3>Latest Posts:</h3>

        <h3>Your Follower's Posts:</h3>

        <h3>Your Posts:</h3>


    </div>
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
