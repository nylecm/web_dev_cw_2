@extends('layouts.app')

@section('title', 'User Index')

@section('content')
    <p>These people use Fake Twitter:</p>
    <ul>
    @foreach ($users as $user)
        <li>{{'@'}}{{$user->user_name}}</li>
    @endforeach
    </ul>
@endsection
