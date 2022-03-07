<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsAdminController extends Controller
{
    public function index(){
        return view('backend.students.students');
    }

    public function showStudent(){
        return view('backend.students.students');
    }

    public function infoStudent(){
        return view('backend.students.studentInfo');
    }

}
