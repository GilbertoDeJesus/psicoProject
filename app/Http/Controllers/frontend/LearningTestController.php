<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class LearningTestController extends Controller
{
    public function index(){

        $test_id = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();

        $test = Test::where('id',$test_id->id)->orderBy('id', 'ASC')->first();
        $learningStyle = $test->questions()->orderBy('order', 'ASC')->get();

        $answers=[];
        foreach($learningStyle as $lt){
            array_push($answers, Answer::where('question_id',$lt->id)->get());

         return view('frontend.learningStyle.learningTest',['learningTest'=> $learningStyle, 'answers'=>$answers]);
    }
}

    public function storeTest(){
        return redirect()->route('students.vocational');
    }
}
