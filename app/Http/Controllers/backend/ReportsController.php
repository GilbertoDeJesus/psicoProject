<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use App\Models\EducativeProgram;
use App\Models\Group;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function index(){
        $tests = Test::all();
        return view('backend.reports.reports')->with([
            'tests' => $tests,
        ]);
    }

    public function generateReport(Request $request){
        $test = htmlspecialchars($request->input('test'));

        $añoinicio = date("Y", strtotime($request->input('inicio')));
        $mesinicio = date("m", strtotime($request->input('inicio')));
        $diainicio = date("d", strtotime($request->input('inicio')));
        $añofin = date("Y", strtotime($request->input('fin')));
        $mesfin = date("m", strtotime($request->input('fin')));
        $diafin = date("d", strtotime($request->input('fin')));

        return (new ResultsExport)->forYear((int)$añoinicio,
          (int)$mesinicio, (int)$diainicio,
          (int)$añofin,
          (int)$mesfin,
          (int)$diafin, $test)
          ->download('alumnos.xlsx');

    }

}
