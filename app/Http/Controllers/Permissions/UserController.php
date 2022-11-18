<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
    //
    }

    public function tambahUser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'telepon' =>$request->telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->update(['current_tenant_id' => $request->tenant]);
        $user->assignRole(request('role'));
        $tenantID = DB::table('tenant_user')
        ->where('tenant_id',$request->tenant)
        ->first();
        DB::table('tenant_user')->insert([
            'tenant_id' => $tenantID->tenant_id,
            'user_id' => $user->id,
            'pemilik' =>auth()->user()->id
        ]);
        return redirect('/users/management')->with('success','Berhasil Menambahkan User Baru!');
    }
    public function create(){
        return view('module.role_permission.assign.user.create',[
            'roles'=>Role::get(),
            'users'=>User::has('roles')->get()
        ]);
    }

    public function store(){
        $user = User::where('email',request('email'))->first();
        $user->assignRole(request('roles'));
        return back();
    }

    public function edit(User $user){
        return view('module.role_permission.assign.user.sync',[
            'roles'=>Role::get(),
            'users'=>User::has('roles')->get(),
            'user'=>$user,

        ]);
     }

     public function update(User $user){
        $user->syncRoles(request('roles'));
        return redirect()->route('assign.user.create')->with('success','Berhasil Mengubah Role User!' );
     }

     public function profileSetting(){
        return view('module.employee.profile.index');
     }
}
