<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class LearningTestController extends Controller
{
    public function index()
    {
        $test = Test::query()
        ->where('name', 'LIKE', "%aprendizaje%")
        ->orderByDesc('id')
        ->first();
        $learningTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];
        foreach ($learningTest as $lt) {
            array_push($answers, Answer::where('question_id', $lt->id)->orderBy('order', 'DESC')->get());
        }

        $student = Student::with('tests')->find(session()->get('idAlumno')); //buscamos en la tabla student_test los test que ha realizado el estudiante
        if($student->tests->isNotEmpty()){
             foreach ($student->tests as $testF){
                if($testF->pivot->test_id == $test->id && $testF->pivot->finished==1){ //Evaluamos si el test actual ha sido finalizado por el estudiante o no
                    return redirect()->route('students.vocational'); //Si ya se ha contestado redireccionamos al siguiente test
                }
             } 
        }
        
        return view('frontend.learningStyle.learningTest', ['learningTest' => $learningTest, 'answers' => $answers]);
    }

    public function storeTest(Request $request)
    {

        $test = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();

        $learningTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];
        $answeResults = [];

        foreach ($learningTest as $lt) {

            $question = 'question_' . $lt->id;
            array_push($answeResults,$request[$question]);
            if ($request->$question == 1) {
                $answers[$lt->id] = "Nunca";
            }
            if ($request->$question == 2) {
                $answers[$lt->id] = "Ocasionalmente";
            }
            if ($request->$question == 3) {
                $answers[$lt->id] = "Regularmente";
            }
            if ($request->$question == 4) {
                $answers[$lt->id] = "Casi siempre";
            }
            if ($request->$question == 5) {
                $answers[$lt->id] = "Siempre";
            }
        }
        // $answeResult = $request->all();
        // unset($answeResult[array_search(end($answeResult), $answeResult)]);
        // unset($answeResult[array_key_first($answeResult)]);
        $visual = $answeResults[0]+$answeResults[4]+$answeResults[8]+$answeResults[9]+$answeResults[10]+$answeResults[15]+$answeResults[16]+$answeResults[21]+$answeResults[25]+$answeResults[26]+$answeResults[31]+$answeResults[35];
        $auditivo = $answeResults[1]+$answeResults[2]+$answeResults[11]+$answeResults[12]+$answeResults[14]+$answeResults[18]+$answeResults[19]+$answeResults[22]+$answeResults[23]+$answeResults[27]+$answeResults[28]+$answeResults[32];
        $kinestesico = $answeResults[3]+$answeResults[5]+$answeResults[6]+$answeResults[7]+$answeResults[13]+$answeResults[17]+$answeResults[20]+$answeResults[24]+$answeResults[29]+$answeResults[30]+$answeResults[33]+$answeResults[34];
        
        $count =  max($visual,$auditivo,$kinestesico);

        if ($count == $visual) {
            $estilo = 'Visual';
        }
        if ($count == $auditivo) {
            $estilo = 'Auditivo';
        }
        if ($count == $kinestesico) {
            $estilo = 'Kinestésico';
        }

        $results = [];
        $results['test_aprendizaje'] = $estilo;
        $results['test_status_academico'] = 'Sin definir';
        $results['student_id']= session()->get('idAlumno');

        $noRepeatResult = Result::where('student_id', session()->get('idAlumno'))->first();
        if($noRepeatResult == null){
            Result::create($results);
        }else{
            $noRepeatResult->update(['test_aprendizaje' => $estilo]);
        }

        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers), 'finished' => 1);
        $statusAprendizaje = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 3)->first();

        if ($student->tests->isEmpty()) {
            if (!empty($statusAprendizaje)) {
                $statusAprendizaje->pivot->update(['finished' => 1]);
            }else{
                $student->tests()->attach($student->id, $studentAnswers);
            }
        }else{
            $statusAprendizaje->pivot->update(['finished' => 1]);
        }


        //$student->tests()->attach($student->id, $studentAnswers);

        return redirect()->route('students.vocational');
    }
}