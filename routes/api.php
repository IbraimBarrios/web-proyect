<?php
use App\Http\Resources\UserResource;
use App\Http\Resources\PostResource;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
 

// user
Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});


// post
Route::get('/posts', function () {
    return PostResource::collection(Post::all());
});

Route::get('/post/{id}', function (string $id) {
    return new PostResource(Post::findOrFail($id));
});