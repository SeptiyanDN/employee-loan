<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Supplier;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $supplier = Supplier::count();
        $tenant = Tenant::join('tenant_user','tenants.id','=','tenant_user.tenant_id')
        ->where('tenant_user.user_id',auth()->user()->id)
        ->count();
        $pemasukan = Helpers::format_uang(Pemasukan::sum('nominal'));
        $pengeluaran = Helpers::format_uang(Pengeluaran::sum('nominal'));
        $totalSaldo = Helpers::format_uang(Pemasukan::sum('nominal') - Pengeluaran::sum('nominal'));
        return view('pemilikbisnis.dashboard.index',compact('supplier','tenant','totalSaldo','pemasukan','pengeluaran'));

    }


}
