<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;

class StudentsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if (session()->has('nameAlumno')) {
            if (!Student::where('matricula',session()->get('matriculaAlumno'))) {
                return redirect()->route('sign-up');
            }
        }else{
            return redirect()->route('sign-up');
        }
        return $next($request);
    }
}
