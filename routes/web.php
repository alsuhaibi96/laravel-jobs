<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
Route::get('register', [RegisteredUserController::class,'create'])->name('register');
Route::post('register', [RegisteredUserController::class,'store'])->name('store.new.user');

Route::get('login', [LoginController::class,'create'])->name('login');
Route::post('login', [LoginController::class,'store'])->name('login.user');
