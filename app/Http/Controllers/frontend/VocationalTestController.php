<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use App\Models\EducativeProgram;
use App\Models\Result as ModelsResult;
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

        $student = Student::with('tests')->find(session()->get('idAlumno')); //buscamos en la tabla student_test los test que ha realizado el estudiante
        if($student->tests->isNotEmpty()){
             foreach ($student->tests as $testF){
                if($testF->pivot->test_id == $test->id && $testF->pivot->finished==1){ //Evaluamos si el test actual ha sido finalizado por el estudiante o no
                    return redirect()->route('students.trajectory'); //Si ya se ha contestado redireccionamos al siguiente test
                }
             } 
        }
        
        return view('frontend.vocationalOrientation.vocationalTest',['vocationalTest'=> $vocationalTest, 'answers'=>$answers]);

    }
    public function storeTest(Request $request){
        $test= Test::where('name', 'Orientación Vocacional')->first();
        $vocationalTest = $test->questions()->orderBy('order','ASC')->get();

        $answers = [];

        foreach($vocationalTest as $lt){
            $question = 'question_' . $lt->id;
            $answers[$lt->id] = ['answer' => $request->$question, 'program' => $lt->educative_program_id ];
        }

        $asp = 0;
        $dsn = 0;
        $mct = 0;
        $pal = 0;
        $pin = 0;
        $tic = 0;
        $enf = 0;
        $mto = 0;
        $enr = 0;
        
        foreach ($answers as $ans => $val) {
            $asp = ($val['program']===1 && $val['answer']==1) ? ++$asp : $asp+0;
            $dsn = ($val['program']===2 && $val['answer']==1) ? ++$dsn : $dsn+0;
            $mct = ($val['program']===3 && $val['answer']==1) ? ++$mct : $mct+0;
            $pal = ($val['program']===4 && $val['answer']==1) ? ++$pal : $pal+0;
            $pin = ($val['program']===5 && $val['answer']==1) ? ++$pin : $pin+0;
            $tic = ($val['program']===6 && $val['answer']==1) ? ++$tic : $tic+0;
            $enf = ($val['program']===7 && $val['answer']==1) ? ++$enf : $enf+0;
            $mto = ($val['program']===8 && $val['answer']==1) ? ++$mto : $mto+0;
            $enr = ($val['program']===9 && $val['answer']==1) ? ++$enr : $enr+0;
        }
        $countP = array($asp,$dsn,$mct,$pal,$pin,$tic,$enf,$mto,$enf);
        $count = [];
        $id = 1;
        foreach ($countP as $c) {
            $count[$id++] = $c;
        }
        for ($i=0; $i <= 5; $i++) {
            $min = min($count);
            unset($count[array_search($min, $count)]);
        }
        arsort($count);
        $maxPe = array_keys($count);
        //dd($maxPe);
        // $results = [];
        // $results['test_orientacional1_id'] = $maxPe[0];
        // $results['test_orientacional2_id'] = $maxPe[1];
        // $results['test_orientacional3_id'] = $maxPe[2];
        //$results['student_id']= 31;
        $testResults = ModelsResult::where('student_id', session()->get('idAlumno'))->first();//Este busca el registro que se creo en el test anterior
        $testResults->update(['test_orientacional1_id' => $maxPe[0], 'test_orientacional2_id' => $maxPe[1], 'test_orientacional3_id' => $maxPe[2]]);//Este agrega los resultados del test
        $student = Student::where('matricula', session()->get('matriculaAlumno'))->first();
        $studentAnswers = array('student_id' => $student->id, 'test_id' => $test->id, 'answers' => json_encode($answers), 'finished' => 1);
        $student->tests()->attach($student->id, $studentAnswers);

        return redirect()->route('students.trajectory');
    }
}