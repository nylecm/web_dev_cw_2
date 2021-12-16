@extends('layouts.app')

@section('title')
    Edit profile
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
