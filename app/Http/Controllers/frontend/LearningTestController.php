<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
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
            array_push($answers, Answer::where('question_id', $lt->id)->get());
        }

        return view('frontend.learningStyle.learningTest', ['learningTest' => $learningTest, 'answers' => $answers]);
    }

    public function storeTest(Request $request)
    {
        $test = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();
        //Se busca la informacion del cuestionario que se contesto

        $learningTest = $test->questions()->orderBy('order', 'ASC')->get();
        //Se consultan las preguntas de ese cuestionario

        $answers = [];
        //Se crea un array donde se guardaran las preguntas con respuestas

        foreach ($learningTest as $lt) {

            $question = 'question_' . $lt->id;
            //Se concatena el id de la pregunta a "question_" para que coincida con el name del input
            if ($request->$question == 1) {
                $answers[$lt->id] = "Nunca";
                //Se comprueba el valor de ese input para asignarle un valor en texto, lo mismo con los 4 valores restantes
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

            //Con los otros test no se ocuparia el if seria solamente: $answers[$lt->id] = $request->$question;
        }

        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        //Se busca la informacion del alumno dependiendo de la matricula guardada en la sesion
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers), 'finished' => 1);
        //Se crea un array con la estructura de la tabla student_test, json_encode es para convertir el array de respuestas en json
        $student->tests()->attach($student->id, $studentAnswers);
        //Con la funcion tests() del modelo Student se guardan los valores en la tabla student_test

        return redirect()->route('students.vocational');
    }
}
