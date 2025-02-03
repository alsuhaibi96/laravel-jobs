<?php

use App\Http\Controllers\Jobs\JobController;
use App\Models\Post;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('about', 'about');
Route::view('callUs', 'call-us');
Route::view('contact', 'contact');

Route::resource('jobs',JobController::class);
