<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();
    return view('posts',compact('posts'));
});

Route::get('/posts/{post}', function ($slug) {
    $post =Post::find($slug);
    return view('post',compact('post'));
})->where('post','[A-z_-]+');

