<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Http\Request;

class LearningTestController extends Controller
{
    public function index(){

        $test_id = Test::query()
            ->where('name', 'LIKE', "%aprendizaje%")
            ->orderByDesc('id')
            ->first();

        $test = Test::where('id',$test_id->id)->orderBy('id','ASC')->first();
        $learningTest = $test->questions()->orderBy('order','ASC')->get();
        
        return view('frontend.learningStyle.learningTest')->with('learningTest', $learningTest);

    }

    public function storeTest(){
        return redirect()->route('students.vocational');
    }
}
