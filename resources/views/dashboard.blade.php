@extends('layouts.app')

@section('title', 'dash')

@section('content')
    {{$user = auth()->user()}}
@endsection
