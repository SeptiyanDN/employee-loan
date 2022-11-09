@extends('layouts.master')
@section('title')
Pembelian Stok Produk
@endsection
@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Pembelian Stock Produk</h4>
    <h6>Pembelian Stock Produk</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
    <div class="card">
    <div class="card-body">
    <div class="table-top">
    <div class="search-set">
    <div class="search-input">
        <a onclick="addForm()" class="btn btn-primary btn-sm">Tambah Transaksi Baru</a>
        <a type="button" onclick="deleteSelected('{{ route('pengeluaran.delete_selected') }}')" class="btn btn-secondary btn-sm">Hapus</a>

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
    </div>
    </div>
    </div>
    </div>
    </div>
     <form enctype="multipart/form-data" class="form-pengeluaran" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-pembelian" >
                    <thead>
                        <th width="1%">
                            <input type="checkbox" name="select_all" id="select_all">
                        </th>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Total Item</th>
                        <th>Total Harga</th>
                        <th>Diskon</th>
                        <th width="15%">Action</i></th>
                    </thead>
                </table>
            </div>
        </form>
    </div>
    </div>

    </div>
@includeIf('module.pembelian.suppplier')
@endsection
@push('scripts')
<script>
  let table,table1;
    $(function () {

        table = $('.table-pembelian').DataTable({
            "bFilter": true,
            "responsive":true,
            "serverSide" : true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": false,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Mencari...",
				info: "_START_ - _END_ of _TOTAL_ items",
			 },
            ajax: {
                url: '{{ route('pembelian.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex'},
                {data: 'created_at'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'Action'},
            ]

        });
        $('#table-supplier').DataTable();

    });

    function addForm(){
        $('#modal-supplier').modal('show');
    }

    function deleteSelected(url){
        if ($('input:checked').length >= 1) {
            swal({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus",
            confirmButtonColor: "#DD6B55",
            closeOnConfirm: true
            },
                function () {
                    $.post(url, $('.form-pengeluaran').serialize())
            .done((response) => {
            table.ajax.reload();
            toastr.success('Data anda telah terhapus','BERHASIL')
            });
            });
        }else{
        toastr.error('Pilih data yang akan di hapus!','PERHATIAN')
            return;
        }
    }


    function deleteData(url){
        swal({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus",
            closeOnConfirm: false
        },
        function () {
        $.post(url, {
        '_token': $('[name=csrf-token]').attr('content'),
        '_method': 'delete'
        })
        .done((response) => {
        swal("Deleted!", "Data anda telah terhapus", "success");
        table.ajax.reload();
        });
        });
    }
</script>
@endpush
