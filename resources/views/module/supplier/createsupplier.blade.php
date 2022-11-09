@extends('layouts.master')
@section('title')
Tambahkan Supplier Baru
@endsection
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Managemen Supplier</h4>
    <h6>Tambah Supplier Baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
        <form action={{route('tambah.supplier')}} method="POST">
            @csrf
    <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Nama Supplier</label>
    <input type="text" id="nama_supplier" name="nama_supplier" class="form-control">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Email</label>
    <input type="text" id="email" name="email" class="form-control">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Phone</label>
    <input type="text"id="telepon" name="telepon" class="form-control">
    </div>
    </div>


    <div class="col-lg-12">
    <div class="form-group">
    <label>Alamat</label>
    <textarea id="alamat" name="alamat" class="form-control" type="text"></textarea>
    </div>
    </div>
   <div class="col-lg-8">
    <div class="form-group">
        <label for="">Kelurahan</label>
        <select id="kelurahan" name="kelurahan" class="form-control" ></select>
    </div>
   </div>
   <div class="col-lg-4">
    <div class="form-group">
        <label for="">Kode POS</label>
        <input type="text" name="kode_pos" id="kode_pos" class="form-control">
    </div>
   </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4" style="margin-bottom: 30px margin-top:20">
            <h3>Informasi Supplier</h3>
            <p class="text-small">Informasi perwakilan dari supplier yang bisa dihubungi.</p>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group required">
                        <label class="labels">Nama Supplier</label>
                        <input class="form-control" name="nama_perwakilan" id="nama_perwakilan" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="labels">No. HP</label>
                        <input type="text" class="form-control" name="telepon_perwakilan" id="telepon_perwakilan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required">
                        <label class="labels">Email</label>
                        <input class="form-control" name="email_perwakilan" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-submit">Submit</button>
            <button href="javascript:void(0);" class="btn btn-cancel">button</button>
        </div>
    </div>
</form>
    </div>

    </div>

    </div>
@endsection
@push('scripts')
<script>
    $('#kelurahan').select2({
    placeholder: "Pilih Kelurahan...",
    minimumInputLength: 2,
    ajax: {
        url: "{{route('json.kelurahan')}}",
        dataType: 'json',
        data: function (params) {
            return {
                kelurahan: $.trim(params.term)
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
});
</script>


@endpush
