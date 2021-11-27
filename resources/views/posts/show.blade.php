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
        @if ( sizeof($likes) === 0)
            <li>0 likes.
        @else
            <li>{{sizeof($likes)}} like(s).
        @endif

        @if ( sizeof($dislikes) === 0)
            0 dislikes.</li>
        @else
            {{sizeof($dislikes)}} dislike(s).</li>
        @endif

        {{--@foreach ($posts as $post)
            <li><a href="{{route('$posts.show', ['id' => $post->id ])}}" >{{'@'}}{{$post->$title}}</a></li>
        @endforeach--}}
    </ul>
@endsection
