@extends('layouts.master')
@section('title')
Analyst Rejected
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Analyst Rejected</h4>
    <h6>Analyst Rejected</h6>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">

<div class="card">
<div class="card-body">
    <form action={{route('loans.rejectAnalystService',$loan->id)}} method="POST" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Change status to : </label>
            <select name="status_id" id="status_id" class="form-control">
                @foreach ($status as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="">Comments for Rejected : </label>
            <textarea name="comments" id="comments" rows="8" class="form-control"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-danger">Reject Now</button>
    <a href="{{route('loans.show',$loan->id)}}" class="btn btn-secondary">Return Back</a>
    </form>
</div>
</div>
</div>
</div>

@endsection
