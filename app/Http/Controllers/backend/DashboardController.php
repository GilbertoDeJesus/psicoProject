<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\EducativeProgram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{ public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $numAprendizaje = Test::find(3)->student->count();      
      $numOrientación= Test::find(2)->student->count();
      $numAcademico= Test::find(1)->student->count();
      $today = Carbon::today();
      if (Auth::user()->educative_program_id != null) {
        $students= EducativeProgram::find(Auth::user()->educative_program_id)
                  ->students()->where(function($query) use($today){
                      $query->whereDate('students.created_at', '=', $today);
                    })
                  ->with('group.educativeProgram')
                  ->paginate(20);
      }else{
        $students = Student::whereDate('created_at', '=',Carbon::today())
                  ->with('group.educativeProgram')
                  ->paginate(20);
      }
        return view('backend.panel',['aprendizaje'=>$numAprendizaje,'orientacion'=>$numOrientación,'academico'=>$numAcademico, 'students' =>$students]);
    }



}
