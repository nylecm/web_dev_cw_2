@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <p>Here is the content of this post:</p>
    <ul>
        <li>Title: {{ $post->title}}</li>
        <li>{{ $post->text_content}}</li>
        <li>{{ $post->date_posted}}</li>
        <li>{{ $post->date_edited}}</li>
        <li>{{ $author->user_name ?? 'n/a'}}</li>
        <li>{{ $likes ?? 'n/a'}}</li>
        <li>{{ $dislikes ?? 'n/a'}}</li>

        {{--@foreach ($posts as $post)
            <li><a href="{{route('$posts.show', ['id' => $post->id ])}}" >{{'@'}}{{$post->$title}}</a></li>
        @endforeach--}}
    </ul>
@endsection
