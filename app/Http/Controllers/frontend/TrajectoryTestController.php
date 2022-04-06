<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Student;
use App\Models\EducativeProgram;
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
            foreach ($student->tests as $testF) {
                if ($testF->pivot->test_id == $test->id && $testF->pivot->finished == 1) { //Evaluamos si el test actual ha sido finalizado por el estudiante o no
                    return redirect()->route('students.results'); //Si ya se ha contestado redireccionamos al siguiente test
                }
            }
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
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers), 'finished' => 1);
        $student->tests()->attach($student->id, $studentAnswers);
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
