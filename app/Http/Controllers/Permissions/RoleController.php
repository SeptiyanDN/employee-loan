<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(){
        $roles = Role::get();
        $role = new Role;
        return view ('module.role_permission.roles.index',compact('roles','role'));
    }

    public function create(Request $request){

        request()->validate([
            'name'=> 'required',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' =>request('guard_name') ?? 'web'
        ]);

        return back();
    }

    public function edit(Role $role){
        return view('module.role_permission.roles.editrole',[
            'role'=> $role,
            'submit'=> 'Update'
        ]);
    }

    public function update(Role $role){
        request()->validate([
            'name'=>'required',
        ]);

        $role->update([
            'name'=> request('name'),
            'guard_name' => request('guard_name')
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
    }
}
