@extends('layouts.master')
@section('title')
Management Outlet
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Management Outlet</h4>
    <h6>Management Outlet</h6>
    </div>
    <div class="page-btn">
    <a href="/outlet/tambah-outlet" class="btn btn-added"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus.svg" alt="img" class="me-1">Tambah Outlet Baru</a>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="table-top">
    <div class="search-set">
    <div class="search-path">
    <a class="btn btn-filter" id="filter_search">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/filter.svg" alt="img">
    <span><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/closes.svg" alt="img"></span>
    </a>
    </div>
    <div class="search-input">
    <a class="btn btn-searchset"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/search-white.svg" alt="img"></a>
    </div>
    </div>

    <div class="wordset">
    <ul>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/pdf.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/excel.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/printer.svg" alt="img"></a>
    </li>
    </ul>
    </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="card mb-0" id="filter_inputs">
    <div class="card-body pb-0">
    <div class="row">
    <div class="col-lg-12 col-sm-12">
    <div class="row">
     <div class="col-lg col-sm-6 col-12">
    <div class="form-group">
    <select class="select">
    <option>Choose Product</option>
    <option>Macbook pro</option>
    <option>Orange</option>
    </select>
    </div>
    </div>
    <div class="col-lg col-sm-6 col-12">
    <div class="form-group">
    <select class="select">
    <option>Choose Category</option>
    <option>Computers</option>
    <option>Fruits</option>
    </select>
    </div>
    </div>
    <div class="col-lg col-sm-6 col-12">
    <div class="form-group">
    <select class="select">
    <option>Choose Sub Category</option>
    <option>Computer</option>
    </select>
    </div>
    </div>
    <div class="col-lg col-sm-6 col-12">
    <div class="form-group">
    <select class="select">
    <option>Brand</option>
    <option>N/D</option>
    </select>
    </div>
    </div>
    <div class="col-lg col-sm-6 col-12 ">
    <div class="form-group">
    <select class="select">
    <option>Price</option>
    <option>150.00</option>
    </select>
    </div>
    </div>
    <div class="col-lg-1 col-sm-6 col-12">
    <div class="form-group">
    <a class="btn btn-filters ms-auto"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/search-whites.svg" alt="img"></a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="table-responsive">
        <table class="table table-outlet table-hover" >
            <thead>
                <tr>
                    <th>Nama Outlet</th>
                    <th>Telepon</th>
                    <th>Alamat </th>
                    <th >Kelurahan</th>
                    <th>Kode Pos</th>
                    <th>Subdomain</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenants as $tenant)
                <tr>
                    <td>{{$tenant->name}}</td>
                    <td>{{$tenant->telepon}}</td>
                    <td>{{$tenant->alamat}}</td>
                    <td>{{$tenant->kelurahan}}</td>
                    <td>{{$tenant->kode_pos}}</td>
                    <td>{{$tenant->subdomain}}</td>
                    <td>
                        <a class="me-3" >
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
                        </a>
                        <a class="me-3" >
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
    </table>
    </div>
    </div>
    </div>

    </div>
@endsection

@push('scripts')
<script>
    let table
    $(function(){
        table = $('.table-outlet').DataTable({
			"bFilter": true,
            "responsive":true,
			"sDom": 'fBtlpi',
            "autoWidth": true,
			"ordering": true,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Mencari...",
				info: "_START_ - _END_ of _TOTAL_ items",
			 },

			initComplete: (settings, json)=>{
				$('.dataTables_filter').appendTo('#tableSearch');
				$('.dataTables_filter').appendTo('.search-input');
			},
		});
    })

    function deleteData(url){
        swal({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus",
            closeOnConfirm: true
        },
        function () {
        $.post(url, {
        '_token': $('[name=csrf-token]').attr('content'),
        '_method': 'delete'
        })
        .done((response) => {
        table.ajax.reload();
        toastr.error('Data anda telah terhapus','PERHATIAN')
        });
        });
    }
</script>
@endpush
