@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-header">Write a post here:</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <p>Title: <input class="form-control" type="text" name="title"></p>
                        <label>
                            <textarea class="form-control"  name="text_content" style="height:150px;width:100%;box-sizing: border-box;"></textarea>
                        </label>
                        <br>
                        <input class="form-control" type="file" name="img">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
