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
        
        $matricula = $request->matricula;
        $password = $request->password;

        $studentsArray = [] ;
        $studentsArray = Student::all();

        foreach ($studentsArray as $student) {
            if ($student->matricula == $matricula && $student->password == $password && !null) {
                session(['idAlumno' => $student->id,
                    'nameAlumno' => $student->name,
                    'matriculaAlumno' => $student->matricula,
                    'passwordAlumno' => $student->password,
                ]);
                return redirect()->route('students.tests');
            } else {
                //Variables para mostrar en el bladeS
                $message = 'Credenciales incorrectas, vuelva iniciar sesión.';
                $educativePrograms = EducativeProgram::all();

                return view('frontend.layout.signUp')->with([
                    'message' => $message,
                    'educativePrograms' => $educativePrograms
                  ]);
            }
        }
    }

    public function logOut(Request $request){
        
        $request->session()->flush();
        return redirect()->route('sign-up');
    }

    public function storeStudent(StoreStudentRequest $request ){
        $student =  new Student;

        //Obtiene el dato del campo matricula
        $matricula = $request->matricula;
        $student->name = $request->name;
        $student->family_name = $request->family_name;
        $student->last_name = $request->last_name;
        $student->group_id = $request->group_id;
        $student->phone = $request->phone;
        $student->contact_phone = $request->contact_phone;
        $student->email = $request->email;
        $student->matricula = $request->matricula;
        $student->password = $this->generatePassword();
        $student->age = $request->age;

        $student->save();

        session(['idAlumno' => $student->id,
                'nameAlumno' => $student->name,
                'matriculaAlumno' => $student->matricula,
                'passwordAlumno' => $student->password,
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
