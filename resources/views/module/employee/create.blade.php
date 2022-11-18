@extends('layouts.master')
@section('title')
Employe
@endsection
@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>New Employee</h4>
    <h6>Create New Employee</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
    <div class="card">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <h4 class="card-title mb-0">Create New Employee</h4>
            </div>
            <div class="card-body">
            <div id="progrss-wizard" class="twitter-bs-wizard">
            <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
            <li class="nav-item">
            <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="User Details">
            <i class="far fa-user"></i>
             </div>
            </a>
            </li>
            <li class="nav-item">
            <a href="#progress-company-document" class="nav-link" data-toggle="tab">
            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Address Detail">
            <i class="fas fa-map-pin"></i>
            </div>
            </a>
            </li>
            <li class="nav-item">
            <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Details">
            <i class="fas fa-credit-card"></i>
            </div>
            </a>
            </li>
            </ul>

            <div id="bar" class="progress mt-4">
            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
            </div>
            <div class="tab-content twitter-bs-wizard-tab-content">
            <div class="tab-pane" id="progress-seller-details">
            <div class="mb-4">
            <h5>Employee Details</h5>
            </div>
                <form action={{route('users.create')}} method="POST" enctype="multipart/form-data" >
                    @csrf
            <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Profile Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-firstname-input">Full name</label>
            <input type="text" class="form-control" id="name" name="name">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-lastname-input">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-phoneno-input">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
                </div>
                </div>
            </div>
            <div class="row">

            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-email-input">Number Employee</label>
                <input type="number" class="form-control" id="number_id_staff" name="number_id_staff">
                </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-email-input">ID Card Company</label>
            <input type="file" class="form-control" id="card_company" name="card_company">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-email-input">NRIC</label>
                <input type="number" class="form-control" id="nric" name="nric">
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label for="progresspill-email-input">ID Card National</label>
                    <input type="file" class="form-control" id="card_national" name="card_national">
                    </div>
                    </div>
            </div>
            <ul class="pager wizard twitter-bs-wizard-pager-link">
            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
            </ul>
            </div>
            <div class="tab-pane" id="progress-company-document">
            <div>
            <div class="mb-4">
            <h5>Address Details</h5>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-pancard-input" class="form-label">Address Line 1</label>
            <input type="text" class="form-control" id="address_line_1" name="address_line_1">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-vatno-input" class="form-label">Address Line 2</label>
            <input type="text" class="form-control" id="address_line_2" name="address_line_2">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-cstno-input" class="form-label">Landmark</label>
            <input type="text" class="form-control" id="landmark" name="landmark">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-servicetax-input" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-companyuin-input" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-declaration-input" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country">
            </div>
            </div>
            </div>
            <ul class="pager wizard twitter-bs-wizard-pager-link">
            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
            </ul>
            </div>
            </div>
            <div class="tab-pane" id="progress-bank-detail">
            <div>
            <div class="mb-4">
            <h5>Bank Details</h5>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label">Bank Name</label>
            <select class="form-select" name="bank_name" id="bank_name">
            <option selected>Select Card Type</option>
            <option value="MYR">Malaysia Bank</option>
            <option value="AE">Bank BRI</option>
            <option value="VI">Bank BNI</option>
            <option value="MC">Malaysia Bank</option>
            <option value="DI">Discover</option>
            </select>
            </div>
            </div>
            </div>

            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
             <label for="progresspill-expiration-input" class="form-label">Number of Bank</label>
            <input type="number" class="form-control" id="number_bank" name="number_bank">
            </div>
            </div>
            </div>
            <ul class="pager wizard twitter-bs-wizard-pager-link">
            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
            <li class="float-end">
                <button type="submit" class="btn btn-submit">Submit</button>
            </li>
            </ul>
        </form>
            </div>
            </div>
            </div>
            </div>
            </div>

    </div>
    </div>

    </div>

@endsection
