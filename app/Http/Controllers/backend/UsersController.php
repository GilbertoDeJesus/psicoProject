<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EducativeProgram;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $users = User::with('educativeProgram')->get();
        return view('backend.users.users')->with([
            'users' => $users,
            'educativePrograms' => EducativeProgram::all(),
        ]);
    }

    public function deleteUser(User $user){
        $user->delete();
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeUser(UserRequest $request){
        $user = User::create($request->validated());
        //$user->syncRoles($request->roles);
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editUser(User $user){
        return view('backend.users.editUser')->with([
            'user' => $user,
            'educativePrograms' => EducativeProgram::all(),
        ]);
    }

    public function updateUser(UserRequest $request, User $user){
        $user->update($request->validated());
        return redirect()->route('admin.users')->with('status', '¡El registro se modificó  correctamente!');
    }

    public function searchUser(Request $request){

        $search = htmlspecialchars($request->input('search'));

        return view('backend.users.usersSearch',['search'=>$search]);
    }
}
