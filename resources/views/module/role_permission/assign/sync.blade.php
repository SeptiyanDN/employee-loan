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
        <h5 class="card-title">Assign Permissions Role {{$role->name}}</h5>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        </div>
        <div class="card-body">

        <form action={{route('assign.edit',$role)}} method="post">
            @method('put')
            @csrf
            <div class="form-group row">
                <label class="col-form-label col-md-2">Nama Role</label>
                <div class="col-md-10">
                <select type="text" name="roles" id="roles" class="form-control select" >
                    <option disable selected>Pilih Role!</option>
                    @foreach ($roles as $item )
                        <option {{$role->id == $item->id ? 'selected' :''}} value="{{$role->id}}">{{$role->name}}</option>
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
                        <option {{$role->permissions()->find($permission->id) ? "selected":""}} value="{{$permission->id}}">{{$permission->name}}</option>
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


    </div>

@endsection

