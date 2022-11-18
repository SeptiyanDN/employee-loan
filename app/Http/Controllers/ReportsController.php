<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\LoanApplications;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function jsonOverdue() {
        $loans = LoanApplications::where('overdue',true)->get();
        return datatables()
            ->of($loans)
            ->addIndexColumn()
            ->addColumn('employee_name', function($loans){
                return $loans->employee->name;
            })
            ->addColumn('loan_ammount',function($loans){
                return Helpers::format_uang($loans->loan_ammount);
            })
            ->addColumn('mountly_installment',function($loans){
                return Helpers::format_uang($loans->mountly_installment);
            })
            ->addColumn('status',function($loans){
                if ($loans->overdue === true) {
                    return '<span class="btn btn-rounded btn-danger">Overdue</span>';
                } else {
                    return '<span class="btn btn-rounded btn-primary">On Going</span>';
                }
            })
            ->addColumn('due_date',function($loans){
                return Helpers::tanggal_indonesia($loans->due_date,false);
            })
            ->addColumn('Action', function ($loans){
                return '
                <a class="me-3" href="'.route('loans.show', $loans->id).'">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
            </a>';
            })
            ->rawColumns(['Action','loan_ammount','due_date','mountly_installment','status'])
            ->make(true);

        }

    public function overdue(){
        return view('module.loans.application_loans.reports.overdue');
    }

    public function jsonComplete() {
        $loans = LoanApplications::where('status_id',8)->get();
        return datatables()
            ->of($loans)
            ->addIndexColumn()
            ->addColumn('employee_name', function($loans){
                return $loans->employee->name;
            })
            ->addColumn('loan_ammount',function($loans){
                return Helpers::format_uang($loans->loan_ammount);
            })
            ->addColumn('status',function($loans){
                return '<span class="btn btn-rounded btn-success">Succeed</span>';
        })
            ->addColumn('mountly_installment',function($loans){
                return Helpers::format_uang($loans->mountly_installment);
            })
            ->addColumn('due_date',function($loans){
                return Helpers::tanggal_indonesia($loans->due_date,false);
            })
            ->addColumn('Action', function ($loans){
                return '
                <a class="me-3" href="'.route('loans.show', $loans->id).'">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
            </a>';
            })
            ->rawColumns(['Action','loan_ammount','due_date','mountly_installment','status'])
            ->make(true);

        }


    public function complete() {
        return view('module.loans.application_loans.reports.complete');
    }

    public function jsonOutstanding () {
        $loans = LoanApplications::where('status_id',6)->get();
        return datatables()
                ->of($loans)
                ->addIndexColumn()
                ->addColumn('employee_name', function($loans){
                    return $loans->employee->name;
                })
                ->addColumn('loan_ammount',function($loans){
                    return Helpers::format_uang($loans->loan_ammount);
                })
                ->addColumn('mountly_installment',function($loans){
                    return Helpers::format_uang($loans->mountly_installment);
                })
                ->addColumn('status',function($loans){
                        return '<span class="btn btn-rounded btn-success">On Going</span>';
                })
                ->addColumn('due_date',function($loans){
                    return Helpers::tanggal_indonesia($loans->due_date,false);
                })
                ->addColumn('Action', function ($loans){
                    return '
                    <a class="me-3" href="'.route('loans.show', $loans->id).'">
                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                </a>';
                })
                ->rawColumns(['Action','loan_ammount','due_date','mountly_installment','status'])
                ->make(true);
    }

    public function outstanding () {
        return view('module.loans.application_loans.reports.outstanding');
    }
}
