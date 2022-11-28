<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvancedTrajectoryTestController extends Controller
{
    public function index(){

        return view('frontend.educationalTrajectory.advancedTrajectoryTest');
    }
    
    public function storeTest(){

    }
}
