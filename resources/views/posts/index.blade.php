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
            @for ($i = 0; $i < sizeof($posts); $i++)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('posts.show', ['id' => $posts[$i]->id ])}}"
                                                  class="card-link">{{ $posts[$i]->title}}</a></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Posted by: {{ $post_authors[$i]}}</h6>
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
