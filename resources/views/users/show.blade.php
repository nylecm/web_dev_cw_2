@extends('layouts.app')

@section('title')
{{ "@" . $user->user_name }}
@endsection

@section('content')
    <a href="{{route('profiles.edit', ['id' => $user->profile_id])}}">Edit Profile</a>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <p>
                Bio: {{ $profile->bio }}
            </p>
            @if ( auth()->user()->id != $user->id)
                @if( ! auth()->user()->isFollowing($user))
                    <form method="POST" action="{{ route('followers.store', ['following' => $user->id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit"  class="btn btn-info" value="Follow" style="margin-bottom: 20px">
                    </form>
                @else
                    {{--                    <form method="POST" action="{{ route('followers.delete', ['following' => $user->id]) }}">--}}
                    {{--                        @csrf--}}
                    {{--                        <input type="hidden" name="id" value="{{ $user->id }}">--}}
                    {{--                        <input type="submit" value="Unfollow">--}}
                    {{--                    </form>--}}
                @endif
            @endif
        </div>


        <div class="d-flex flex-column" id="profile_view">
            <div class="card">
                <div class="card-body">
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
            </div>
            {{--todo if not following--}}


            {{--todo else following show Unfollow button--}}


        </div>
    </div>
@endsection
