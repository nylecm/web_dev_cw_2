@extends('layouts.app')

@section('title', 'dash')

@section('content')
    {{$user = auth()->user()}}
    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Log Out</button>
    </form>
@endsection
