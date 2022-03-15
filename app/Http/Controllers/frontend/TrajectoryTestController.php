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

        $answers=[];
        foreach($trajectoryTest as $lt){
            array_push($answers, Answer::where('question_id',$lt->id)->get());
        }

        return view('frontend.educationalTrajectory.trajectoryTest',['trajectoryTest'=> $trajectoryTest, 'answers'=>$answers]);


    }

    public function storeTest(){
        return redirect()->route('students.results');
    }

    public function showResults(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
