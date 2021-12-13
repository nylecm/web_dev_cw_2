<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20); // todo figure out sorting chronologically.
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // todo Get the logged in user's id.
        $user = auth()->user();
        return view('posts.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30', //todo add more...
            'text_content' => 'required|unique:posts|max:140' //todo add more...
        ]);

        $post = Post::create([
            'title' => $request->title,
            'text_content' => $request->text_content,
            'date_posted' => new DateTime('2021-11-23T22:22:22.12345Z'), // todo remove...
            'date_edited' => new DateTime('2021-11-23T22:22:22.12345Z'),
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('message', 'Post was created' . $post);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $author = DB::table('users')->where('id', $post->user_id)->first();
        $likes = DB::table('reactions')->where('post_id', $id)->where('type', 'like')->get();
        $dislikes = DB::table('reactions')->where('post_id', $id)->where('type', 'dislike')->get();
        $comments = $post->comments;
        return view('posts.show', ['post' => $post, 'author' => $author, 'likes' => $likes, 'dislikes' => $dislikes, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $user = auth()->user();
        $post = Post::findOrFail($id);
        if (!$post->isTheOwner($user))
        {
            return redirect()->route('posts.index');
        }
        return view('posts.edit', ['post' => $post]);
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
            'title' => 'required|max:30', //todo add more...
            'text_content' => 'required|max:140' //todo add more...
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->text_content = $request->text_content;
        $post->save();
//        $post->update(['title' => $request->title, 'text_content' => $request->text_content]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
