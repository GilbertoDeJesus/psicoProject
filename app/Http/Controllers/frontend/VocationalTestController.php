<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Student;
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
    public function storeTest(Request $request){
        $test= Test::where('name', 'Orientación Vocacional')->first();
        $vocationalTest = $test->questions()->orderBy('order','ASC')->get();

        $answers = [];

        foreach($vocationalTest as $lt){
            $question = 'question_' . $lt->id;
            $answers[$lt->id] = $request->$question;
        }

        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers), 'finished' => 1);
        $student->tests()->attach($student->id, $studentAnswers);

        return redirect()->route('students.trajectory');
    }
}