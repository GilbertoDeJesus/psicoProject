<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VocationalTestController extends Controller
{
    public function index(){
        $vocationalTest= \DB:: table('questions')
        ->select('questions.*')
        ->orderBy('order','ASC')
        ->get();
         return view('frontend.vocationalOrientation.vocationalTest')->with('vocationalTest', $vocationalTest);

    }

    public function storeTest(){
        return redirect()->route('students.trajectory');
    }
}
