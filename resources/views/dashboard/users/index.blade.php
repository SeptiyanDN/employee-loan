@extends('layouts.master')
@section('title')
Detail Application Loan
@endsection

@section('content')

@endsection

@push('scripts')

@can('dashboard_admin')

<script>
    let table
    $(function(){
        table = $('.logs').DataTable({
            "bFilter": true,
            "responsive":true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": false,

            });
            });
</script>
@endcan
@can('dashboard_employee')
<script>
    let table
    $(function(){
        table = $('.logs').DataTable({
            "bFilter": true,
            "responsive":true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": false,

            });
            });
</script>
@endcan
@endpush
