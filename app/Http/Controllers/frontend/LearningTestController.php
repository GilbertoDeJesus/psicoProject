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

        $test = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();
        $learningTest = $test->questions()->orderBy('order','ASC')->get();

        $answers=[];
        foreach($learningTest as $lt){
            array_push($answers, Answer::where('question_id',$lt->id)->get());
        }

        return view('frontend.learningStyle.learningTest',['learningTest'=> $learningTest, 'answers'=>$answers]);

    }

    public function storeTest(Request $request){

        $test = Test::query()
        ->where('name', 'LIKE', "%aprendizaje%")
        ->orderByDesc('id')
        ->first();

        $learningTest = $test->questions()->orderBy('order','ASC')->get();
        
        $answers=[];
        foreach($learningTest as $lt){
            array_push($answers, array('question_id'=> $lt->id, 'answer' => $request->question_.$lt->id));
        }
        $student = Student::where('matricula',session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id,'test_id' =>$test->id, 'answers' => json_encode($answers), 'finished' => 1);
        $student->tests()->attach($student->id, $studentAnswers);

        return redirect()->route('students.vocational');
    }
}