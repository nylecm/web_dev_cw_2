@extends('layouts.app')

@section('title', 'User Index')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="profile_view">
            <div class="card">
                <h4 class="card-title">{{ "@" . $user->user_name }}</h4>
                <p class="card-text">
                    {{ $user->full_name}}
                    @if(auth()->user()->id === $user->id)
                        , {{$user->email}}
                        Date of Birth: {{$user->date_of_birth}}
                    @endif
                </p>
                <li>Click here to see his/her posts:</li>
                <a href="{{route('users.index')}}">Cancel</a>
            </div>
            {{--todo if not following--}}
            @if (auth()->user()->id != $user->id)
                <form method="POST" action="{{ route('followers.store', $user_id) }}">
                    @csrf
                    <input type="submit" value="Follow">
                </form>
            @endif
            {{--todo else following show Unfollow button--}}


        </div>
    </div>
@endsection
