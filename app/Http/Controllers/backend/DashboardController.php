<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Student;;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $numAprendizaje = 0;
        $numOrientación = 0;
        $numAcademico = 0;
        $today = Carbon::today();

        $numAprendizaje = Test::find(3)->student->count();
        $numOrientación = Test::find(2)->student->count();
        $numAcademico = Test::find(1)->student->count();
        $students = Student::whereDate('created_at', '=', $today)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('backend.panel', [
            'aprendizaje' => $numAprendizaje,
            'orientacion' => $numOrientación,
            'academico' => $numAcademico,
            'students' => $students
        ]);
    }
}
