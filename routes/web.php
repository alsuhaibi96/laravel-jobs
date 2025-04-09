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

//Route::resource('jobs',JobController::class);
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store')->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
// this was the gate Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware(['auth','can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware(['auth'])->can('edit','job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');


Route::get('register', [RegisteredUserController::class,'create'])->name('register');
Route::post('register', [RegisteredUserController::class,'store'])->name('store.new.user');

Route::get('login', [LoginController::class,'create'])->name('login');
Route::post('login', [LoginController::class,'store'])->name('login.user');

Route::post('logout', [LoginController::class,'destroy'])->name('logout');

