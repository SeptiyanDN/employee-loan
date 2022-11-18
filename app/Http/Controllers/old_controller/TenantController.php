<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function changeTenant($tenantID){
        $tenant = Auth::user()->tenants()->findOrFail($tenantID);

        Auth::user()->update(['current_tenant_id' => $tenantID]);

        $mainDomain = str_replace('://' , '://' . $tenant->subdomain . '.' , config('app.url'));
        return redirect ($mainDomain);
    }

    public function index(){
        $tenants = DB::table('tenants')
        ->leftJoin('tenant_user','tenant_user.tenant_id' ,'=','tenants.id')
        ->Where('tenant_user.user_id',auth()->user()->id)
        ->select(
            'tenants.name as name',
            'tenants.subdomain as subdomain',
            'tenants.telepon as telepon',
            'tenants.alamat as alamat',
            'tenants.kelurahan as kelurahan',
            'tenants.kode_pos as kode_pos',
        )
        ->get();
        return view('module.outlet.index',compact('tenants'));
    }

    public function tambahOutlet(){

        return view('module.outlet.tambahoutlet');
    }
    public function store(Request $request)
    {
        $randomString = Str::random(5);
        $strtolower = strtolower(str_replace(' ','-',$request->nama_outlet));
        $tenant = Tenant::create([
            'name' => $request->nama_outlet,
            'subdomain' =>$strtolower.$randomString,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'user_id' => auth()->user()->id
        ]);
        $tenant->users()->attach(auth()->user()->id);

        return redirect('/outlet')->with('success','Berhasil Menambahkan Outlet Baru');

    }


}
