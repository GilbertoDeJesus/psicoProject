<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Http\Request;

class VocationalTestController extends Controller
{
    public function index(){

        $test= Test::where('name', 'Orientación Vocacional')->first();
        $vocationalTest = $test->questions()->orderBy('order','ASC')->get();

        $answers=[];
        foreach($vocationalTest as $lt){
            array_push($answers, Answer::where('question_id',$lt->id)->get());
        }

        return view('frontend.vocationalOrientation.vocationalTest',['vocationalTest'=> $vocationalTest, 'answers'=>$answers]);

    }
    public function storeTest(){
        return redirect()->route('students.trajectory');
    }
}