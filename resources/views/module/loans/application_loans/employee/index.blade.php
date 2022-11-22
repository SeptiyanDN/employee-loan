@extends('layouts.master')
@section('title')
Sending Money
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Sending Money</h4>
    <h6>Sending Money</h6>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">

<div class="card">
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <form action={{route('loanpayment.store')}} method="POST" enctype="multipart/form-data" >
        @method('POST')
        @csrf
   <div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="">Number Application Loan : </label>
            <input type="text" name="number_application" id="number_application" value="{{$loan->number_application}}" readonly class="form-control">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="">Employee Name : </label>
            <input type="text" name="name_employee" id="name_employee" value="{{$loan->employee->name}}" readonly class="form-control">
        </div>
    </div>
   </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="">Loan Type : </label>
                <input type="text" name="name_bank" id="name_bank" class="form-control" readonly value="{{$status->name}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="">Mounthly Loan : </label>
                <input type="text" name="mountly_installment" id="mountly_installment" class="form-control" readonly value="{{$loan->mountly_installment}}">
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Bukti Transfer : </label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Send Money</button>
    <a href="{{route('myloan')}}" class="btn btn-secondary">Return Back</a>
    </form>
</div>
</div>
</div>
</div>

@endsection
