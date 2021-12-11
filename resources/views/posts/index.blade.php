@extends('layouts.app')

@section('title', 'Post Index')

@section('content')

    <p>These are the posts on Fake Twitter:</p>



    @foreach ($posts as $post)
        <h4><a href="{{ route('posts.show', ['id' => $post->id ])}}">{{ $post->title}}</a></h4>

        <p>{{ $post->text_content}}</p>

        <form id={{"grp" . $post->id}}>
            <p>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"
                 id="{{$post->id}}"> {{--todo limit choices to 1--}}
                <input type="checkbox" class="btn-check" id="{{ "btncheck1" . $post->id}}" autocomplete="off">
                <label class="btn btn-primary" for="{{ "btncheck1" . $post->id}}">👍</label>
                <input type="checkbox" class="btn-check" id="{{ "btncheck2" . $post->id}}" autocomplete="off">
                <label class="btn btn-primary" for="{{ "btncheck2" . $post->id}}">👎</label>
            </div>
            </p>
        </form>

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
    @endforeach

@endsection
