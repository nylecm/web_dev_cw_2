<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentNotifierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Services\Twitter;
use Illuminate\Support\Facades\Route;

// Service Container Routes

app()->singleton(Twitter::class, function ($app) {
    return new Twitter();
});

$twitter = app()->make(Twitter::class);

//dd($twitter); //todo remove

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware(['auth'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::post('/posts/{id}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::post('/followers', [FollowUserController::class, 'store'])
    ->name('followers.store');

Route::delete('/followers/{id}', [FollowUserController::class, 'destroy'])
    ->name('followers.destroy');

Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])
    ->name('comments.edit');

Route::post('/comments/{id}', [CommentController::class, 'update'])
    ->name('comments.update');

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');

// profile:
Route::post('/profiles', [ProfileController::class, 'store'])
    ->name('profiles.store');

Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])
    ->name('profiles.edit');

Route::post('/profiles/{id}', [ProfileController::class, 'update'])
    ->name('profiles.update');

Route::post('/profiles-twitter-bio/{id}', [ProfileController::class, 'updateFromTwitter'])
    ->name('profiles.updateFromTwitter');

Route::get('/send-comment-notification', [CommentNotifierController::class, 'sendCommentNotification']);

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
