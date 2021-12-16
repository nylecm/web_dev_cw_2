@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <div class="container mt-5">

        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <p>Write a post here:</p>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <p>Title: <input type="text" name="title"></p>
                <label>
                    <textarea name="text_content" style="width:250px;height:150px;resize:none;"></textarea>
                </label>
                <br>
                <input type="file" name="img">
                    <br>
                <input type="submit" value="Submit">
            </form>
            <div class="card-body">

            </div>


        </div>
    </div>
    </div>


@endsection
