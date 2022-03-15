<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Http\Request;


class TrajectoryTestController extends Controller
{
    public function index(){

        $test_id = Test::query()
            ->where('name', 'LIKE', "%informacion academica%")
            ->orderByDesc('id')
            ->first();

        $test = Test::where('id',$test_id->id)->orderBy('id','ASC')->first();
        $trajectoryTest = $test->questions()->orderBy('order','ASC')->get();

        return view('frontend.educationalTrajectory.trajectoryTest')->with('trajectoryTest', $trajectoryTest);

    }

    public function storeTest(){
        return redirect()->route('students.results');
    }

    public function showResults(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
