@extends('layouts.master')
@section('title')
Managemen Pegawai
@endsection

@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Managemen Pegawai</h4>
    <h6>Managemen Pegawai</h6>
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

        <a  href="{{url('employee/create')}}"class="btn btn-primary ">Create New Employee</a>
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
                    <th>Full Name</th>
                    <th>NRIC</th>
                    <th>Email</th>
                    <th>Handphone</th>
                    <th>Have a Loan</th>
                    <th>Hak Akses</th>
                    <th>Work From</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->employee_name}}</td>
                    <td>{{$employee->nric}}</td>
                    <td>{{$employee->email}}</td>
                    <td>+60{{$employee->phone}}</td>
                    @if ($employee->haveALoan=== 1)
                    <td><center><span class="btn btn-rounded btn-primary">True</span></center></td>
                    @else
                    <td><center><span class="btn btn-rounded btn-secondary">False</span></center></td>

                    @endif

                    <td>{{implode(', ', $employee->getRoleNames()->toArray())}}</td>
                    <td>{{$employee->created_at->format("d F Y")}}</td>
                    <td>
                        <a class="me-3" href={{route('employee.detail',$employee)}}>
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                        </a>

                        <a class="me-3" href={{route('employee.edit',$employee)}}>
                            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
                        </a>
                        @can('user_delete')
                        <a class="me-3" onclick="deleteData('{{route('employee.remove',$employee)}}')">
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
			"sDom": 'fBtlpi',
            "autoWidth": false,
			"ordering": true,
			"language": {
				sLengthMenu: '_MENU_',
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
            console.log(response)
        location.reload();
        toastr.error('Data anda telah terhapus','PERHATIAN')
        });
        });
    }
</script>
@endpush
