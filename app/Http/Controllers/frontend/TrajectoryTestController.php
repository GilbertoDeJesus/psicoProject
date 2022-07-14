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


class TrajectoryTestController extends Controller
{
    public function index()
    {

        $test = Test::where('name', 'Trayectoria académica')->first();
        $trajectoryTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];
        foreach ($trajectoryTest as $lt) {
            array_push($answers, Answer::where('question_id', $lt->id)->get());
        }

        $student = Student::with('tests')->find(session()->get('idAlumno')); //buscamos en la tabla student_test los test que ha realizado el estudiante
        if ($student->tests->isNotEmpty()) {
            if($student->tests->count() <= 1){
                return redirect()->route('students.tests');
            }
            foreach ($student->tests as $testF) {
                if ($testF->pivot->test_id == $test->id && $testF->pivot->finished == 1) { //Evaluamos si el test actual ha sido finalizado por el estudiante o no
                    return redirect()->route('students.results'); //Si ya se ha contestado redireccionamos al siguiente test
                }
                
            }
        }else{
            return redirect()->route('students.tests');
        }

        return view('frontend.educationalTrajectory.trajectoryTest', ['trajectoryTest' => $trajectoryTest, 'answers' => $answers]);
    }

    public function storeTest(Request $request)
    {

        $test = Test::where('name', 'Trayectoria académica')->first();
        $trajectoryTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];

        foreach ($trajectoryTest as $lt) {
            $question = 'question_' . $lt->id;
            $answers[$lt->id] = $request->$question;
        }

        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers, JSON_UNESCAPED_UNICODE), 'finished' => 1);
        $student->tests()->attach($student->id, $studentAnswers);


        if (floatval($answers[2]) >= 8.5) {
            $answers[2] = 5;
        }
        elseif (floatval($answers[2]) <= 8.4 && floatval($answers[2]) >= 6) {
            $answers[2] = 3;
        }
        elseif (floatval($answers[2]) <= 5.9) {
            $answers[2] = 0;
        }

        $answers[3] = 1;

        $answers[4] == "No" ? $answers[4]=0:$answers[4]=5;
        $answers[5] == "No" ? $answers[5]=5:$answers[5]=0;
        $answers[7] == "No" ? $answers[7]=5:$answers[7]=0;
        $answers[10] == "No" ? $answers[10]=3:$answers[10]=5;
        $answers[11] == "No" ? $answers[11]=3:$answers[11]=5;
        $answers[12] == "No" ? $answers[12]=3:$answers[12]=5;
        $answers[13] == "Trabajo" ? $answers[13]=0:$answers[13]=3;
        
        $totalResults = $answers[2] + $answers[3] + intval($answers[4]) + intval($answers[5]) + intval($answers[7]) + intval($answers[10]) + intval($answers[11]) + intval($answers[12]) + intval($answers[13]);

        if ($totalResults >= 30) {
            $foco = 'Verde';
        }
        if ($totalResults <= 29 && $totalResults >= 21) {
            $foco = 'Amarillo';
        }
        if ($totalResults <= 20) {
            $foco = 'Rojo';
        }

        $testResults = ModelsResult::where('student_id', session()->get('idAlumno'))->first(); //Este busca el registro que se creo en el test anterior

        $testResults->update(['test_status_academico' => $foco]); //Este agrega los resultados del test

        return redirect()->route('students.results');
    }

    public function showResults()
    {
        $results = Result::where('student_id', session()->get('idAlumno'))->first();

        $careerResults1 = EducativeProgram::where('id', $results->test_orientacional1_id)->first();
        $careerResults2 = EducativeProgram::where('id', $results->test_orientacional2_id)->first();
        $careerResults3 = EducativeProgram::where('id', $results->test_orientacional3_id)->first();

        $learningResult = $results->test_aprendizaje;

        return view('frontend.learningStyle.learningStyleResult', ['careerResults1' => $careerResults1, 'careerResults2' => $careerResults2, 'careerResults3' => $careerResults3, 'learningResult' => $learningResult]);
    }
}
