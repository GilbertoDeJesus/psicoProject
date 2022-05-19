<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EducativeProgram;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsAdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $group="";
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
        $s = Student::where('id',$student->id)->with('group.educativeProgram')->first();
        return view('backend.students.studentInfo',['student'=>$s]);
    }

    public function searchStudent(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.students.studentsSearch',['search'=>$search]);
    }

}
