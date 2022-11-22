@extends('layouts.master')
@section('title')
    Detail Application Loan
@endsection

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Detail Application Loan</h4>
            <h6>Detail Application Loan</h6>
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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <div class="page-title">
                    <div class="mb-3">
                        <h4>Detail Application Loan</h4>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>ID Application</th>
                            <td>{{ $loan->number_application }}</td>
                        </tr>
                        <tr>
                            <th>Employee Name</th>
                            <td>{{ $loan->employee->name }}</td>
                        </tr>
                        <tr>
                            <th>Loan Ammount</th>
                            <td>{{ $loan->loan_ammount }}</td>
                        </tr>
                        <tr>
                            <th>Status Loan</th>
                            <td>{{ $loan->status->name }}</td>
                        </tr>
                        <tr>
                            <th>Mounthly Installment</th>
                            <td>{{ $loan->mountly_installment }}</td>
                        </tr>

                        @if ($loan->status_id === 1)
                            <tr>
                                <th>Analyst</th>
                                <td> - </td>
                            </tr>
                            <tr>
                                <th>CEO</th>
                                <td> - </td>
                            </tr>
                            <tr>
                                <th>Finance</th>
                                <td> - </td>
                            </tr>
                        @elseif ($loan->status_id === 2)
                            <tr>
                                <th>Analyst</th>
                                <td>Approved By Analist</td>
                            </tr>
                            <tr>
                                <th>CEO</th>
                                <td> - </td>
                            </tr>
                            <tr>
                                <th>Finance</th>
                                <td> - </td>
                            </tr>
                        @elseif($loan->status_id === 4)
                            <tr>
                                <th>Analyst</th>
                                <td>Approved By Analist</td>

                            </tr>
                            <tr>
                                <th>CEO</th>
                                <td>Approved By CEO</td>
                            </tr>
                            <tr>
                                <th>Finance</th>
                                <td><span class="btn btn-rounded btn-primary">Sending Processing</span></td>
                            </tr>
                        @elseif($loan->status_id === 6 || $loan->status_id === 7 || $loan->status_id === 8)
                            <tr>
                                <th>Analyst</th>
                                <td>Approved By Analist</td>

                            </tr>
                            <tr>
                                <th>CEO</th>
                                <td>Approved By CEO</td>
                            </tr>
                            <tr>
                                <th>Finance</th>
                                <td><span class="btn btn-rounded btn-primary">Transfered</span></td>
                            </tr>
                            <tr>
                                <th>Due Date</th>
                                <td><span class="btn btn-rounded btn-secondary">{{ $loan->due_date }}</span></td>
                            </tr>
                        @endif
                        <tr>
                            <th>Description Loan</th>
                            <td>
                                <textarea class="form-control" readonly cols="30" rows="5">{{ $loan->description }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if ($loan->status_id === 6 || $loan->status_id === 7 || $loan->status_id === 8)
                    <div class="mb-3 mt-5">
                        <div class="page-title">
                            <h4>Status Payment</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped logs">
                            <thead>
                                <tr>
                                    <th>ID Application Loans</th>
                                    <th>Detail Overdue</th>
                                    <th>Detail Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $loan->number_application }}</td>
                                    <td>
                                        <ul>
                                            <li>Due Date : {{ $loan->due_date }}</li>
                                            <li>Status : {{ $loan->status_due_date }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Mountly Installment : {{ $loan->mountly_installment }}</li>
                                            <li>Remaining Payment : {{ $loan->remaining_payment }}</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                    <a href="{{ route('loanpayment.index') }}" class="btn btn-success">Payment Loan Now</a>

                @endif
                <div class="mb-3 mt-5">
                    <div class="page-title">
                        <h4>History Application Loans</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped logs">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Changes</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->name }}</td>
                                    <td>
                                        <ul>
                                            <li>Logs : {{ $log->description }}</li>
                                            <li>Comments : {{ $log->comments->comments }}</li>
                                        </ul>
                                    </td>
                                    <th>{{ $log->created_at }}</th>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="col-mb-12">
                        <div class="mb-3 mt-3">
                            @if ($loan->status_id == 1)
                                @can('analyst_approve')
                                    <a href="{{ route('loans.approveAnalyst', $loan->id) }}" class="btn btn-primary">Analyst
                                        Approval</a>
                                    <a href="{{ route('loans.approveAnalyst', $loan->id) }}" class="btn btn-secondary">Analyst
                                        Reject</a>
                                @endcan
                            @elseif($loan->status_id == 2)
                                @can('ceo_approve')
                                    <a href="{{ route('loans.approveCeo', $loan->id) }}" class="btn btn-success">CEO
                                        Approval</a>
                                    <a href="{{ route('loans.approveAnalyst', $loan->id) }}" class="btn btn-secondary">CEO
                                        Reject</a>
                                @endcan
                            @elseif($loan->status_id == 4)
                                @can('sending_money')
                                    <a href="{{ route('loans.sendingMoney', $loan->id) }}" class="btn btn-success">Send
                                        Money</a>
                                @endcan
                            @endif
        
        
        
        
        
        
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@push('scripts')
    <script>
        let table
        $(function() {
            table = $('.logs').DataTable({
                "bFilter": true,
                "responsive": true,
                "proccessing": true,
                "sDom": 'fBtlpi',
                "autoWidth": false,

            });
        });
    </script>
@endpush
