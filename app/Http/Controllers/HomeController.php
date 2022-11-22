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
        $user = auth()->user();
        $loanApplications = LoanApplications::leftJoin('employees','employees.id','=','loan_applications.employee_id')
        ->leftJoin('users','users.id','=','employees.user_id')
        ->where('users.id',$user->id)
        ->select('loan_applications.id')
        ->first();
        $loan = LoanApplications::all()->find($loanApplications->id);

        $logs = Activity::where('subject_id',$loanApplications->id)
        ->leftJoin('users','users.id','activity_log.causer_id')
        ->select('activity_log.*','users.name')
        ->orderBy('activity_log.created_at', 'ASC')
        ->get();
        if($loan != null) {
            $loan->loan_ammount = Helpers::format_uang($loan->loan_ammount);
            $loan->mountly_installment = Helpers::format_uang($loan->mountly_installment);
            $loan->due_date = Helpers::tanggal_indonesia($loan->due_date);
        }
        return view('dashboard.users.index',compact('loan','logs','loanApplications'));
    }
}
