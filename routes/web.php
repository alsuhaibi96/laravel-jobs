<?php

use App\Models\Post;
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

Route::get('/jobs', function () {
    return view('jobs',[
        'jobs'=>  [
            ['id'=>1,'title'=>'Director','salary'=>'$10000'],
            ['id'=>2,'title'=>'Teacher','salary'=>'$15000'],
            ['id'=>3,'title'=>'Developer','salary'=>'$20000']
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs=
        [
        ['id'=>1,'title'=>'Director','salary'=>'$10000'],
        ['id'=>2,'title'=>'Teacher','salary'=>'$15000'],
        ['id'=>3,'title'=>'Developer','salary'=>'$20000']
    ];

    $job= Arr::first($jobs,fn($job)=>$job['id']==$id);
    return view('job',['job'=>$job]);
});
