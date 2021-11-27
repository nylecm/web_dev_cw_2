@extends('layouts.app')

@section('title', 'Post Index')

@section('content')
    <p>These are the posts on Fake Twitter:</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id ])}}" >{{'@'}}{{ $post->title}}</a></li>
        @endforeach
    </ul>
@endsection
