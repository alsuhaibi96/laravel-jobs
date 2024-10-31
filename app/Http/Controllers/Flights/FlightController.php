<?php

namespace App\Http\Controllers\Flights;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
   public function index(){


       $flights = Flight::all()->reject(function (Flight $flight) {
           return $flight->cancelled;
       });

       return $flights;
   }
}
