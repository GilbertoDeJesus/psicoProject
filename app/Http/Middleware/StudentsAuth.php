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
        
        if (session()->has('emailAlumno') && session()->has('passwordAlumno')) {//Verificamos que existan las variables de sesión matriculaAlumno y passwordAlumno
            if (!Student::where('email',session()->get('emailAlumno'))) { //Comprobamos si la matrícula de la variable coincide con un registro en la bd
                return redirect()->route('sign-up'); //Al no encontrar coincidencias se redirige a sign-up
            }
        }else{
            return redirect()->route('sign-up');//Si no hay variables de sesión se redirige a sign-up
        }
        return $next($request);//Pasamos a la ruta de destino.
    }
}
