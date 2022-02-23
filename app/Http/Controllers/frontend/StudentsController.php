<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        return view('frontend.panel');
    }

    public function signUp(){
        return view('frontend.layout.signUp');
    }

    public function storeStudent(){
        return redirect()->route('students.tests');
    }

}
