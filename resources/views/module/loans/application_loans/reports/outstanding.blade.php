@extends('layouts.master')
@section('title')
Report Applications Outstanding
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Report Applications Outstanding</h4>
    <h6>Report Applications Outstanding</h6>
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
                    <th>Status Loan</th>
                    <th>Mounthly Installment</th>
                    <th>Overdue Date</th>
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
            "language": {
				sLengthMenu: '_MENU_',
				info: "_START_ - _END_ of _TOTAL_ items",
			 },
            "buttons": [
               'copy',
               'excel',
               'csv',
               'pdf',
               'print'
            ],
            ajax: {
                url: '{{ route('json.outstanding') }}',
            },
            columns: [
                {data: 'number_application'},
                {data: 'employee_name'},
                {data: 'status'},
                {data: 'mountly_installment'},
                {data: 'due_date'},
                {data: 'Action'},
            ],
        });
    })
</script>
@endpush
