<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrajectoryTestController extends Controller
{
    public function index(){

        $trajectoryTest= \DB:: table('questions')
        ->select('questions.*')
        ->orderBy('order','ASC')
        ->get();
        return view('frontend.educationalTrajectory.trajectoryTest')->with('trajectoryTest', $trajectoryTest);

    }

    public function storeTest(){
        return redirect()->route('students.results');
    }

    public function showResults(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
