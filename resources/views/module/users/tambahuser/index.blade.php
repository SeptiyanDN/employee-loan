@extends('layouts.master')
@section('title')
Management Users
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>User Management</h4>
    <h6>Menambahkan Users Baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">
    <form action="{{route('users.create')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
            <label>Password</label>
            <div class="pass-group">
            <input type="password" class=" pass-input form-control" id="password" name="password" >
            <span class="fas toggle-password fa-eye-slash"></span>
            </div>
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
            <div class="pass-group">
                <input type="password" class=" pass-input form-control" id="password" name="password" >
                <span class="fas toggle-passworda fa-eye-slash"></span>
            </div>
            </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
            <label>Mobile</label>
            <input type="text" id="telepon" name="telepon" class="form-control">
            </div>
            <div class="form-group">
                <label>Outlet</label>
                <select class="select form-control" id="tenant" name="tenant">
                    <option>Pilihan Outlet</option>

                    @foreach ($tenants as $tenant )
                        <option value={{$tenant->id}}>{{$tenant->name}}</option>
                    @endforeach
                </select>
                </div>

            <div class="form-group">
            <label>Role</label>
            <select class="select form-control" id="role" name="role">
                <option>Pilihan Role</option>

                @foreach ($roles as $role )
                    <option value={{$role->id}}>{{$role->name}}</option>
                @endforeach
            </select>
            </div>

            </div>
            <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
            <label> Profile Picture</label>
            <div class="image-upload image-upload-new">
            <input type="file">
            <div class="image-uploads">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
            <h4>Drag and drop a file to upload</h4>
            </div>
            </div>
            </div>
            </div>
            <div class="col-lg-12">
            <button type="submit" class="btn btn-primary form-control">Submit</button>
            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
    </form>
    </div>
    </div>
    </div>
    </div>

    </div>
@endsection
