@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    {{--todo modify so it edits item--}}
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ $post->title}}"></p>
        <label>
            <textarea name="text_content"
                      style="width:250px;height:150px;resize:none;">{{ $post->text_content}}</textarea>
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
@endsection
