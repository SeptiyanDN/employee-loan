<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Employee;
use App\Models\LoanApplications;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Supplier;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        // $terhutang = LoanApplications::whereNotIn('status_id' ,[1,2,3,4,5])->sum('loan_ammount');
        // $terhutang = Helpers::format_uang($terhutang);
        $terhutang = LoanApplications::whereNotIn('status_id' ,[1,2,3,4,5])
        ->select(DB::raw('sum(loan_ammount - (mountly_installment * (period - remaining_payment))) as terhutang'))->first();
        if($terhutang->terhutang === null) {
            $terhutang->terhutang = Helpers::format_uang(0);
        }
            $terhutang->terhutang = Helpers::format_uang($terhutang->terhutang);

        $paid = LoanApplications::whereNotIn('status_id' ,[1,2,3,4,5])
        ->select(DB::raw('sum(loan_ammount - (mountly_installment * remaining_payment)) as paid'))->first();
        if($paid->paid === null) {
            $paid->paid = Helpers::format_uang(0);
        }
        $paid->paid = Helpers::format_uang($paid->paid);
        $proccesing = LoanApplications::whereNotIn('status_id' ,[4,5,6,8])->count();
        $overdue = LoanApplications::where('overdue' ,true)->count();
        $complete = LoanApplications::where('status_id' ,8)->count();

            return view('dashboard.admin.index',compact('proccesing', 'overdue','complete','terhutang','paid'));
    }

    public function dashboardUsers () {
        return view('dashboard.users.index');
    }
}
