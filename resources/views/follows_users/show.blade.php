@extends('layouts.app')

@section('title')
    Users Being Followed by: {{ "@" . $user->user_name }}.
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <div class="card-body">
                    <p>{{ "@" . $user->user_name}} is following {{ sizeof($followings)}} user(s)</p>
                    @foreach( $followings as $following)
                        <a href="{{ route('users.show', ['id' => $following->id])}}">{{ "@" . $following->user_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container mt-5">

    {{--    <div class="d-flex justify-content-center">--}}
    {{--        <a href="{{ route('posts.create') }}" class="btn btn-info" role="button"--}}
    {{--           style="font-size: 22px; margin-bottom: 20px; margin-top: 20px">Post a--}}
    {{--            Quack</a>--}}
    {{--    </div>--}}

    {{--    <div class="d-flex flex-column" id="post_view">--}}
    {{--        @for ($i = 0; $i < sizeof($posts); $i++)--}}
    {{--            <div class="card" style="margin-bottom: 15px">--}}
    {{--                <div class="card-body">--}}
    {{--                    <h4 class="card-title"><a href="{{ route('posts.show', ['id' => $posts[$i]->id ])}}"--}}
    {{--                                              class="card-link">{{ $posts[$i]->title}}</a></h4>--}}
    {{--                    <h6 class="card-subtitle mb-2 text-muted">Posted by: {{ $post_authors[$i]->user_name}}</h6>--}}
    {{--                    <p class="card-text">{{ $posts[$i]->text_content}}</p>--}}
    {{--                    @if ( $post_comm_count[$i] == 0)--}}
    {{--                        <p class="card-text">No Comments</p>--}}
    {{--                    @elseif ( $post_comm_count[$i] == 1)--}}
    {{--                        <p class="card-text">1 Comment</p>--}}
    {{--                    @else--}}
    {{--                        <p class="card-text">{{ $post_comm_count[$i] }} Comments</p>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endfor--}}
    {{--    </div>--}}

    {{--    --}}{{-- Pagination --}}
    {{--    <div class="d-flex justify-content-center">--}}
    {{--        {!! $posts->links() !!}--}}
    {{--    </div>--}}

@endsection
