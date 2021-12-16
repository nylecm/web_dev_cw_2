@extends('layouts.app')

@section('title')
    {{ "@" . $user->user_name }}
@endsection

@section('content')
    {{--    @if ( auth()->user() != null && (auth()->user()->id == $user->id || auth()->user()->isAdmin))--}}
    {{--        <a href="{{ route('profiles.edit', ['id' => $user->profile_id])}}" class="btn btn-info" role="button"--}}
    {{--           style="font-size: 22px;margin-right: 8px">Edit Profile</a>--}}

    {{--        <form method="POST" action="{{ route('profiles.updateFromTwitter', ['id' => $user->profile_id]) }}">--}}
    {{--            @csrf--}}
    {{--            <input type="hidden" name="id" value="{{ $user->id }}">--}}
    {{--            <input type="submit" class="btn btn-info" value="Get Bio From Twitter" style="margin-bottom: 20px">--}}
    {{--        </form>--}}
    {{--    @endif--}}

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
{{--            <div class="d-flex justify-content-center" style="margin-bottom: 20px">--}}
{{--                @if ($profile->bio != null)--}}
{{--                    <p>Bio: {{ $profile->bio }}</p>--}}
{{--                @else--}}
{{--                    <p>This user does not have a bio.</p>--}}
{{--                @endif--}}
{{--            </div>--}}

            <div class="d-flex justify-content-center" style="margin-bottom: 20px">
                @if ( auth()->user() != null && (auth()->user()->id == $user->id || auth()->user()->isAdmin))
                    <a href="{{ route('profiles.edit', ['id' => $user->profile_id])}}" class="btn btn-info"
                       role="button"
                       style="font-size: 22px;margin-right: 8px;">Edit Profile</a>

                    <form method="POST" action="{{ route('profiles.updateFromTwitter', ['id' => $user->profile_id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-info" value="Get Bio From Twitter"
                               style="font-size: 22px">
                    </form>
                @endif
            </div>

            @if ( auth()->user() != null && auth()->user()->id != $user->id)
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
                    <h3 class="card-header">{{ $user->full_name}}</h3>
                    <p class="card-text">
                        @if( auth()->user() != null && (auth()->user()->id == $user->id || auth()->user()->isAdmin))
                            Email: {{$user->email}}<br>
                            @if( $user->date_of_birth != null)
                                Date of Birth: {{$user->date_of_birth}}
                            @endif
                        @endif
                    </p>
                    @if ($profile->bio != null)
                        <p class="card-text">Bio: {{ $profile->bio }}</p>
                    @else
                        <p class="card-text">This user does not have a bio.</p>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection
