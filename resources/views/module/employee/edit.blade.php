@extends('layouts.master')
@section('title')
Detail Employee
@endsection
@section('content')
 <!-- Modal -->

<div class="page-header">
    <div class="page-title">
    <h4>Data Employee</h4>
    <h6>Detail & Update Data Employee</h6>
    </div>
    </div>
    <div class="card">
    <div class="card-body">
    <div class="profile-set">
    <div class="profile-head">
    </div>
    <div class="profile-top">
    <div class="profile-content">
    <div class="profile-contentimg">
    <img src="{{$profileImage}}" alt="img" id="blah">

    </div>
    <div class="profile-contentname">
    <h2>{{$data->employee_name}}</h2>
    <h4>Detail & Updates Personal Details.</h4>
    </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
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
                <form action={{route('employee.edit',$employee)}} method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-firstname-input">Full name</label>
            <input type="text" class="form-control" id="name" name="name"   value="{{$data->employee_name}}">
            </div>
            <div class="mb-3">
            <label for="progresspill-lastname-input">Email</label>
            <input type="email" class="form-control" id="email" name="email"   value="{{$data->email}}">
            </div>
                <div class="mb-3">
                <label for="progresspill-phoneno-input">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"   value="{{$data->phone}}">
                </div>
                    <div class="mb-3">
                    <label for="progresspill-email-input">Number Employee</label>
                    <input type="number" class="form-control" id="number_id_staff"   name="number_id_staff" value="{{$data->number_id_staff}}">
                </div>
                    <div class="mb-3">
                    <label for="progresspill-email-input">NRIC</label>
                    <input type="number" class="form-control" id="nric"   name="nric" value="{{$data->nric}}">
                    </div>
            </div>
            <div class="col-lg-6">
               <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="">Upload Profile Image</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for=""></label>
                        <div class="mb-3">
                            <button type="button" onclick="profileImage()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Show Image
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="">Upload Employee Card</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="card_company" name="card_company">
                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for=""></label>
                        <div class="mb-3">
                            <button type="button" onclick="employeeCard()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Show Image
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="">Upload National Identity Card</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="card_national" id="card_national">
                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for=""></label>
                        <div class="mb-3">
                            <button type="button" onclick="nationalCard()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Show Image
                            </button>
                        </div>
                    </div>
                </div>
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
            <input type="text" class="form-control"   id="address_line_1" name="address_line_1"value="{{$data->address_line_1}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-vatno-input" class="form-label">Address Line 2</label>
            <input type="text" class="form-control"  id="address_line_2" name="address_line_2"value="{{$data->address_line_2}}">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-cstno-input" class="form-label">Landmark</label>
            <input type="text" class="form-control"   id="landmark" name="landmark" value="{{$data->landmark}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-servicetax-input" class="form-label">City</label>
            <input type="text" class="form-control"   id="city" name="city" value="{{$data->city}}">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-companyuin-input" class="form-label">State</label>
            <input type="text" class="form-control"   id="state" name="state" value="{{$data->state}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-declaration-input" class="form-label">Country</label>
            <input type="text" class="form-control"   id="country" name="country" value="{{$data->country}}">
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
            <select class="form-control" name="name_bank" id="name_bank">
                <option value="{{$data->name_bank}}">{{$data->name_bank}}</option>
                <option value="Bank Mandiri">Bank Mandiri</option>
                <option value="Bank BCA">Bank BCA</option>
                <option value="Bank Indonesia">Bank Indonesia</option>
            </select>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                 <label for="progresspill-expiration-input" class="form-label">Number of Bank</label>
                <input type="number" class="form-control"   id="number_bank" name="number_bank" value="{{$data->number_bank}}">
                </div>
                </div>
            </div>
            <ul class="pager wizard twitter-bs-wizard-pager-link">
            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
            <li class="float-end">
                <button type="submit"  class="btn btn-secondary">Update Data</button>
            </li>
            </ul>



    </div>
    </div>
    </div>


<!-- Modal show profile image  -->
<div class="modal fade" id="profileImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show Profile Image</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">
                <div class="mb-3">
                    <img src="{{$profileImage}}"  alt="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end Modal --}}

  <!-- Modal show employee card image  -->
<div class="modal fade" id="employeeCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show Employe Card Image</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">
                <div class="mb-3">
                    <img src="{{$cardCompany}}"  alt="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end Modal --}}
  <!-- Modal show profile image  -->
<div class="modal fade" id="nationalCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show National Card Image</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">
                <div class="mb-3">
                    <img src="{{$cardNational}}"  alt="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end Modal --}}
@endsection

@push('scripts')
 <script>
    function profileImage() {
        $('#profileImage').modal('show')
}
    function employeeCard() {
        $('#employeeCard').modal('show')
    }

    function nationalCard(){
        $('#nationalCard').modal('show')
    }
 </script>
@endpush
