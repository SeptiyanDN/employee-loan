@extends('layouts.master')
@section('title')
Create New Application Loan
@endsection
@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Create New Application Loan</h4>
    <h6>Create New Application Loan</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
    <div class="card">
       <div class="card-body">
        <form action={{route('loans.create')}} method="POST" enctype="multipart/form-data" >
            @csrf
           <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="">ID Application Loan</label>
                    <input type="text" name="number_application" id="number_application"class="form-control" readonly value="{{$numberApplications}}">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                <label for="">Select Employee : </label>
                <select name="employee_id" id="employee_id" class="select2 form-control">
                    <option value="">Select Employee</option>
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="">Type Loan : </label>
                    <select name="typeLoan_id" id="typeLoan_id" class="select2 form-control">
                        <option value="">Select Type Loan</option>
                        @foreach ($typeloans as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="">Loan Ammount : </label>
                <input type="text" class="form-control" id="loan_ammount" name="loan_ammount">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Period Payment / Mounth :</label>
                    <select name="period_payment" id="period_payment" class="form-control">
                        <option value="1">1 Mounth</option>
                        <option value="3">3 Mounth</option>
                        <option value="6">6 Mounth</option>
                        <option value="12">12 Mounth</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Charge Fee :</label>
                    <input type="text" class="form-control" id="charge_fee" name="charge_fee" value="0">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Bunga :</label>
                    <input type="text" class="form-control" id="bunga" name="bunga" value="0">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                <label for="">Description : </label>
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
           </div>

           <button type="submit" class="btn btn-primary">Apply</button>

        </form>
       </div>
    </div>

    </div>

@endsection
