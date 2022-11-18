@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')
<div class="row">
    {{-- <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
    </div>
    <div class="dash-widgetcontent">
    <h5><span class="counters" data-count="307144.00">$307,144.00</span></h5>
    <h6>Outstanding Balance</h6>
    </div>
    </div>
    </div> --}}
    {{-- <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget dash1">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
    </div>
    <div class="dash-widgetcontent">
    <h5><span class="counters" data-count="4385.00">$4,385.00</span></h5>
    <h6>Balance Paid</h6>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget dash2">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash4.svg" alt="img"></span>

    </div>
    <div class="dash-widgetcontent">
    <h5>Rp. <span >222112</span></h5>
    <h6>Total Pengeluaran</h6>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash2">
        <div class="dash-widgetimg">
        <span><img src="assets/img/icons/dash3.svg" alt="img"></span>

        </div>
        <div class="dash-widgetcontent">
        <h5>Rp. <span >123211</span></h5>
        <h6>Total Pemasukan</h6>
        </div>
        </div>
        </div> --}}
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

