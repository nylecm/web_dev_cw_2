@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h4>{{ $post->title}}</h4>

    <p>{{ $post->text_content}}</p>
    <p>Created: {{$post->created_at}}, Edited: {{$post->updated_at}}</p>
    <p>Posted by: {{ $author->user_name}}</p>
    <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>

    <h5>Comments:</h5>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Type a Comment is coming!'
            }
        })
    </script>

    @foreach ($comments as $comment)
        <p>Posted by: {{ $comment->text_content }}</p>
        <p>{{ $comment->text_content }}</p>
    @endforeach

    <div id="app">
        @{{ message }}
    </div>

@endsection
