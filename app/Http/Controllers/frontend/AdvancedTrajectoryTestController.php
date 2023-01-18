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
    public function index()
    {

        $test = Test::where('name', 'Trayectoria académica avanzado')->first();
        $trajectoryTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];
        foreach ($trajectoryTest as $lt) {
            array_push($answers, Answer::where('question_id', $lt->id)->get());
        }

        $student = Student::with('tests')->find(session()->get('idAlumno')); //buscamos en la tabla student_test los test que ha realizado el estudiante
        if ($student->tests->isNotEmpty()) {
            foreach ($student->tests as $testF) {
                if ($testF->pivot->test_id == $test->id && $testF->pivot->finished == 1) { //Evaluamos si el test actual ha sido finalizado por el estudiante o no
                    return redirect()->route('students.advancedStoreTrajectoryTest.results'); //Si ya se ha contestado redireccionamos al siguiente test
                }
            }
        } else {
            return view('frontend.educationalTrajectory.advancedTrajectoryTest', ['trajectoryTest' => $trajectoryTest, 'answers' => $answers]);
        }

        return view('frontend.educationalTrajectory.advancedTrajectoryTest', ['trajectoryTest' => $trajectoryTest, 'answers' => $answers]);
    }

    public function storeTest(Request $request)
    {
        $test = Test::where('name', 'Trayectoria académica avanzado')->first();
        $trajectoryTest = $test->questions()->orderBy('order', 'ASC')->get();

        $answers = [];

        foreach ($trajectoryTest as $lt) {
            $question = 'question_' . $lt->id;
            $answers[$lt->id] = $request->$question;
        }

        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers, JSON_UNESCAPED_UNICODE), 'finished' => 1);

        $statusAprendizaje = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 4)->first();

        if ($student->tests->isEmpty() || $statusAprendizaje == null) {

            if (!empty($statusAprendizaje)) {
                $statusAprendizaje->pivot->update(['finished' => 1]);
            } else {
                $student->tests()->attach($student->id, $studentAnswers);
            }
        } else {
            $statusAprendizaje->pivot->update(['finished' => 1]);
        }
        return redirect()->route('students.advancedStoreTrajectoryTest.results', ['status' => 2]);
    }

    public function showResults(Request $request)
    {
        if (!$request->exists('status')) {
            $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
            $statusAprendizaje = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 4)->first();
            $status = $statusAprendizaje->pivot->finished;
            return view('frontend.educationalTrajectory.TrajectoryTestResult', ['status' => $status]);
        }
        return view('frontend.educationalTrajectory.TrajectoryTestResult', ['status' => 2]);
    }
}
