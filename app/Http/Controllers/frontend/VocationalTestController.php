<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VocationalTestController extends Controller
{
    public function index(){
        return view('frontend.vocationalOrientation.vocationalTest');
    }

    public function storeTest(){
        return view('frontend.learningStyle.learningStyleResult');
    }
}
