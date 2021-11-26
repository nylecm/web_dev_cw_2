@extends('layouts.app')

@section('title')
    Registering a User
@endsection

@section('content')
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register')}}">
        @csrf
        <p>Username: <input type="text" name="user_name"></p>
        <p>Full Name: <input type="text" name="full_name"></p>
        <p>Email: <input type="email" name="email"></p>
{{--        <p>Date of Birth: <input type="text" name="date_of_birth"></p>--}}
        <p>Password: <input type="password" name="password" required autocomplete="new-password"></p>
        <p>Confirm Password: <input type="password" name="password_confirmation" required></p>
        <input type="submit" value="Submit">
{{--        <a href="{{ route('welcome')}}">Cancel</a>--}}
    </form>
@endsection
