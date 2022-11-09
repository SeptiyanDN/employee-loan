@extends('layouts.master')
@section('title')
Mengubah Informasi Kas - Pengeluaran
@endsection
@section('content')

<div class="page-header">
    <div class="page-title">
    <h4>Informasi Kas</h4>
    <h6>Mengubah pengeluaran baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
<form action={{route('pengeluaran.update',$pengeluaran)}} method="POST" enctype="multipart/form-data">
    @method('PUT')
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
    <input type="text" name="nominal" class="form-control" value="{{old('nominal') ?? $pengeluaran->nominal}}">
    </div>
    </div>
    <div class="col-lg-12 col-sm-6 col-12">
    <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{old('keterangan') ?? $pengeluaran->keterangan}}">
    </div>
    </div>
</div>
    <div class="col-lg-12">
    <div class="form-group">
    <label> Bukti Transaksi</label>
    <div class="image-upload">
    <input type="file" name="image" id="image" class="form-control" value="{{old('image') ?? $pengeluaran->image}}">
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
@endsection
