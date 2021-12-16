@extends('layouts.app')

@section('title')
    {{ "@" . $user->user_name }}
@endsection

@section('content')
    <a href="{{ route('profiles.edit', ['id' => $user->profile_id])}}">Edit Profile</a>

    <form method="POST" action="{{ route('profiles.updateFromTwitter', ['id' => $user->profile_id]) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="submit" class="btn btn-info" value="Get Bio From Twitter" style="margin-bottom: 20px">
    </form>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            @if ($profile->bio != null)
                <p>
                    Bio: {{ $profile->bio }}
                </p>
            @else
                This user does not have a bio.
            @endif

            @if ( auth()->user()->id != $user->id)
                @if( ! auth()->user()->isFollowing($user))
                    <form method="POST" action="{{ route('followers.store', ['following' => $user->id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-info" value="Follow" style="margin-bottom: 20px">
                    </form>
                @else
                    <form method="POST" action="{{ route('followers.destroy', ['id' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="btn btn-info" style="font-size: 22px; margin-bottom: 20px; margin-top: 10px">
                            Unfollow
                        </button>
                    </form>
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
