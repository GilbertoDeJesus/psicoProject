<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\EducativeProgram;
use App\Http\Requests\GroupRequest;

class GroupsController extends Controller
{
    public function index(){
        $groups = Group::with('educativeProgram')->get();
        return view('backend.groups.groups')->with([
            'groups' => $groups,
            'educativePrograms' => EducativeProgram::all()
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

        return view('backend.groups.groupsSearch',['search'=>$search]);
    }
}
