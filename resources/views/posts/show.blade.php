@extends('layouts.app')


@section('style')
    <style>
        .img_frame {
            width: 50%;
            min-width: 300px;
        }

        .card {
            margin-bottom: 7px;
        }
    </style>
@endsection

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
{{--                <h3 class="card-header">{{ $post->title}}</h3>--}}
                <div class="card-body">
                    <p class="card-text">{{ $post->text_content}}</p>
                    @if ($post->img_path != null)
                        <img class="img_frame" src="{{ asset('post_img/' . $post->img_path)}}">
                    @endif

                    @if($post->created_at == $post->updated_at)
                        <p class="card-text">Posted: {{$post->created_at}}.</p>
                    @else
                        <p class="card-text">Posted: {{$post->created_at}}, Last Edited: {{$post->updated_at}}</p>
                    @endif

                    <p class="card-text">Posted by: <a
                            href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ "@" . $author->user_name}}</a></p>

                        <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>
                </div>
            </div>

            <h4>Comments:</h4>

            <div id="root">
                <input type="text" id="input" class="form-control" placeholder="Enter your comment here:" v-model="newComment">
                <button @click="createComment" class="btn btn-primary">Post Comment</button>
                <div class="card" v-for="comment in comments">
                    <div class="card-body">
                        <p class="card-text">@{{ comment.text_content }}</p>
                    </div>
                </div>

            </div>
        </div>

        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    comments: [],
                    newComment: '',
                    postId: {{ $post->id}},
                    userId: {{ $userId = auth()->user() === null ? -1 : auth()->user()->id}}
                },
                methods: {
                    createComment: function () {
                        axios.post("{{ route('api.comments.store')}}", {
                            text_content: this.newComment,
                            post_id: this.postId,
                            user_id: this.userId,
                        })
                            .then(response => {
                                axios.get("{{ route('api.comments.index.forpost', ['id' => $post->id])}}")
                                    .then(response => {
                                        console.log(response.data)
                                        console.log(this.comments)
                                        this.comments = response.data;
                                    })
                                    .catch(response => {
                                        console.log(response);
                                    })
                            })
                            .catch(response => {
                                console.log(response);
                            })
                    }
                },
                mounted() {
                    axios.get("{{ route('api.comments.index.forpost', ['id' => $post->id])}}")
                        .then(response => {
                            console.log(response.data)
                            console.log(this.comments)
                            this.comments = response.data;
                        })
                        .catch(response => {
                            console.log(response);
                        })
                }
            });
        </script>

@endsection
