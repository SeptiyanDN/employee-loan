@extends('layouts.master')
@section('title')
Resending to Analyst
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Analyst Approval</h4>
    <h6>Analyst Approval</h6>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">

<div class="card">
<div class="card-body">
    <form action={{route('loans.resendingAnalystService',$loan->id)}} method="POST" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Action : </label>
            <input type="text" class="form-control" readonly value="Resending to Analyst">
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Reason for Resending to Analyst : </label>
            <textarea name="comments" id="comments" rows="8" class="form-control"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Resending Now</button>
    <a href="{{route('loans.show',$loan->id)}}" class="btn btn-secondary">Return Back</a>
    </form>
</div>
</div>
</div>
</div>

@endsection
