<?php

namespace App\Http\Controllers\backend;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\EducativeProgram;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    public function index(){
        $user = Auth::user();
        if($user->educative_program_id ==null){
            $grupos = Group::with('educativeProgram')->paginate(20);
            $educativePrograms = EducativeProgram::all();
        }else{
            $grupos = EducativeProgram::find($user->educative_program_id)->groups()->paginate(20);
            $educativePrograms = EducativeProgram::where('id',$user->educative_program_id)->get();
        }
        return view('backend.groups.groups')->with([
            'groups' => $grupos,
            'educativePrograms' => $educativePrograms,
        ]);
    }

    public function deleteGroup($group){
        Group::find($group)->delete();
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeGroup(GroupRequest $request){
        Group::create($request->validated());
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editGroup($group){
        return view('backend.groups.editGroup')->with([
            'group' => Group::find($group),
            'educativePrograms' => EducativeProgram::all(),
        ]);
    }

    public function updateGroup(GroupRequest $request, $group){
        Group::find($group)->update($request->validated());
        return redirect()->route('admin.groups')->with('status', '¡El registro se modificó  correctamente!');
    }

    public function searchGroup(Request $request){

        $search = htmlspecialchars($request->input('search'));

        $user = Auth::user();
        if($user->can('Buscar grupo')){
            $groups = EducativeProgram::find($user->educative_program_id)->groups();
            $groups = $groups->where('name', 'LIKE', '%'.$search.'%')
            ->orderBy('name', 'asc')
            ->paginate(20);
        }else{
            $groups = Group::where('name', 'LIKE', '%'.$search.'%')
            ->orderBy('name', 'asc')
            ->paginate(20);
        }

        return view('backend.groups.groupsSearch')->with([
            'searchs' => $groups,
            'search' => $search
        ]);;
    }
}
