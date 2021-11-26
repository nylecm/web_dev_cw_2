@extends('layouts.app')

@section('title', 'User Index')

@section('content')
    <p>These people use Fake Twitter:</p>
    <ul>
        <li>{{'@'}}{{$user->user_name}}</li>
        <li>{{$user->full_name}}</li>
        <li>{{$user->email}}</li>
        <li>{{$user->date_of_birth}}</li>
        <a href="{{route('users.index')}}">Cancel</a>
    </ul>
@endsection
