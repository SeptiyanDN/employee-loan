@extends('layouts.master')
@section('title')
Tambahkan Produk Baru
@endsection
@section('content')

<div class="page-header">
    <div class="page-title">
    <h4>Product Add</h4>
    <h6>Create new product</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
<form action={{route('tambah.produk')}} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Product Name</label>
    <input type="text" name="nama_produk" class="form-control">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Category</label>
        <select name="kategori_id" class="form-control select">
        <option>Choose Category</option>
        @foreach ($kategori as $data )
        <option value={{$data->id}}>{{$data->nama_kategori}}</option>
        @endforeach
        </select>
        <p class="text-muted text-block cursor-pointer">
            Kategori tidak tersedia? <a onclick="addForm('{{ route('tambah.kategori') }}')"><span class="text-danger">Tambahkan kategori baru</span></a>
        </p>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
            <label>Merek</label>
            <select name="merek_id" class="form-control select">
            <option>Choose Merek</option>
            @foreach ($merek as $item )
            <option value={{$item->id}}>{{$item->nama_merek}}</option>

            @endforeach
            </select>
            <p class="text-muted text-block cursor-pointer">
                Kategori tidak tersedia? <a onclick="addMerek('{{ route('tambah.merek') }}')"><span class="text-danger">Tambahkan Merek baru</span></a>
            </p>
            </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Jual</label>
    <input type="text" name="harga_jual" class="form-control">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Modal</label>
     <input type="text"name="harga_modal" class="form-control">
    </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Satuan</label>
        <select name="satuan" class="form-control select">
        <option>Pilih Satuan</option>
        <option value="pcs">Pcs</option>
        </select>
        </div>
    </div>
    <div class="col-lg-4 col-sm-5 col-12">
        <div class="form-group">
        <label>Jumlah Stock</label>
         <input type="text" name="stok" class="form-control">
        </div>
    </div>
    <div class="col-lg-4 col-sm-5 col-12">
        <div class="form-group">
        <label>Minimum Stock</label>
        <input type="text" name="minimum_stok" class="form-control">
        </div>
    </div>
    <div class="col-lg-2 col-sm-5 col-12">
        <div class="form-group">
        <label>Diskon</label>
        <input type="text" name="diskon" class="form-control">
        </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
        <label> Favorit</label>
        <select name="favorit" class="form-control select">
        <option value="ya">Ya</option>
        <option value="tidak">Tidak</option>
        </select>
        </div>
        </div>

    <div class="col-md-12 form-group">
        <label>
            <input type="checkbox" name="notifikasi_stok_minimum" checked data-toggle="toggle" data-size="xs">
            Kirimkan notifikasi saat stok mencapai batas minimum
        </label>
    </div>

</div>

    <div class="col-lg-12">
    <div class="form-group">
    <label> Product Image</label>
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
    <a href={{route('index.produk')}} class="btn btn-cancel">Cancel</a>
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
