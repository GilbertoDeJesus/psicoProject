<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrajectoryTestController extends Controller
{
    public function index(){
        return view('frontend.educationalTrajectory.trajectoryTest');
    }

    public function storeTest(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
