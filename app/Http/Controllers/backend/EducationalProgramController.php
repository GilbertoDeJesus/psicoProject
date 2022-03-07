<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationalProgramController extends Controller
{
    public function index(){
        return view('backend.students.students');
    }

    public function indexProgram(){
        return view('backend.students.students');
    }
}
