@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        <p>Title: <input class="form-control" type="text" name="title" value="{{ $post->title}}"></p>
                        <label>
                            <textarea name="text_content" class="form-control"
                                      style="width:250px;height:150px;resize:none;">{{ $post->text_content}}</textarea>
                        </label>
                        <br>
                        <input class="form-control" type="file" name="img">
                        <input type="checkbox" id="update_img" name="update_img" class="form-check-input"
                               checked>
                        <label for="update_img">Update Image?</label>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
