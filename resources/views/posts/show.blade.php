@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h4>{{ $post->title}}</h4>

    <p>{{ $post->text_content}}</p>
    <p>Created: {{$post->created_at}}, Edited: {{$post->updated_at}}</p>
    <p>Posted by: {{ $author->user_name}}</p>
    <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>

    <h5>Comments:</h5>

    <div id="commentHandle">
        <ul>
            <li v-for="comment in comments">@{{ comment.text_content }}</li>
        </ul>
        <input type="text" v-model="newComment">
        <button @click="addComment">Add Name</button>

        @{{ message }}
    </div>

    <script>
        var app = new Vue({
            el: '#commentHandle',
            data: {
                comments: ["Dummy"]
            },
            methods: {
                addComment() {
                    this.comments.push(this.newComment);
                    this.newComment = "";
                }
            },
            mounted() {
                axios.get("{{route('api.comments.index')}}")
                    .then(response => {
                        this.comments = response.data;
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        });
    </script>

    @foreach ($comments as $comment)
        <p>Posted by: {{ $comment->text_content }}</p>
        <p>{{ $comment->text_content }}</p>
    @endforeach


@endsection
