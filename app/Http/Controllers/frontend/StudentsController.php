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
    public function index(){
        return view('frontend.panel');
    }

    public function signUp(){

        $educativePrograms = EducativeProgram::all();
        return view('frontend.layout.signUp', compact('educativePrograms'));
    }

    public function logIn(LogInStudentRequest $request){
        

       $student = Student::where('matricula',$request->matricula)->first();

            if($student!=null && Hash::check($request->password,$student->password)){
                session(['idAlumno' => $student->id,
                    'nameAlumno' => $student->name,
                    'matriculaAlumno' => $student->matricula,
                    'passwordAlumno' => "p".$student->matricula."s".$student->id
                ]);
                return redirect()->route('students.tests');
            } else {
                //agregamos a variable 'errors' un error de validación en credenciales y regresamos a ruta anterior
                // en este caso la correspondiente a sing-up.
                throw ValidationException::withMessages([
                    'matricula'=> __('auth.failed')
                ]);
            }
    }

    public function logOut(Request $request){
        
        $request->session()->flush();
        return redirect()->route('sign-up');
    }

    public function storeStudent(StoreStudentRequest $request ){
        if($request->p_id == 0){
            throw ValidationException::withMessages([
                'programa educativo'=> __('validation.requiredPE')
            ]);
        }
        $publicacion = $request->all(); //Pasamos todos los datos del request a la variable llamada publicación
        $publicacion['password']= $request->matricula;
        $student = Student::create($publicacion); //Creamos el nuevo estudiante.
        $pass = "p".$student->matricula."s".$student->id; //Creamos una contraseña con más dígitos 
        $student->update(['password'=>$pass]); //Guardamos la contraseña con matrícula letras y id
        
        session(['idAlumno' => $student->id,
                'nameAlumno' => $student->name,
                'matriculaAlumno' => $student->matricula,
                'passwordAlumno' => "p".$student->matricula."s".$student->id
        ]);

        return redirect()->route('students.tests');
        
    }

    //Obtener los grupos de cada programa educativo seleccionado en blade
    public function getGroups(Request $request){
        $groups = Group::where('educative_program_id', $request->p_id)->select('id','name')->get();
        return $groups;
    }

    //Genera una contraseña única para cada estudiante
    public static function generatePassword(){

        $clave = Str::random(8);
        while (Student::where("password", $clave)->first()!= null){
            $clave = Str::random(8);
        }
        return $clave;
    }

}
