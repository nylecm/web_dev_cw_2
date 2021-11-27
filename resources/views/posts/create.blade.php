@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <p>Write a post here:</p>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title:<input type="text" name="title"></p>
        <p>Title:<input type="text" name="text_content"></p>
        <input type="submit" value="Submit">
        <p>{{$user->user_name?? 'err'}}</p>





    </form>

@endsection
