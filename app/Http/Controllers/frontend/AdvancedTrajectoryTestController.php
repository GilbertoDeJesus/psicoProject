<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Student;
use App\Models\EducativeProgram;
use App\Models\Result as ModelsResult;
use App\Models\Result;
use Illuminate\Http\Request;

class AdvancedTrajectoryTestController extends Controller
{
    public function index(){

        $test = Test::where('name', 'Trayectoria académica avanzado')->first();
        $trajectoryTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];
        foreach ($trajectoryTest as $lt) {
            array_push($answers, Answer::where('question_id', $lt->id)->get());
        }

        return view('frontend.educationalTrajectory.advancedTrajectoryTest' , ['trajectoryTest' => $trajectoryTest, 'answers' => $answers] );
    }
    
    public function storeTest(){

    }
}
