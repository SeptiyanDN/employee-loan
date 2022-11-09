@extends('layouts.master')
@section('title')
Tambahkan Informasi Kas - Pemasukan
@endsection
@section('content')

<div class="page-header">
    <div class="page-title">
    <h4>Informasi Kas</h4>
    <h6>Menambahkan Pemasukan baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
<form action={{route('pemasukan.store')}} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
        <label>Jenis Pemasukan</label>
        <select name="deskripsi_pemasukan_id" class="form-control select">
            <option value="">Pilih Salah Satu</option>
            @foreach ($deskripsi as $key=>$item)
        <option value="{{$item->id}}">{{$item->kode_transaksi}} || {{$item->deskripsi_pemasukan}}</option>
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
    <a href={{route('pemasukan.index')}} class="btn btn-cancel">Cancel</a>
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

</script>
@endpush
