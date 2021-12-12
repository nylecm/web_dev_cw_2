@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h4>{{ $post->title}}</h4>

    <p>{{ $post->text_content}}</p>
    <p>Created: {{$post->created_at}}, Edited: {{$post->updated_at}}</p>
    <p>Posted by: {{ $author->user_name}}</p>
    <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>

    <h5>Comments:</h5>

    <div id="root">
        <ul>
            <li v-for="comment in comments">@{{ comment.text_content }}</li>
        </ul>
        <input type="text" id="input" v-model="newComment">
        <button @click="createComment">Post Comment</button>
    </div>

    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
                newComment: '',
                postId: {{ $post->id}},
            },
            methods: {
                createComment: function () {
                    axios.post("{{ route('api.comments.store')}}", {
                        text_content: this.newComment,
                        post_id: this.postId
                    })
                        .then(response => {
                            this.comments.push(response.data);
                            this.newComment = '';
                        })
                        .catch(response => {
                            console.log(response);
                        })
                }
            },
            mounted() {
                axios.get("{{ route('api.comments.index.forpost', ['id' => $post->id])}}")
                    .then(response => {
                        this.comments = response.data;
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        });
    </script>

    {{--    <script>--}}
    {{--        var app = new Vue({--}}
    {{--            el: '#commentHandle',--}}
    {{--            data: {--}}
    {{--                comments: ["Dummy"]--}}
    {{--            },--}}
    {{--            methods: {--}}
    {{--                createComment() {--}}
    {{--                    this.comments.push(this.newComment);--}}
    {{--                    this.newComment = "";--}}
    {{--                },--}}

    {{--                }--}}
    {{--            },--}}

    {{--        });--}}
    {{--    </script>--}}

    {{--    @foreach ($comments as $comment)--}}
    {{--        <p>Posted by: {{ $comment->text_content }}</p>--}}
    {{--        <p>{{ $comment->user_id }}</p>--}}
    {{--    @endforeach--}}


@endsection
