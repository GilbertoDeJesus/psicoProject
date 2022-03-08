<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationalProgramController extends Controller
{
    public function index(){
        return view('backend.educationalProgram.educationalProgram');
    }

    public function deleteProgram(){
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeProgram(){
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editProgram(){
        return view('backend.users.editUser');
    }

    public function updateProgram(){
        return redirect()->route('admin.educationalProgram')->with('status', '¡El registro se modificó  correctamente!');
    }

    public function indexProgram(){
        return view('backend.educationalProgram.studentGroups');
    }
}
