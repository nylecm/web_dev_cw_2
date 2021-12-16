@extends('layouts.app')

@section('title')
    Edit Comment
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        <label>
                        <textarea class="form-control" name="text_content" style="width:250px;height:150px;resize:none;">{{ $comment->text_content}}</textarea>
                        </label>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
