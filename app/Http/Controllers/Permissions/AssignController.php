<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function create(){
        return view('module.role_permission.assign.create',[
        'roles' => Role::get(),
        'permissions' => Permission::get()
        ]);
    }

    public function store(){

        request()->validate([
            'roles'=>'required',
            'permissions'=> 'array|required'
        ]);

        $role = Role::find(request('roles'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', "Permissions has been assigned to the role! {$role->name}");
    }

    public function edit(Role $role){
        return view('module.role_permission.assign.sync',[
            'role'=>$role,
            'roles'=>Role::get(),
            'permissions' =>Permission::get(),
        ]);
    }

    public function update(Role $role){
        request()->validate([
            'roles'=>'required',
            'permissions' =>'array'
        ]);

        $role->syncPermissions(request('permissions'));

        return redirect()->route('assign.create')->with('success','The Permissions has been sync!');
    }
}
