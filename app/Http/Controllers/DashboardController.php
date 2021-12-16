<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function showDashboard() {
        $user = User::where('id', auth()->user()->id)->first();
        $latestPosts = Post::latest()->take(5)->get();
        $latestPostsAuthors = [];
        foreach ($latestPosts as $latestPost) {
            $latestPostAuthor = User::where('id', $latestPost->user_id)->first();
            $latestPostsAuthors[] = $latestPostAuthor->user_name;
        }

        $latestPostsForCurUsr = Post::latest()->where('user_id', auth()->user()->id)->take(5)->get();

        return view('dashboard', ['user' => $user, 'latest_posts' => $latestPosts, 'latest_posts_user_names' => $latestPostsAuthors, 'latest_posts_for_cur_usr' => $latestPostsForCurUsr]);
    }
}
