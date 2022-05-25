<?php

namespace App\Http\Controllers\backend;

use App\Models\Test;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\EducativeProgram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentsAdminController extends Controller
{
    public function __construct()
    {
      //$this->middleware(['auth', 'role:Admin|SuperAdmin']);
      $group="";
      $this->middleware(['auth', 'role_or_permission:Admin|Ver alumnos avanzado']);
    }
    public function index(Request $request){
        $user = Auth::user();
        $this->group = $request->group;
        $groups = EducativeProgram::find($user->educative_program_id)->groups;
        if($user->educative_program_id!=null){
            if ($request->group == null || $request->group == 'todos') {
               $students=EducativeProgram::where('id',$user->educative_program_id)->with('students', 'students.group')->paginate(20);
            }else{
                // $students = EducativeProgram::find($user->educative_program_id)->students()
                // ->where('group_id',$request->group)->paginate(20);
                $students=EducativeProgram::with(['students' => function ($query) { 
                    $query->where('group_id', $this->group)->with('group');
                }])->where('id', $user->educative_program_id)->paginate(20);
            }
        }
    
        return view('backend.students.students',['students'=>$students,'groups'=>$groups]);
    }

    public function indexGroup(){
        return view('backend.students.students');
    }

    public function showStudent(){
        return view('backend.students.students');
    }

    public function infoStudent(Student $student){
        $s = Student::where('id',$student->id)->with('group.educativeProgram')
        ->with('result', 'result.educativeProgramTestOrientacional1:id,name',
        'result.educativeProgramTestOrientacional2:id,name',
        'result.educativeProgramTestOrientacional3:id,name')
        ->with('tests')
        ->first();
        if($s->result == null){
            return back()->with('alerta', 'El estudiante seleccionado aún no ha respondido ningún cuestionario');
        }        
        $test1 =  Test::where('name', 'Estilo de aprendizaje')->first();
        $learningTest = $test1->questions()->orderBy('order', 'ASC')->get();

        $test2 = Test::where('name', 'Orientación Vocacional')->first();
        $vocationalTest = $test2->questions()->orderBy('order', 'ASC')->get();
      
        $test3 = Test::where('name', 'Trayectoria académica')->first();
        $trayectoryTest = $test3->questions()->orderBy('order', 'ASC')->get();
        if($s->tests->count() == 3){
            $answerTrayectoryTest = (array) json_decode(stripslashes($s->tests[0]->pivot->answers));
            $answerVocationalTest = (array) json_decode(stripslashes($s->tests[1]->pivot->answers));
            $answerLearningTest = (array) json_decode(stripslashes($s->tests[2]->pivot->answers));

        }else if($s->tests->count() == 2){
            $answerTrayectoryTest = [];
            $answerVocationalTest = (array) json_decode(stripslashes($s->tests[0]->pivot->answers));
            $answerLearningTest = (array) json_decode(stripslashes($s->tests[1]->pivot->answers));
            
        }else if($s->tests->count() == 1){
            $answerLearningTest = (array) json_decode(stripslashes($s->tests[0]->pivot->answers));
            $answerTrayectoryTest = [];
            $answerVocationalTest = [];
        }else{
            $answerLearningTest = [];
            $answerTrayectoryTest = [];
            $answerVocationalTest = [];
        }
        // dd($answerVocationalTest);
        return view('backend.students.studentInfo',['student'=>$s,'learningTest'=>$learningTest,
        'vocationalTest'=>$vocationalTest,
        'trayectoryTest'=>$trayectoryTest,
        'answerTrayectoryTest'=>$answerTrayectoryTest,
        'answerVocationalTest'=> $answerVocationalTest,
        'answerLearningTest'=>$answerLearningTest]);
    }

    public function searchStudent(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.students.studentsSearch',['search'=>$search]);
    }
    public function getInfo(Request $request){
        $student = Student::where('id',$request->id)->with('group.educativeProgram')->first();
        return response(json_encode($student),200);
    }
}
