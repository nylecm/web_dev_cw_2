@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <p>Write a post here:</p>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <p>Title: <input type="text" name="title"></p>
        <label>
            <textarea name="text_content" style="width:250px;height:150px;resize:none;"></textarea>
        </label>
        <br>
        <input type="file" name="img">
        <input type="submit" value="Submit">
    </form>

    <div id="app">
        @{{ message }}
    </div>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
@endsection
