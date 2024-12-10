<?php

use App\Models\Post;
use App\Models\Job;
use Illuminate\Support\Arr;
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

Route::get('/jobs', function ()  {
    return view('jobs',[
        'jobs'=> Job::with('employer')->get(),
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job',['job'=>$job]);
});


Route::get('/test', [\App\Http\Controllers\Flights\FlightController::class,'index']);
