@extends('layouts.app')

@section('title')
    Edit Comment
@endsection

@section('content')
    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        <label>
            <textarea name="text_content"
                      style="width:250px;height:150px;resize:none;">{{ $comment->text_content}}</textarea>
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>

@endsection
