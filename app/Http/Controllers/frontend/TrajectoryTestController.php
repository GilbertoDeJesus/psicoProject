<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrajectoryTestController extends Controller
{
    public function index(){

        $trajectoryTest= \DB:: table('questions')
        ->select('questions.*')
        ->where('test_id', $test_id)
        ->orderBy('order','ASC')
        ->first();
        return view('frontend.educationalTrajectory.trajectoryTest')->with('trajectoryTest', $trajectoryTest);

    }

    public function storeTest(){
        return redirect()->route('students.results');
    }

    public function showResults(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
