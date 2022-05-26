<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        return view('backend.reports.reports');
    }

    public function generateReport(){
        return back()->with('status', '¡El registro se generó correctamente!');
    }

}
