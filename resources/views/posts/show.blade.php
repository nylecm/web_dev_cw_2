@extends('layouts.app')


@section('style')
    <style>
        .img_frame {
            width: 50%;
            min-width: 300px;
        }
    </style>
@endsection

@section('title', 'Post')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column" id="post_view">
            <div class="card">
                <h4>{{ $post->title}}</h4>

                <p>{{ $post->text_content}}</p>
                <p>Created: {{$post->created_at}}, Edited: {{$post->updated_at}}</p>
                <p>Posted by: {{ $author->user_name}}</p>
                <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>
                @if ($post->img_path != null)
                    <img class="img_frame" src="{{ asset('post_img/' . $post->img_path)}}">
                @endif
            </div>

            <div id="root">
                        <div class="card" v-for="comment in comments">@{{ comment.text_content }}</div>
                </ul>
                <input type="text" id="input" v-model="newComment">
                <button @click="createComment">Post Comment</button>
            </div>

        </div>
    </div>
    <h5>Comments:</h5>

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
                        user_id: this.userId
                    })
                        .then(response => {
                            console.log(response.data);
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

@endsection
