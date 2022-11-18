@extends('layouts.master')
@section('title')
CEO Proses Applications List
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>CEO Proses Applications List</h4>
    <h6>CEO Proses Applications List</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
    <div class="card">
    <div class="card-body">
    <div class="table-top">
    <div class="search-set">

    </div>

    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table datanew table-hover">
            <thead>
                <tr>
                    <th>ID Application</th>
                    <th>Employee Name</th>
                    <th>Ammount</th>
                    <th>Mounthly Installment</th>
                    <th>Status Loan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                <tr>
                    <td><span class="btn btn-rounded btn-primary">{{$loan->number_application}}</span></td>
                    <td>{{$loan->employee->name}}</td>
                    <td>{{$loan->loan_ammount}}</td>
                    <td>{{$loan->mountly_installment}}</td>
                    <td>{{$loan->status->name}}</td>
                    <td>
                        <a class="me-3" href="{{route('loans.show', $loan)}}">
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                        </a>
                        @can('loan_application_edit')
                        <a class="me-3" href="{{route('loans.edit', $loan)}}">
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
                        </a>
                        @endcan
                        @can('loan_application_delete')
                            <a class="me-3" href="{{route('loans.show', $loan)}}">
                                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
                            </a>
                        @endcan

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
            // "serverSide" : true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": true,


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
            console.log(response)
        location.reload();
        toastr.error('Data anda telah terhapus','PERHATIAN')
        });
        });
    }
</script>
@endpush
