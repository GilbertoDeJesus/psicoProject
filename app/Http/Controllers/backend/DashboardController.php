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
      $numAprendizaje = 0;      
      $numOrientación= 0;
      $numAcademico= 0;
      $today = Carbon::today();
        
      if (Auth::user()->can('Ver alumnos sencillo')) {

        $test1 =  EducativeProgram::find(Auth::user()->educative_program_id)
        ->students()->with('test1')->with('test2')->with('test3')->get();    
        
        foreach ($test1 as $num){
          $numAcademico += $num->test1->count();  
          $numOrientación += $num->test2->count();  
          $numAprendizaje += $num->test3->count();
        }

        $students= EducativeProgram::find(Auth::user()->educative_program_id)
                  ->students()->where(function($query) use($today){
                      $query->whereDate('students.created_at', '=', $today);
                    })
                  ->with('group.educativeProgram')
                  ->orderBy('created_at','DESC')
                  ->paginate(20);
      }elseif(Auth::user()->can('Ver alumnos avanzado')){
        $numAprendizaje = Test::find(3)->student->count();      
        $numOrientación= Test::find(2)->student->count();
        $numAcademico= Test::find(1)->student->count();
        $students = Student::whereDate('created_at', '=',Carbon::today())
                  ->with('group.educativeProgram')
                  ->orderBy('created_at','DESC')
                  ->paginate(20);
      }else{
        return view('backend.panel',['aprendizaje'=>0,
        'orientacion'=>0,
        'academico'=>0, 
        'students' =>'']);
      }
        return view('backend.panel',['aprendizaje'=>$numAprendizaje,
        'orientacion'=>$numOrientación,
        'academico'=>$numAcademico, 
        'students' =>$students]);
    }



}
