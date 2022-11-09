{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 d-flex">
            <div class="card flex-fill bg-white">
            <h5 class="card-title alert alert-primary mb-0">Verifikasi Email Anda</h5>
            <div class="card-body">
                @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Kode verifikasi email sudah dikirim ke email anda.') }}
                        </div>
                    @endif
            <p class="card-text">Untuk Melihat Fitur Lengkap Kaser, Anda Wajib Verifikasi Email Anda Sekarang!</p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Kirim Ulang Verifikasi</button>.
            </form>
            </div>
            </div>
            </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function(){
        ('.datatable').DataTable()
    })
</script>
@endpush
