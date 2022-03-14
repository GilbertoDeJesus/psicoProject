<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsAdminController extends Controller
{
    public function index(Request $request){
        if ($request->group == null) {
            $request->group = "todos";
        }
        
        $group = $request->group;

        return view('backend.students.students',['group'=>$group]);
    }

    public function indexGroup(){
        return view('backend.students.students');
    }

    public function showStudent(){
        return view('backend.students.students');
    }

    public function infoStudent(){
        return view('backend.students.studentInfo');
    }

    public function searchStudent(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.students.studentsSearch',['search'=>$search]);
    }

}
