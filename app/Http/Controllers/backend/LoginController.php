<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logIn(){
        return redirect()->route('admin');
    }

    public function index(){
        return view('backend.layout.login');
    }

    public function logOut(){
        return redirect()->route('admin.log-in');
    }
}
