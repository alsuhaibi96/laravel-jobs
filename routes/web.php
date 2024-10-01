<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('posts',[
      'posts' => Post::all()
  ]);
});

Route::get('/posts/{post}', function ($slug) {
    $post =Post::find($slug);
    return view('post',compact('post'));
})->where('post','[A-z_-]+');

Route::get('/offline', function () {
    return view('modules/laravelpwa/offline');
});
