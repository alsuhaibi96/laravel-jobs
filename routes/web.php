<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/callUs', function () {
    return view('call-us');
});

