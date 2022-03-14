<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('backend.users.users');
    }

    public function deleteUser(){
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeUser(){
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editUser(){
        return view('backend.users.editUser');
    }

    public function updateUser(){
        return redirect()->route('admin.users')->with('status', '¡El registro se modificó  correctamente!');
    }

    public function searchUser(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.users.usersSearch',['search'=>$search]);
    }
}
