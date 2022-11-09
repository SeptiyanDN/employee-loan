@extends('layouts.master')
@section('title')
Assign Permissions
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Assign Permissions</h4>
    <h6>Assign Permissions</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header">
        <h5 class="card-title">Assign Permissions</h5>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        </div>
        <div class="card-body">

        <form action={{route('assign.create')}} method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-form-label col-md-2">Nama Role</label>
                <div class="col-md-10">
                <select type="text" name="roles" id="roles" class="form-control select" >
                    <option disable selected>Pilih Role!</option>
                    @foreach ($roles as $role )
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('roles')
                <div class="text-danger mt-2 d-block">{{$message}}</div>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-md-2">Nama Permissions</label>
                <div class="col-md-10">
                <select type="text" name="permissions[]" id="permissions" class="form-control select" multiple >
                    @foreach ($permissions as $permission )
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
                @error('permissions')
                <div class="text-danger mt-2 d-block">{{$message}}</div>
                @enderror
                </div>
            </div>

                <button type="submit"  class="btn btn-primary">Assign</button>
        </form>
        </div>
        </div>
        </div>
    <div class="page-btn">
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
        <table class="table datanew table-hover">
            <thead>
                <tr>
                    <th style="width:3%">#</th>
                    <th style="width:10%">Nama Role</th>
                    <th style="width:5%">Nama Guard</th>
                    <th style="width:10%">Permissions</th>
                    <th style="width:3%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $index => $role)
                <tr>
                    <td>{{$index +1 }}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->guard_name}}</td>
                    <td>
                    @if ($role->name == 'super admin')
                        Memiliki Semua Akses
                    @endif
                    {{implode(', ', $role->getPermissionNames()->toArray())}}
                    </td>
                    <td>
                        <a class="me-3" href={{route('assign.edit',$role)}}>
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
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
        table = $('.datanew').DataTable({
			"bFilter": true,
            "responsive":true,
			"sDom": 'fBtlpi',
            "autoWidth": false,
			"ordering": true,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Mencari...",
				info: "_START_ - _END_ of _TOTAL_ items",
			 },

		});
    })



    function deleteData(url){
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
        $.post(url, {
        '_token': $('[name=csrf-token]').attr('content'),
        '_method': 'delete'
        })
        .done((response) => {
        location.reload();
        toastr.error('Data anda telah terhapus','PERHATIAN')
        });
        });
    }
</script>
@endpush
