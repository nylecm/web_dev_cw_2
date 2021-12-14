@extends('layouts.app')

@section('title')
    Hello {{ auth()->user()->user_name }}.</a>
@endsection

@section('content')


    <div class="container mt-5">
        <div class="d-flex justify-content-center" style="margin-bottom: 20px">
            <a href="/register" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Your
                Profile</a>
            <a href="/register" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Latest
                Posts</a>
            <a href="/register" class="btn btn-info" role="button" style="font-size: 22px;margin-right: 8px">Your
                Follower's Posts</a>
            <a href="{{ route('posts.create') }}" class="btn btn-info" role="button"
               style="font-size: 22px;margin-right: 8px">Post a
                Quack</a>
        </div>

        h3>Latest Posts:</h3>
        <div class="container-fluid">
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
            </div>
        </div>
        <h3>Your Follower's Posts:</h3>
        <div class="container-fluid">
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
            </div>
        </div>
        <h3>Your Posts:</h3>
        <div class="container-fluid">
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card</div>
                </div>
            </div>
        </div>

    </div>
    <p><a href="{{ route('posts.index') }}">View some cool Quacks!</a></p>
    {{$user = auth()->user()}}
    {{--<div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>--}}

@endsection
