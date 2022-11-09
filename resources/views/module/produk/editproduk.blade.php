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
<form action={{route('edit.produk',$produk)}} method="POST">
    @method('PUT')
    @csrf
    <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Product Name</label>
    <input type="text" name="nama_produk" class="form-control" value="{{old('produk') ?? $produk->nama_produk}}">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Category</label>
        <select name="kategori_id" class="form-control select" >
        <option value={{$produk->kategori_id}}>{{$produk->kategori->nama_kategori}}</option>
        <option value="1">Computers</option>
        </select>
        <p class="text-muted text-block cursor-pointer">
            Kategori tidak tersedia? <span class="text-danger">Tambahkan kategori baru</span>
        </p>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
            <label>Merek</label>
            <select name="merek_id" class="form-control select" >
            <option value={{$produk->merek_id}}>{{old('merek_id') ?? $produk->merek->nama_merek}}</option>
            <option value="1">Computers</option>
            </select>
            <p class="text-muted text-block cursor-pointer">
                Kategori tidak tersedia? <span class="text-danger">Tambahkan Merek baru</span>
            </p>
            </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Jual</label>
    <input type="text" name="harga_jual" class="form-control" value={{$produk->harga_jual}}>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Modal</label>
     <input type="text"name="harga_modal" class="form-control" value={{$produk->harga_modal}}>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Kode Produk (SKU)</label>
    <input type="text" name="sku" class="form-control"value={{$produk->sku}}>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
        <label>Satuan</label>
        <select name="satuan" class="form-control select">
        <option>{{$produk->satuan}}</option>
        <option value="pcs">Pcs</option>
        </select>
        </div>
    </div>
    <div class="col-lg-5 col-sm-5 col-12">
        <div class="form-group">
        <label>Jumlah Stock</label>
         <input type="text" name="stok" class="form-control"value={{$produk->stok}}>
        </div>
    </div>
    <div class="col-lg-5 col-sm-5 col-12">
        <div class="form-group">
        <label>Minimum Stock</label>
        <input type="text" name="minimum_stok" class="form-control"value={{$produk->minimum_stok}}>
        </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
        <label> Favorit</label>
        <select name="favorit" class="form-control select">
            <option value={{$produk->favorit}}>{{$produk->favorit}}</option>
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
    <input type="file">
    <div class="image-uploads">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
    <h4>Drag and drop a file to upload</h4>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-12">
    <button type="submit" class="btn btn-submit">Submit</button>
    <a href={{route('index.produk')}} class="btn btn-cancel">Cancel</a>
    </div>
</form>
    </div>
    </div>
    </div>

    </div>
@endsection
@push('scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endpush
