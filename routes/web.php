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
    return view('jobs.index',[
        'jobs'=> Job::with('employer')->latest()->cursorPaginate(3),
    ]);
});
Route::get('/jobs/create', function (Job $job) {
return view('jobs.create');
});

Route::post('/jobs', function () {
   //validation
    request()->validate([
       'title'=>['required','min:3'],
       'salary'=>['required'],
    ]);
    Job::create(['title' => request('title'),'salary' => request('salary'),
        'employer_id' => 1,
        ]);
return redirect('/jobs');
});
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show',['job'=>$job]);
});


Route::get('/test', [\App\Http\Controllers\Flights\FlightController::class,'index']);
