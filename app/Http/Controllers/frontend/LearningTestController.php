<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Http\Request;

class LearningTestController extends Controller
{
    public function index(){

        $test_id = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();

        $test = Test::where('id',$test_id->id)->first();
        $learningTest = $test->questions()->orderBy('order','ASC')->get();

        $answers=[];
        foreach($learningTest as $lt){
            array_push($answers, Answer::where('question_id',$lt->id)->get());
        }

        return view('frontend.learningStyle.learningTest',['learningTest'=> $learningTest, 'answers'=>$answers]);

    }

    public function storeTest(){
        return redirect()->route('students.vocational');
    }
}
