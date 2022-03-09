<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index(){
        return view('backend.groups.groups');
    }

    public function deleteGroup(){
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeGroup(){
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editGroup(){
        return view('backend.groups.editGroup');
    }

    public function updateGroup(){
        return redirect()->route('admin.users')->with('status', '¡El registro se modificó  correctamente!');
    }
}
