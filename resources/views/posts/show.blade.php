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
            @if ( sizeof($likes) === 1)
                <li>{{ sizeof($likes)}} like,
            @else
                <li>{{ sizeof($likes)}} likes,
            @endif
        @endif


                @if ( sizeof($dislikes) === 0)
            0 dislikes.</li>
        @else
            @if ( sizeof($dislikes) === 1)
                {{ sizeof($dislikes)}} dislike.</li>
            @else
                {{ sizeof($dislikes)}} dislikes.</li>
            @endif
        @endif
    </ul>
@endsection
