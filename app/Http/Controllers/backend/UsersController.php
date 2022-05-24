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
    public function __construct()
    {
        $this->middleware(['role:Super-Admin']);
    }
    
    public function index(){
        return view('backend.users.users')->with([
            'users' => User::paginate(20),
            'educativePrograms' => EducativeProgram::all(),
        ]);
    }

    public function deleteUser($user){
        User::find($user)->delete();
        return back()->with('status', '¡El registro se elimino correctamente!');
    }

    public function storeUser(UserRequest $request){
        $user = User::create($request->validated());
        $user->syncRoles($request->roles);
        return back()->with('status', '¡El registro se creo correctamente!');
    }

    public function editUser($user){
        return view('backend.users.editUser')->with([
            'user' => User::find($user),
            'educativePrograms' => EducativeProgram::all(),
        ]);
    }

    public function updateUser(UserRequest $request, $user){
        User::find($user)->update($request->validated());
        return redirect()->route('admin.users')->with('status', '¡El registro se modificó  correctamente!');
    }

    public function searchUser(Request $request){

        $search = htmlspecialchars($request->input('search'));

        $users = User::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('lastname', 'LIKE', '%'.$search.'%')
        ->orderBy('name', 'asc')
        ->paginate(20);

        return view('backend.users.usersSearch')->with([
            'searchs' => $users,
            'search' => $search
        ]);
    }
}
