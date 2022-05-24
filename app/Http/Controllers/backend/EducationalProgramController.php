<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducativeProgram;
use App\Http\Requests\EducativeProgramRequest;

class EducationalProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Super-Admin']);
    }

    public function index(){
        return view('backend.educationalProgram.educationalProgram')->with([
            'educativePrograms' => EducativeProgram::paginate(20)
        ]);
    }

    public function deleteProgram($educativeProgram){
        //dd(EducativeProgram::find($educativeProgram));
        EducativeProgram::find($educativeProgram)->delete();
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeProgram(EducativeProgramRequest $request){
        EducativeProgram::create($request->validated());
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editProgram(){
        return view('backend.users.editUser');
    }

    public function updateProgram(EducativeProgramRequest $request, $educativeProgram){
        //dd(EducativeProgram::find($educativeProgram));
        EducativeProgram::find($educativeProgram)->update($request->validated());
        return back()->with('status', '¡El registro se modificó  correctamente!');
    }

    public function indexProgram(Request $request){
        if ($request->group == null) {
            $request->group = "todos";
        }
        
        $group = $request->group;
        return view('backend.educationalProgram.studentGroups');
    }

    public function infoStudent(){
        return view('backend.students.studentInfo');
    }

    public function searchProgram(Request $request){

        $search = htmlspecialchars($request->input('search'));

        $eduactivePrograms = EducativeProgram::where('name', 'LIKE', '%'.$search.'%')
        ->orderBy('name', 'asc')
        ->paginate(20);

        return view('backend.educationalProgram.educationalSearch')->with([
            'searchs' => $eduactivePrograms,
            'search' => $search
        ]);
    }

    public function searchGroupStudent(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.educationalProgram.studentGroupSearch',['search'=>$search]);
    }
}
