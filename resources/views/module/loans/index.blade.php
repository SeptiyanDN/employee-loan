@extends('layouts.master')
@section('title')
Loan Applications List
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Loan Applications List</h4>
    <h6>Loan Applications List</h6>
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

                    <th>No</th>
                    <th>ID Application</th>
                    <th>Employee Name</th>
                    <th>Ammount</th>
                    <th>Mounthly Installment</th>
                    <th>Status Loan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

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
            "serverSide" : true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": true,

            ajax: {
                url: '{{ route('loans.json') }}',

            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'number_application'},
                {data: 'employee_name'},
                {data: 'loan_ammount'},
                {data: 'mountly_installment'},
                {data: 'status'},
                {data: 'Action'},
            ]
        });
        new $.fn.dataTable.Buttons( table, {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
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
