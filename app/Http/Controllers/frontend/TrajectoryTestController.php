<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TrajectoryTestController extends Controller
{
    public function index(){

       // $trajectoryTest= \DB:: table('questions')
        // ->select('questions.*')
        // ->orderBy('order','ASC')
        // ->get();

        //Ocupando el modelo podemos reducir código y además teniendo en cuenta que "sabemos" que son 3 test 
        // lo podemos manejar así.
        $trajectoryTest = Test::find(1)->questions; //Guardamos en la variable $trayectoryTest la colección que nos trae al consultar el test una con todas las preguntas que tienen relación con él.
        return view('frontend.educationalTrajectory.trajectoryTest')
        ->with('trajectoryTest', $trajectoryTest);

    }

    public function storeTest(){
        return redirect()->route('students.results');
    }

    public function showResults(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
