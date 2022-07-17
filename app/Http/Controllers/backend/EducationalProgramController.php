<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducativeProgram;
use App\Models\Student;
use App\Models\Test;
use App\Http\Requests\EducativeProgramRequest;

class EducationalProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Super-Admin']);
    }

    public function index()
    {
        return view('backend.educationalProgram.educationalProgram')->with([
            'educativePrograms' => EducativeProgram::paginate(20)
        ]);
    }

    public function deleteProgram($educativeProgram)
    {
        //dd(EducativeProgram::find($educativeProgram));
        EducativeProgram::find($educativeProgram)->delete();
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeProgram(EducativeProgramRequest $request)
    {
        EducativeProgram::create($request->validated());
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editProgram()
    {
        return view('backend.users.editUser');
    }

    public function updateProgram(EducativeProgramRequest $request, $educativeProgram)
    {
        //dd(EducativeProgram::find($educativeProgram));
        EducativeProgram::find($educativeProgram)->update($request->validated());
        return back()->with('status', '¡El registro se modificó  correctamente!');
    }

    public function indexProgram(Request $request)
    {
        $this->group = $request->group;
        $groups = EducativeProgram::find($request->id)->groups;
        if ($request->group == null || $request->group == 'todos') {
            $students = EducativeProgram::where('id', $request->id)->with('students', 'students.group')->paginate(20);
        } else {
            $students = EducativeProgram::with(['students' => function ($query) {
                $query->where('group_id', $this->group)->with('group');
            }])->where('id', $request->id)->paginate(20);
        }
        return view('backend.educationalProgram.studentGroups', ['students' => $students, 'groups' => $groups]);
    }

    public function infoStudent($st)
    {
        $student = Student::find($st);
        //dd($student->id);
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

    public function searchProgram(Request $request)
    {

        $search = htmlspecialchars($request->input('search'));

        $eduactivePrograms = EducativeProgram::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('backend.educationalProgram.educationalSearch')->with([
            'searchs' => $eduactivePrograms,
            'search' => $search
        ]);
    }

    public function searchGroupStudent(Request $request)
    {

        $search = htmlspecialchars($request->input('search'));
        $educativeProgram = EducativeProgram::find($request->input('educative_program'));
        $students = $educativeProgram->students()->where(function ($query) use ($search) {
            $query->where('students.name', 'LIKE', '%' . $search . '%')
                ->orWhere('students.family_name', 'LIKE', '%' . $search . '%')
                ->orWhere('students.last_name', 'LIKE', '%' . $search . '%')
                ->orWhere('students.matricula', 'LIKE', '%'.$search.'%');
        })
            ->orderBy('students.name', 'asc')
            ->paginate(20);;

        return view('backend.educationalProgram.studentGroupSearch')->with([
            'searchs' => $students,
            'search' => $search
        ]);
    }
}
