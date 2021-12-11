@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h4>{{ $post->title}}</h4>

    <p>{{ $post->text_content}}</p>
    <p>Created: {{$post->created_at}}, Edited: {{$post->updated_at}}</p>
    <p>Posted by: {{ $author->user_name}}</p>
    <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>

    <h5>Comments:</h5>

    @foreach ($comments as $comment)
        <p>hello</p>
    @endforeach

    </ul>
@endsection
