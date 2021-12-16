@extends('layouts.app')

@section('title')
    Users being followed by: {{ $user->user_name }}.
@endsection

@section('content')
    <p>{{ $user->user_name}} is following {{ sizeof($followings)}}</p>
    @foreach( $followings as $following)
        <p>Username: {{ $following->user_name}}</p>
    @endforeach
@endsection
