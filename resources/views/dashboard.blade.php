@extends('layouts.app')

@section('title')
    Hello {{ $user->user_name }}.</a>
@endsection

@section('content')


    <div class="container mt-5">
        <div class="d-flex justify-content-center" style="margin-bottom: 20px">
            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Your
                Profile</a>
            <a href=" {{ route('posts.index')}}" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Latest
                Quacks</a>
{{--            <a href="/register" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Your--}}
{{--                Follower's Posts</a>--}}
            <a href="{{ route('posts.create') }}" class="btn btn-info" role="button"
               style="font-size: 22px;margin-right: 8px">Post a
                Quack</a>
        </div>

        <h3>Latest Quacks:</h3>
        <div class="container-fluid">
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                @for($i = 0; $i < sizeof($latest_posts); $i++)
                    <div class="col-3">
                        <div class="card card-block" style="min-height: 190pt">
                            <div class="card-body">
                                <h4>{{ $latest_posts[$i]->title }}</h4>
                                <p class="card-text">{{ $latest_posts[$i]->text_content }}</p>
                                <p class="card-text">Posted by: {{ $latest_posts_user_names[$i] }}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <h3>Your Latest Quacks:</h3>
            <div class="container-fluid">
                <div class="d-flex flex-row flex-nowrap overflow-auto">
                    @foreach( $latest_posts_for_cur_usr as $post)
                        <div class="col-3">
                            <div class="card card-block" style="min-height: 190pt">
                                <div class="card-body">
                                    <h4>{{ $post->title }}</h4>
                                    <p class="card-text">{{ $post->text_content }}</p>
                                    <p class="card-text">Posted by: {{ $user->user_name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


@endsection
