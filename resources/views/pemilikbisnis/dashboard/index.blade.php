@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
    </div>
    <div class="dash-widgetcontent">
    <h5>$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
    <h6>Total Penjualan</h6>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget dash1">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
    </div>
    <div class="dash-widgetcontent">
    <h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
    <h6>Total Pembelian</h6>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget dash2">
    <div class="dash-widgetimg">
    <span><img src="assets/img/icons/dash4.svg" alt="img"></span>

    </div>
    <div class="dash-widgetcontent">
    <h5>Rp. <span >{{$pengeluaran}}</span></h5>
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
        <h5>Rp. <span >{{$pemasukan}}</span></h5>
        <h6>Total Pemasukan</h6>
        </div>
        </div>
        </div>
    <div class="col-lg-12 col-sm-12 col-12 d-flex">
    <div class="dash-count das1">
    <div class="dash-counts">
    <h4>Rp. <span >{{$totalSaldo}}</span></h4>
    <h5>Total Saldo Kas</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="dollar-sign"></i>
    </div>
    </div>
        </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count">
    <div class="dash-counts">
    <h4>100</h4>
    <h5>Total Produk</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="package"></i>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das1">
    <div class="dash-counts">
    <h4>{{$supplier}}</h4>
    <h5>Suppliers</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="user-check"></i>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das2">
    <div class="dash-counts">
    <h4>100</h4>
    <h5>Total Kategori</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="inbox"></i>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
    <div class="dash-count das3">
    <div class="dash-counts">
    <h4>{{$tenant}}</h4>
    <h5>Cabang Outlet</h5>
    </div>
    <div class="dash-imgs">
    <i data-feather="monitor"></i>
    </div>
    </div>
    </div>
    </div>

@endsection

