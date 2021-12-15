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
        $posts = Post::paginate(12); // todo figure out sorting chronologically.
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
            'text_content' => 'required|unique:posts|max:140',
            'img' => 'mimes:jpg,png,jpeg|max:1096' // max size in KB.
        ]);
        $newImgName = null;
        if ($request->img != null) {
            $newImgName = time() . '_' . $request->name . '.' . $request->img->extension();
            $request->img->move(public_path('post_img'), $newImgName);
        }

        $post = Post::create([
            'title' => $request->title,
            'text_content' => $request->text_content,
            'img_path' => $newImgName,
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
        if (!(auth()->user()->isAdmin || $post->isTheOwner($user))) {
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

        if ($request->update_img) {
            if ($request->img != null) {
                $newImgName = time() . '_' . $request->name . '.' . $request->img->extension();
                $request->img->move(public_path('post_img'), $newImgName);
                $post->img_path = $newImgName;
            } else {
                $post->img_path = "";
            }
        }

        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
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
        $post = Post::find($id);
        if (! (auth()->user()->isAdmin || $post->isTheOwner($user))) {
            return redirect()->route('posts.index');
        }

        $post->delete();
        session()->flash('message', 'Post successfully deleted! id: ' . $id);
        return redirect()->route('posts.index');
    }
}
