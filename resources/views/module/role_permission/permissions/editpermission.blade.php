@extends('layouts.master')
@section('title')
Manage Permissions
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Roles And Permissions</h4>
    <h6>Update Permissions</h6>
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
        <h5 class="card-title">Update Permission</h5>
        </div>
        <div class="card-body">

        <form action={{route('permissions.edit',$permission)}} method="POST">
            @csrf
            @method('PUT')
            @include('module.role_permission.permissions.partials.form-control')
            <a type="button" href="/role-and-permission/permissions"  class="btn btn-danger">Kembali</a>
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
