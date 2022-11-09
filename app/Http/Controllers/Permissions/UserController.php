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
        if($user = Auth::user()->roles[0]->name == 'admin'){
            $users = User::join('tenant_user', 'tenant_user.user_id', '=', 'users.id')
            ->join('tenants','tenants.id','=','tenant_user.tenant_id')
            ->where('tenant_user.pemilik',auth()->user()->id )
            ->whereNot('tenant_user.user_id','=',auth()->user()->id)
            ->get(['users.*','tenants.name as nama_cabang']);
        } else {
            $users = User::join('tenant_user', 'tenant_user.user_id', '=', 'users.id')
            ->join('tenants','tenants.id','=','tenant_user.tenant_id')
            ->where('tenant_user.tenant_id',auth()->user()->current_tenant_id )
            ->get(['users.*','tenants.name as nama_cabang']);
        }


        return view('module.users.index',compact('users'));
    }
    public function createUsers(){

        return view('module.users.tambahuser.index',[
            'roles' => DB::table('roles')
            ->whereNotIn('name',['tamu','super admin'])
            ->get(),
            'tenants' => DB::table('tenants')
            ->leftJoin('tenant_user','tenant_user.tenant_id' ,'=','tenants.id')
            ->Where('tenant_user.user_id',auth()->user()->id)
            ->select(
                'tenants.name as name',
                'tenants.id as id'
            )
            ->get(),
        ]);
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
            'users'=>User::has('roles')->where('current_tenant_id',auth()->user()->current_tenant_id)->get()
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
        return view('module.users.profile.index');
     }
}
