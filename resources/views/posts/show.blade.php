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
                            href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ "@" . $author->user_name}}</a>
                    </p>

                    {{--                    <p>{{ sizeof($likes)}} 👍 {{ sizeof($dislikes)}} 👎</p>--}}
                </div>
            </div>

            @if(auth()->user() != null && ( auth()->user()->isAdmin || auth()->user()->id == $post->user_id))
                <div class="d-flex justify-content-center">
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info" role="button"
                       style="font-size: 22px; margin-bottom: 20px; margin-top: 10px;margin-right: 8px">Edit this
                        Quack</a>
                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-info" style="font-size: 22px; margin-bottom: 20px; margin-top: 10px">
                            Delete
                        </button>
                    </form>
                </div>
            @endif

            <h4>Comments:</h4>

            <div id="root">
                @if (auth()->user() != null)
                    <input type="text" id="input" class="form-control" placeholder="Enter your comment here:"
                           v-model="newComment">
                    <button @click="createComment" class="btn btn-primary" style="margin-top: 10px;margin-bottom: 10px">Post Comment</button>
                @endif
                <div class="card" v-for="comment in comments">
                    <div class="card-body">
                        <p class="card-text">@{{ comment.text_content }}</p>
                    </div>
                    @if (auth()->user() != null)
                        <div class=" d-flex justify-content-left"
                             v-if="({{ auth()->user()->id}} == comment.user_id || {{ auth()->user()->isAdmin }})">

                            <a :href="'/comments/' + comment.id + '/edit'" class="btn btn-info"
                               onclick="this.href=comment.id+'/edit';return false;"
                               role="button"
                               style="margin-bottom: 7px; margin-top: 7px; margin-right: 10px;margin-left: 15px">Edit this Comment</a>

                            <form method="POST" :action="'/comments/'+comment.id">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-info"
                                        style="margin-bottom: 7px; margin-top: 7px">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
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
                        function emailNotification(id) {
                            axios.post("{{ route('api.comments.email') }}",
                                {comment_id: id})
                        }

                        axios.post("{{ route('api.comments.store')}}", {
                            text_content: this.newComment,
                            post_id: this.postId,
                            user_id: this.userId,
                        })
                            .then(response => {
                                console.log('id' + response.data.id);
                                emailNotification(response.data.id);
                                axios.get("{{ route('api.comments.index.forpost', ['id' => $post->id])}}")
                                    .then(response => {
                                        console.log(response.data);
                                        console.log(this.comments);
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
