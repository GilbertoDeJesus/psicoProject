<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogInAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function logIn(LogInAdminRequest $request){
        // dd($request);
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            request()->session()->regenerate(); //Evitamos robo de sesión            
            return redirect()->intended(route('admin'));
        }
        throw ValidationException::withMessages([
            'employee_key'=> __('auth.failed')
        ]);
    }

    public function index(){
        return view('backend.layout.login');
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate(); //Invalidamos session y genera otra
        $request->session()->regenerateToken(); //regeneramos token
        return redirect()->route('admin.log-in');
    }
}
