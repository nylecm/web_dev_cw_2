@extends('layouts.app')

@section('style')
    <style>
        .card {
            margin-bottom: 15px;
        }

        .btn
    </style>
@endsection

@section('title')
    Posts
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" class="btn btn-info" role="button"
               style="font-size: 22px; margin-bottom: 20px">Post a
                Quack</a>
        </div>

        <div class="d-flex flex-column" id="post_view">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('posts.show', ['id' => $post->id ])}}"
                                                  class="card-link">{{ $post->title}}</a></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Posted by: {{ $post->user_id}}</h6>
                        <p class="card-text">{{ $post->text_content}}</p>
                        <p class="card-text">X Comments</p>

                        <form id={{"grp" . $post->id}}>
                            <p>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"
                                 id="{{$post->id}}"> {{--todo limit choices to 1--}}
                                <input type="checkbox" class="btn-check" id="{{ "btncheck1" . $post->id}}"
                                       autocomplete="off">
                                <label class="btn btn-primary" for="{{ "btncheck1" . $post->id}}">👍</label>
                                <input type="checkbox" class="btn-check" id="{{ "btncheck2" . $post->id}}"
                                       autocomplete="off">
                                <label class="btn btn-primary" for="{{ "btncheck2" . $post->id}}">👎</label>
                            </div>
                            </p>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>

    {{--            <form id='group2'>--}}
    {{--                <li><a href="{{ route('posts.show', ['id' => $post->id ])}}">{{'@'}}{{ $post->title}}</a></li>--}}
    {{--                <li>{{ $post->text_content}}</li>--}}
    {{--                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="22">--}}
    {{--                    <li>--}}
    {{--                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"--}}
    {{--                               checked="">--}}
    {{--                        <label class="btn btn-outline-primary" for="btnradio1"> Like <br> 1</label>--}}
    {{--                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"--}}
    {{--                               checked="">--}}
    {{--                        <label class="btn btn-outline-primary" for="btnradio2">Dislike<br> 1</label></li>--}}
    {{--                </div>--}}
    {{--            </form>--}}

    {{--    <div>--}}
    {{--        <ul class="pagination pagination-lg">--}}
    {{--            <li class="page-item disabled">--}}
    {{--                <a class="page-link" href="#">&laquo;</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item active">--}}
    {{--                <a class="page-link" href=".../1">1</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item">--}}
    {{--                <a class="page-link" href=".../2">2</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item">--}}
    {{--                <a class="page-link" href=".../3">3</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item">--}}
    {{--                <a class="page-link" href="../4">4</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item">--}}
    {{--                <a class="page-link" href="../5">5</a>--}}
    {{--            </li>--}}
    {{--            <li class="page-item">--}}
    {{--                <a class="page-link" href="">&raquo;</a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}

@endsection
