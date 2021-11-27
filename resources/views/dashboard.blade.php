@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{$user = auth()->user()}}
    <div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
@endsection
