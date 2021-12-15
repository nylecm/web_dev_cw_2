<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $comment = Comment::findOrFail($id);
        if (! ($comment->isTheOwner($user) || auth()->user()->isAdmin)) {
            return redirect()->route('posts.index');
        }
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'text_content' => 'required|max:140'
        ]);

        $comment = Comment::find($id);
        if (! ($comment->isTheOwner(auth()->user()) || auth()->user()->isAdmin)) {
            return redirect()->route('posts.index');
        }
        $comment->text_content = $request->text_content;
        $comment->save();

        return redirect()->route('posts.show', ['id' => $comment->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $comment = Comment::find($id);
        if (!$comment->isTheOwner($user))
        {
            return redirect()->route('posts.index');
        }

        $comment->delete();
        session()->flash('message', 'Comment successfully deleted! id: ' . $id);
        return redirect()->route('posts.show', ['id' => $comment->post_id]);
    }

    public function apiIndex()
    {
        return Comment::all();
    }

    public function apiCommentsForPost($id)
    {
        return Comment::all()->where('post_id', $id);
    }

    public function apiStore(Request $request)
    {
//        $request->validate([
//            'text_content' => 'required|max:140'
//        ]); fixme uncomment

        $comment = new Comment();
        $comment->text_content = $request['text_content'];
        $comment->user_id = $request['user_id'];
        $comment->post_id = $request['post_id'];
        $comment->save();
        session()->flash('message', 'Comment was created' . $comment);

        // notification todo move to route.
        //$this->apiEmail($comment);

        return $comment;

    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function apiEmail(Request $request): void
    {
        session()->flash('message', 'comment_id' . $request['comment_id']);
        $comment = Comment::where('id', $request['comment_id'])->first();
        $post = Post::where('id', $comment->post_id)->first();
        $post_owner = User::where('id', $post->user_id)->first();
        $comment_poster = User::where('id', $comment->user_id)->first();
        $commentData = [
            'text_content' => $comment->text_content,
            'comment_poster' => $comment_poster->user_name,
            'post_id' => $comment->post_id
        ];
        Notification::send($post_owner, new CommentNotifier($commentData));
    }

}
