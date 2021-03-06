<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comments', [CommentController::class, 'apiIndex'])
    ->name('api.comments.index');


Route::get('/comments/{id}', [CommentController::class, 'apiCommentsForPost'])
    ->name('api.comments.index.forpost');

Route::post('/comments', [CommentController::class, 'apiStore'])
    ->name('api.comments.store');

Route::post('/comments-email', [CommentController::class, 'apiEmail'])
    ->name('api.comments.email');
