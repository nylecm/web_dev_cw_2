@extends('layouts.app')

@section('title')
    Edit profile
@endsection

@section('content')
    <form method="POST" action="{{ route('profiles.update', $profile->id) }}">
        @csrf
        <label>
            <textarea name="bio"
                      style="width:250px;height:150px;resize:none;">{{ $profile->bio}}</textarea>
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
@endsection
