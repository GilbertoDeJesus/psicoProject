<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Test;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $numAprendizaje= Test::find(3)->student->count();
      $numOrientación= Test::find(2)->student->count();
      $numAcademico= Test::find(1)->student->count();
      
        return view('backend.panel',['aprendizaje'=>$numAprendizaje,'orientacion'=>$numOrientación,'academico'=>$numAcademico]);
    }
}
