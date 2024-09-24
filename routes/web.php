<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $files=\Illuminate\Support\Facades\File::files(resource_path('posts'));
  $posts=[];

  foreach($files as $file){
      $document=\Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
      $posts[]= new Post(
          $document->title,
          $document->date,
          $document->excerpt,
          $document->body(),
      );
  }

  return view('posts',compact('posts'));
});

Route::get('/posts/{post}', function ($slug) {
    $post =Post::find($slug);
    return view('post',compact('post'));
})->where('post','[A-z_-]+');

