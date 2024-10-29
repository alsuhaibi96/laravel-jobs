<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public  static function all ():array
    {
        return [
            ['id'=>1,'title'=>'Director','salary'=>'$10000'],
            ['id'=>2,'title'=>'Teacher','salary'=>'$15000'],
            ['id'=>3,'title'=>'Developer','salary'=>'$20000']
        ];

    }

    public  static function find (int $id):array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (!$job) {
            abort(404);
        }
           return $job;
    }
}
