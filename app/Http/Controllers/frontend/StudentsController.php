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
        return view('frontend.layout.signUp');
    }

    public function logIn(LogInStudentRequest $request)
    {

        $student = Student::where('email', $request->correo)->first();

        if ($student != null && Hash::check($request->password, $student->password)) {
            session([
                'idAlumno' => $student->id,
                'nameAlumno' => $student->name,
                'emailAlumno' => $student->email,
                'passwordAlumno' => "p" . "newEntry" . "s" . $student->id
            ]);
            return redirect()->route('students.tests');
        } else {
            throw ValidationException::withMessages([
                'correo' => __('auth.failed')
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
        $publicacion = $request->all();
        $publicacion['password'] = $request->phone;
        $student = Student::create($publicacion);
        $pass = "p" . "newEntry" . "s" . $student->id;
        $student->update(['password' => $pass]);
        session([
            'idAlumno' => $student->id,
            'nameAlumno' => $student->name,
            'emailAlumno' => $student->email,
            'passwordAlumno' => "p" . "newEntry" . "s" . $student->id
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
