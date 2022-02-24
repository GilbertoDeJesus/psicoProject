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

    public function logIn(){
        return redirect()->route('students.tests');
    }

    public function logOut(){
        return redirect()->route('sign-up');
    }

    public function storeStudent(){
        return redirect()->route('students.tests');
    }

}
