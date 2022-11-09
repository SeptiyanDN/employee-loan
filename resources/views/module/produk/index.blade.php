@extends('layouts.master')
@section('title')
Manage Produk
@endsection
@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Manage Produk</h4>
    <h6>Manage Produk</h6>
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
        <a href={{route('tambah.produk')}} class="btn btn-primary btn-sm">Tambah Transaksi Baru</a>
        <a type="button" onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-secondary btn-sm">Hapus</a>

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
     <form class="form-produk" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th width="1%">
                            <input type="checkbox" name="select_all" id="select_all">
                        </th>
                        <th>No</th>
                        <th>Foto Produk</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Stok</th>
                        <th>Action</i></th>
                    </thead>
                </table>
            </div>
        </form>
    </div>
    </div>

    </div>

@endsection
@push('scripts')
<script>
  let table;
    $(function () {
        table = $('.table').DataTable({
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
                url: '{{ route('produk.data') }}',

            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex'},
                {data: 'image'},
                {data: 'sku'},
                {data: 'nama_produk'},
                {data: 'kategori'},
                {data: 'merek'},
                {data: 'harga_beli'},
                {data: 'harga_jual'},
                {data: 'diskon'},
                {data: 'stok'},
                {data: 'Action'},
            ]
        });
        $('[name=select_all]').on('click', function (){
            $(':checkbox').prop('checked', this.checked);
        });

    })
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
                    $.post(url, $('.form-produk').serialize())
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
</script>
@endpush
