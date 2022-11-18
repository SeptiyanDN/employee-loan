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
    <form action={{route('loans.sendingMoney',$loan->id)}} method="POST" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Change status to : </label>
            <select name="status_id" id="status_id" class="form-control">
                @foreach ($status as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Full Name : </label>
            <input type="text" name="name_employee" id="name_employee" value="{{$loan->employee->name}}" readonly class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="">Name of Bank : </label>
                <input type="text" name="name_bank" id="name_bank" class="form-control" readonly value="{{$bank->name}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="">Number of Bank : </label>
                <input type="text" name="number_bank" id="number_bank" class="form-control" readonly value="{{$bank->number}}">
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Message : </label>
            <textarea name="comments" id="comments" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Bukti Transfer : </label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Complete</button>
    <a href="{{route('loans.show',$loan->id)}}" class="btn btn-secondary">Return Back</a>
    </form>
</div>
</div>
</div>
</div>

@endsection
