<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [\App\Http\Controllers\API\Auth\RegisterController::class, 'register']);
Route::post('login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login']);
Route::post('reset_password', [\App\Http\Controllers\API\Auth\LoginController::class, 'reset_password']);
Route::post('updatePassword', [\App\Http\Controllers\API\Auth\LoginController::class,'updatePassword']);

Route::get('/github', [\App\Http\Controllers\API\Auth\GithubAuthController::class,'auth']);
Route::get('/github/callback', [\App\Http\Controllers\API\Auth\GithubAuthController::class,'callback']);

Route::get('/google', [\App\Http\Controllers\API\Auth\GoogleAuthController::class,'auth']);
Route::get('/google/callback', [\App\Http\Controllers\API\Auth\GoogleAuthController::class,'callback']);


Route::group(['middleware' => 'auth:sanctum'],function () {
    Route::get('logout',[\App\Http\Controllers\API\Auth\ProfileController::class, 'logout']);
    Route::get('updateProfile',[\App\Http\Controllers\API\Auth\ProfileController::class, 'updateProfile']);

    Route::get('get_friend_list',[\App\Http\Controllers\API\FreindController::class, 'get_friend_list']);
    Route::post('send_friend_request',[\App\Http\Controllers\API\FreindController::class, 'send_friend_request']);
    Route::get('get_Friend_Requests',[\App\Http\Controllers\API\FreindController::class, 'get_Friend_Requests']);
    Route::post('accept_friend_request',[\App\Http\Controllers\API\FreindController::class, 'accept_friend_request']);
    Route::post('deny_Friend_Request',[\App\Http\Controllers\API\FreindController::class, 'deny_Friend_Request']);
    Route::post('unfriend',[\App\Http\Controllers\API\FreindController::class, 'unfriend']);
    Route::post('blockFriend',[\App\Http\Controllers\API\FreindController::class, 'blockFriend']);
    Route::post('unblockFriend',[\App\Http\Controllers\API\FreindController::class, 'unblockFriend']);

    Route::resource('posts',\App\Http\Controllers\API\PostController::class)->except('update');
    Route::resource('comment', \App\Http\Controllers\API\CommentController::class)->only('store');
    Route::resource('like', \App\Http\Controllers\API\LikeController::class)->only('store');
    Route::resource('share', \App\Http\Controllers\API\ShareController::class)->only('store');
    Route::resource('feed', \App\Http\Controllers\API\FeedController::class)->only('index');

});
