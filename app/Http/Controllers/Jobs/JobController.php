<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
   public  function index()
   {
       $jobs=Job::with('employer')->latest()->cursorPaginate(3);
        return view('jobs.index',compact('jobs'));
   }

   public  function show(Job $job){
       return view('jobs.show',compact('job'));
   }

   public  function create(){
       return view('jobs.create');
   }

    public  function store(Request $request){
        request()->validate([
            'title'=>['required','min:3'],
            'salary'=>['required'],
        ]);
        Job::create(['title' => request('title'),'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
    }

    public  function edit(Job $job){
       Gate::define('edit-job',function (User $user,Job $job){
           return $job->employer->user->is($user);
       });

       if(Auth::guest()){
          return redirect('/login');
       }
      Gate::authorize('edit-job',$job);
        return view('jobs.edit',compact('job'));

    }
    public  function update(Job $job){
        //validation
        request()->validate([
            'title'=>['required','min:3'],
            'salary'=>['required'],
        ]);
        $job->update(['title' => request('title'),'salary' => request('salary'),
        ]);

        return redirect('/jobs');
    }

    public  function destroy(Job $job){
        $job->delete();
        return redirect('/jobs');
    }
}
