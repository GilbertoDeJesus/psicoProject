<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\EducativeProgram;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Group;
use App\Http\Requests\LogInStudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class StudentsController extends Controller
{
    public function index()
    {

        $student = Student::with('tests')->find(session()->get('idAlumno')); //buscamos en la tabla student_test los test que ha realizado el estudiante
        $aprendizajeStatus = null;
        $trayectoriaStatus = null;
        $vocacionalStatus = null;
        if ($student->tests->isNotEmpty()) {
            $statusAprendizaje = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 3)->first();
            if (!empty($statusAprendizaje)) {
                $aprendizajeStatus = $statusAprendizaje->pivot->finished;
            }
            $statusVocacional = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 2)->first();
            if (!empty($statusVocacional)) {
                $vocacionalStatus = $statusVocacional->pivot->finished;
            }
            $statusTrayectoria = $student->tests()->where('student_id', session()->get('idAlumno'))->where('test_id', 1)->first();
            if (!empty($statusTrayectoria)) {
                $trayectoriaStatus = $statusTrayectoria->pivot->finished;
            }
        }

        return view('frontend.panel', ['aprendizaje' => $aprendizajeStatus, 'vocacional' => $vocacionalStatus, 'trayectoria' => $trayectoriaStatus]);
    }

    public function signUp()
    {

        $educativePrograms = EducativeProgram::all();
        return view('frontend.layout.signUp', compact('educativePrograms'));
    }

    public function logIn(LogInStudentRequest $request)
    {


        $student = Student::where('matricula', $request->matricula)->first();

        if ($student != null && Hash::check($request->password, $student->password)) {
            session([
                'idAlumno' => $student->id,
                'nameAlumno' => $student->name,
                'matriculaAlumno' => $student->matricula,
                'passwordAlumno' => "p" . $student->matricula . "s" . $student->id
            ]);
            return redirect()->route('students.tests');
        } else {
            //agregamos a variable 'errors' un error de validación en credenciales y regresamos a ruta anterior
            // en este caso la correspondiente a sing-up.
            throw ValidationException::withMessages([
                'matricula' => __('auth.failed')
            ]);
        }
    }

    public function logOut(Request $request)
    {

        $request->session()->flush();
        return redirect()->route('sign-up');
    }

    public function storeStudent(StoreStudentRequest $request)
    {
        if ($request->p_id == 0) {
            throw ValidationException::withMessages([
                'programa educativo' => __('validation.requiredPE')
            ]);
        }
        $publicacion = $request->all(); //Pasamos todos los datos del request a la variable llamada publicación
        $publicacion['password'] = $request->matricula;
        $student = Student::create($publicacion); //Creamos el nuevo estudiante.
        $pass = "p" . $student->matricula . "s" . $student->id; //Creamos una contraseña con más dígitos 
        $student->update(['password' => $pass]); //Guardamos la contraseña con matrícula letras y id

        session([
            'idAlumno' => $student->id,
            'nameAlumno' => $student->name,
            'matriculaAlumno' => $student->matricula,
            'passwordAlumno' => "p" . $student->matricula . "s" . $student->id
        ]);

        return redirect()->route('students.tests');
    }

    //Obtener los grupos de cada programa educativo seleccionado en blade
    public function getGroups(Request $request)
    {
        $groups = Group::where('educative_program_id', $request->p_id)->select('id', 'name')->get();
        return $groups;
    }

   
}
