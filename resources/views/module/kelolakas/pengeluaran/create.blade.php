@extends('layouts.master')
@section('title')
Tambahkan Informasi Kas - Pengeluaran
@endsection
@section('content')

<div class="page-header">
    <div class="page-title">
    <h4>Informasi Kas</h4>
    <h6>Menambahkan pengeluaran baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
<form action={{route('pengeluaran.store')}} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
        <label>Jenis Pengeluaran</label>
        <select name="deskripsi_pengeluaran_id" class="form-control select">
            <option value="">Pilih Salah Satu</option>
            @foreach ($deskripsi as $key=>$item)
        <option value="{{$item->id}}">{{$item->kode_transaksi}} || {{$item->deskripsi_pengeluaran}}</option>
    @endforeach
        </select>

        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="form-group">
    <label>Nominal</label>
    <input type="text" name="nominal" class="form-control">
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" class="form-control">
    </div>
    </div>
</div>
    <div class="col-lg-12">
    <div class="form-group">
    <label> Bukti Transaksi</label>
    <div class="image-upload">
    <input type="file" name="image" id="image" class="form-control">
    <div class="image-uploads">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
    <h4>Drag and drop a file to upload</h4>
    </div>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-submit">Submit</button>
    <a href={{route('pengeluaran.index')}} class="btn btn-cancel">Cancel</a>
    </div>
</form>
    <div class="col-lg-12">
    </div>
    </div>
    </div>

    </div>
@includeIf('module.produk.merek.form')
@includeIf('module.produk.kategori.form')
@endsection
@push('scripts')

<script>
    $(function () {

        $('#modal-form').validator().on('submit', function (e){
            if (! e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
            swal({
            title: "Berhasil!",
            text: "Data anda telah tersimpan",
            type: "success",
            confirmButtonColor: "#1ab394"
            },function () {
                $('#modal-form').modal('hide');
                location.reload();
                });
            }
            toastr.success('Data anda telah disimpan','PERHATIAN')

        });
        $('#modalForm').validator().on('submit', function (e){
            if (! e.preventDefault()){
                $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
            swal({
            title: "Berhasil!",
            text: "Data anda telah tersimpan",
            type: "success",
            confirmButtonColor: "#1ab394"
            },function () {
                $('#modalForm').modal('hide');
                location.reload();
                });
            }
            toastr.success('Data anda telah disimpan','PERHATIAN')

        });
    });
     function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-hide').modal('hide');
        $('#modal-form .modal-title').text('Tambah Kategori');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();
    }

    function addMerek(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-hide').modal('hide');
        $('#modalForm .modal-title').text('Tambah Merek');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
        $('#modalForm [name=nama_merek]').focus();
    }
</script>
@endpush
