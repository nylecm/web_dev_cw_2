@extends('layouts.app')

@section('title')
    Register an Account
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <div class="card-body">

                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form method="POST" action="{{ route('register')}}">
                        @csrf
                        <p>Username: <input class="form-control" type="text" name="user_name"></p>
                        <p>Full Name: <input class="form-control" type="text" name="full_name"></p>
                        <p>Email: <input class="form-control" type="email" name="email"></p>
                        {{--        <p>Date of Birth: <input type="text" name="date_of_birth"></p>--}}
                        <p>Password: <input class="form-control" type="password" name="password" required autocomplete="new-password"></p>
                        <p>Confirm Password: <input class="form-control" type="password" name="password_confirmation" required></p>
                        <input class="btn btn-primary" type="submit" value="Submit">
                        {{--        <a href="{{ route('welcome')}}">Cancel</a>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
