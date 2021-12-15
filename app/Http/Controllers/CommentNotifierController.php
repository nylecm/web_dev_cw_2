<?php

namespace App\Http\Controllers;

use App\Notifications\CommentNotifier;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\User;

class CommentNotifierController extends Controller
{
    public function sendCommentNotification()
    {
        $user = User::where('user_name', 'jim')->first();

        $commentData = [
            'text_content' => 'Placeholder, you have a new comment!',
        ];

        Notification::send($user, new CommentNotifier($commentData));
    }
}
