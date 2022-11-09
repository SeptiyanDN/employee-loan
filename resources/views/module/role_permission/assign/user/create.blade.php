@extends('layouts.master')
@section('title')
Assign Users Role
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Assign Users Role</h4>
    <h6>Assign Users Role</h6>
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
        <h5 class="card-title">Assign Permissions By Email User</h5>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        </div>
        <div class="card-body">

        <form action={{route('assign.user.create')}} method="POST">
            @csrf
             <div class="form-group row">
                <label class="col-form-label col-md-2">User</label>
                <div class="col-md-10">
                <input type="text" name="email" id="email" class="form-control" >

                @error('roles')
                <div class="text-danger mt-2 d-block">{{$message}}</div>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-md-2">Roles</label>
                <div class="col-md-10">
                <select type="text" name="roles[]" id="roles" class="form-control select">
                    @foreach ($roles as $role )
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('roles')
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
                    <th style="width:10%">Nama</th>
                    <th style="width:10%">Email</th>
                    <th style="width:10%">Roles</th>
                    <th style="width:3%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{$index +1 }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    {{implode(', ', $user->getRoleNames()->toArray())}}
                    </td>
                    <td>
                        <a class="me-3" href={{route('assign.user.edit',$user)}}>
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
