@extends('layouts.app')

@section('title', 'User Index')

@section('content')
    <p>These people use Fake Twitter:</p>
    <ul>
    @foreach ($users as $user)
        <li><a href="{{route('users.show', [ 'id' => $user->id ])}}" >{{'@'}}{{$user->user_name}}</a></li>
    @endforeach
    </ul>
@endsection
