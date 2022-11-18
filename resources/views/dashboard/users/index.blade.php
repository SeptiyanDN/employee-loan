@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-sm-8 col-8 d-flex">
    <div class="dash-count das1">
    <div class="dash-counts">
    <h4><span >Overview Admin Dashboard</span></h4>
    <h5>Detail balance</h5>
    </div>
    <div class="dash-imgs">
    {{-- <i data-feather="dollar-sign"></i> --}}
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-4 d-flex">
        <div class="dash-count das1">
        <div class="dash-counts">
        <h4><span >{{$proccesing}}</span></h4>
        <h5>Applications Proccesing</h5>
        </div>
        <div class="dash-imgs">
    <i data-feather="monitor"></i>
        </div>
        </div>
        </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count">
    <div class="dash-counts">
    <h4><span>{{$terhutang}}</span></h4>
    <h5>Outstanding Balance</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="dollar-sign"></i>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das1">
    <div class="dash-counts">
    <h4>{{$paid->paid}}</h4>
    <h5>Balance Paid</h5>
    </div>
    <div class="dash-imgs">
        <i data-feather="dollar-sign"></i>

    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das2">
    <div class="dash-counts">
    <h4>{{$overdue}}</h4>
    <h5>Loan Overdue</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="inbox"></i>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das3">
    <div class="dash-counts">
    <h4>{{$complete}}</h4>
    <h5>Loan Complete</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="user-check"></i>

    </div>
    </div>
    </div>
    </div>

@endsection

