@extends('layouts.app')

@section('title', 'Fake Twitter Home')

@section('content')
    <p>Welcome to Fake Twitter!</p>
    <p>Log in</p>
    <p>Sign up</p>
    <p>Temp links:</p>
    <ol>
        <li><a href="{{ route('users.index')}}">Users Index</a></li>
    </ol>
@endsection
