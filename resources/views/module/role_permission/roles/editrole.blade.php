@extends('layouts.master')
@section('title')
Manage Roles
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Roles And Permissions</h4>
    <h6>Update roles</h6>
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
        <h5 class="card-title">Update Role</h5>
        </div>
        <div class="card-body">

        <form action={{route('roles.edit',$role)}} method="POST">
            @csrf
            @method('PUT')
            @include('module.role_permission.roles.partials.form-control')
            <a type="button" href="/role-and-permission/roles"  class="btn btn-danger">Kembali</a>
        </form>
        </div>
        </div>
        </div>
    <div class="page-btn">
    </div>
    </div>


    </div>
    </div>

    </div>

@endsection
