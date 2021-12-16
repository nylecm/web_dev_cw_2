@extends('layouts.app')

@section('title')
    {{ "@" . $user->user_name }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
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
                    <a href="{{ route('follows_users.show', ['id' => $user->id])}}" class="btn btn-info"
                       role="button"
                       style="font-size: 22px;margin-right: 8px;">Users they Follow</a>
            </div>

            @if ( auth()->user() != null && auth()->user()->id != $user->id)
                @if( ! auth()->user()->isFollowing($user))
                    <form method="POST" action="{{ route('followers.store', ['following' => $user->id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-info" value="Follow" style="font-size:22px;margin-bottom: 20px">
                    </form>
                @else
                    <form method="POST" action="{{ route('followers.destroy', ['id' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="btn btn-info" style="font-size: 22px; margin-bottom: 20px">
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
                            Email: {{ $user->email}}<br>
                            @if( $user->date_of_birth != null)
                                Date of Birth: {{ $user->date_of_birth}}
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

        <h4 style="padding-top: 10px"> {{ "@" . $user->user_name }}'s Quacks:</h4>

        <div class="d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" class="btn btn-info" role="button"
               style="font-size: 22px; margin-bottom: 20px; margin-top: 20px">Post a
                Quack</a>
        </div>

        <div class="d-flex flex-column" id="post_view">
            @for ($i = 0; $i < sizeof($posts); $i++)
                <div class="card" style="margin-bottom: 15px">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('posts.show', ['id' => $posts[$i]->id ])}}"
                                                  class="card-link">{{ $posts[$i]->title}}</a></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Posted by: {{ $user->user_name}}</h6>
                        <p class="card-text">{{ $posts[$i]->text_content}}</p>
                        @if ( $post_comm_count[$i] == 0)
                            <p class="card-text">No Comments</p>
                        @elseif ( $post_comm_count[$i] == 1)
                            <p class="card-text">1 Comment</p>
                        @else
                            <p class="card-text">{{ $post_comm_count[$i] }} Comments</p>
                        @endif
                    </div>
                </div>
            @endfor
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
