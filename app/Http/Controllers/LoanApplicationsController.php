<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\BuktiTransfer;
use App\Models\Comments;
use App\Models\Employee;
use App\Models\EmployeeBank;
use App\Models\LoanApplications;
use App\Models\Status;
use App\Models\TypeLoan;
use App\Services\AuditLogService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class LoanApplicationsController extends Controller
{

    public function index()
    {
        $loans = LoanApplications::all();
        return view('module.loans.index',compact('loans'));
    }

    public function json(){
        $loans = LoanApplications::get();
        return datatables()
            ->of($loans)
            ->addIndexColumn()
            ->addColumn('select_all', function ($loans){
                return '<input type="checkbox" name="id[]" value="'. $loans->id .'">';
            })
            ->addColumn('created_at',function($loans){
                return Helpers::tanggal_indonesia($loans->created_at, false);
            })
            ->addColumn('number_application',function($loans){

            return '<span class="btn btn-rounded btn-primary">'. $loans->number_application .'</span>';
            })
            ->addColumn('employee_name',function($loans){
                return $loans->employee->name;
            })
            ->addColumn('loan_ammount',function($loans){
                return Helpers::format_uang($loans->loan_ammount);
            })
            ->addColumn('status',function($loans){
                return $loans->status->name;
            })
            ->addColumn('mountly_installment',function($loans){
                return Helpers::format_uang($loans->mountly_installment);
            })
            ->addColumn('number_id_staff',function($loans){
                return $loans->employee->number_id_staff;
            })

            ->addColumn('Action', function ($loans){
                if(auth()->user()->roles[0]->name === 'Admin' || auth()->user()->roles[0]->name === 'Analyst'){
                    return '<a class="me-3" href="'.route('loans.show', $loans) .'">
                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                </a>
                ';
                } else if (auth()->user()->roles[0]->name === 'CEO') {

                    return '
                    <a class="me-3" href="'.route('loans.show', $loans) .'">
                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                </a>
                <a class="me-3" href="'.route('loans.edit', $loans) .'">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
            </a>
                <a class="me-3">
                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
                </a>
                    ';
                }
            })
            ->rawColumns(['Action','select_all','number_application','button_send'])
            ->make(true);
    }
    public function analystProses()
    {
        $loans = LoanApplications::where('status_id',1)->get();
        return view('module.loans.application_loans.analyst.index',compact('loans'));
    }
    public function ceoProses()
    {
        $loans = LoanApplications::where('status_id',2)->get();
        return view('module.loans.application_loans.ceo.index',compact('loans'));
    }

    public function create()
    {
        $lastLoan = LoanApplications::latest()->first();
        if ($lastLoan != null) {
            $last = $lastLoan->id;
        } else {
            $last =0;
        }
        $numberApplications = 'APPLOANS-'.strtoupper(date('Y')).strtoupper(date('m')).Helpers::tambah_nol_didepan((int)$last+1,5);

        $typeloans = TypeLoan::all();
        $employees = Employee::whereNotIn('haveAloan',[true])->get();
        return view('module.loans.application_loans.new',compact('typeloans','employees','numberApplications'));
    }


    public function store(Request $request)
    {
        $dueDate = Carbon::now()->day(10)->addMonth(1);
        $now = Carbon::now();

        if($now->day < $dueDate->day && $now->month < $dueDate->month && $now->year <= $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = $sisaJatuhTempo.' hari lagi';
        } else if ($now->day > $dueDate->day && $now->month < $dueDate->month && $now->year <= $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = $sisaJatuhTempo.' hari lagi';
        } else if ($now->day < $dueDate->day && $now->month > $dueDate->month && $now->year <= $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
        } else if ($now->day < $dueDate->day && $now->month < $dueDate->month && $now->year > $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
        } else if ($now->day > $dueDate->day && $now->month < $dueDate->month && $now->year > $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
        } else if ($now->day >= $dueDate->day && $now->month >= $dueDate->month && $now->year < $dueDate->year) {
            $sisaJatuhTempo = $now->diffInDays($dueDate);
            $tanggal = $sisaJatuhTempo.' hari lagi';
        }
        $loan = LoanApplications::create([
            'number_application' => $request->number_application,
            'employee_id' => $request->employee_id,
            'typeLoan_id' => $request->typeLoan_id,
            'period'      => $request->period_payment,
            'charge_fee'  => $request->charge_fee,
            'bunga'      => $request->bunga,
            'loan_ammount'  => $request->loan_ammount,
            'description'   => $request->description,
            'status_id' => 1,
            'remaining_payment' => $request->period_payment,
            'mountly_installment' => $request->loan_ammount / $request->period_payment,
            'created_by_id' => auth()->user()->id,
            'due_date' => $dueDate,
            'status_due_date'=>$tanggal
        ]);
        Employee::where('id',$loan->employee->id)->first();

        Comments::create([
            'comments' => Auth::user()->name.' - '.Auth::user()->roles[0]->name.' Application already send to analyst!',
            'user_id' =>Auth::user()->id,
            'application_loan_id' => $loan->id
        ]);

        return redirect()->route('loans.index')->with('success','Create New Loan Application Succeessfully');
    }


    public function show(LoanApplications $loanApplications)
    {
        $loan = LoanApplications::all()->find($loanApplications);

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
       
     return view('module.loans.application_loans.show',compact('loan','logs'));
    }

    public function approveAnalyst(LoanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);

        $status = Status::whereIn('id', array(2,3))->get();


        return view('module.loans.application_loans.analyst',compact('loan','status'));
    }



    public function approveAnalystService(Request $request,LoanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);
        $comments = Comments::create([
            'comments' => $request->comments,
            'user_id' => auth()->user()->id,
            'application_loan_id' => $loan->id,
        ]);
        $loan->update([
            'status_id' => $request->status_id
        ]);

        return redirect()->route('loans.show',$loan->id);
    }

    public function approveCeo(loanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);
        // $status = Status::all();
        $status = Status::whereIn('id', array(4,5))->get();

        return view('module.loans.application_loans.ceo',compact('loan','status'));
    }

    public function approveCeoService(Request $request,LoanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);
        Comments::create([
            'comments' => $request->comments,
            'user_id' => auth()->user()->id,
            'application_loan_id' => $loan->id,
        ]);
        $loan->update([
            'status_id' => $request->status_id
        ]);
        $employee = Employee::where('id',$loan->employee_id);

        return redirect()->route('loans.show',$loan->id);
    }
    public function sendingMoney(loanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);
        $status = Status::where('id',6)->get();
        $bank = EmployeeBank::where('employee_id',$loan->employee->id)->first();
        return view('module.loans.application_loans.sendingMoney',compact('loan','status','bank'));
    }

    public function sendingMoneyService(Request $request,LoanApplications $loanApplications){
        $loan = LoanApplications::all()->find($loanApplications);
        $employee = Employee::where('id',$loan->employee_id)->first();
        if($request->hasFile('image') === false ) {
            return redirect()->route('loans.sendingMoney',$loan->id)->with('success','bukti transfer harus di masukan');
        }
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameImage = 'bukti_transfer'.'.'.$extension;
            $request->file('image')->storeAs('public/documents/'.$employee->nric.'/bukti_transfer/',$fileNameImage);
            Comments::create([
                'comments' => $request->comments,
                'user_id' => auth()->user()->id,
                'application_loan_id' => $loan->id,
            ]);
            $loan->update([
                'status_id' => $request->status_id
            ]);
            $employee->update([
                'haveAloan' =>true,
            ]);
            BuktiTransfer::create([
                'name_employee' => $request->name_employee,
                'name_bank' => $request->name_bank,
                'number_bank' => $request->number_bank,
                'image' => $fileNameImage,
                'loan_application_id' => $loan->id
            ]);


        return redirect()->route('loans.show',$loan->id);
    }


    public function edit(LoanApplications $loanApplications)
    {
        $typeloans = TypeLoan::all();
        $loan = LoanApplications::all()->find($loanApplications);

        return view('module.loans.application_loans.update',compact('loan','typeloans'));
    }


    public function update(Request $request, LoanApplications $loanApplications)
    {
        $loan = LoanApplications::all()->find($loanApplications);

        $loan->update([
            'typeLoan_id' => $request->typeLoan_id,
            'period'      => $request->period_payment,
            'charge_fee'  => $request->charge_fee,
            'bunga'      => $request->bunga,
            'loan_ammount'  => $request->loan_ammount,
            'description'   => $request->description,
            'remaining_payment' => $request->period_payment,
            'mountly_installment' => $request->loan_ammount / $request->period_payment,
        ]);

        Employee::where('id',$loan->employee->id)->first();

        Comments::create([
            'comments' => Auth::user()->name.' - '.Auth::user()->roles[0]->name.' has been updated application loan!',
            'user_id' =>Auth::user()->id,
            'application_loan_id' => $loan->id
        ]);
        return redirect()->route('loans.index')->with('success','Update Loan Application Succeessfully');
    }
    public function destroy(LoanApplications $loanApplications)
    {
        //
    }
}
