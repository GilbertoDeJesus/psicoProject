<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningTestController extends Controller
{
    public function index(){

        $learningStyle= \DB:: table('questions')
        ->select('questions.*')
        ->orderBy('order','ASC')
        ->get();
         return view('frontend.learningStyle.learningTest')->with('learningTest', $learningStyle);

    }

    public function storeTest(){
        return redirect()->route('students.vocational');
    }
}
