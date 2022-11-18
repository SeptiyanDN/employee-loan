@extends('layouts.master')
@section('title')
Detail Employee
@endsection
@section('content')
 <!-- Modal -->

<div class="page-header">
    <div class="page-title">
    <h4>Data Employee</h4>
    <h6>Detail Data Employee</h6>
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
    <h4>Detail Personal Details.</h4>
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
                <form action={{route('users.create')}} method="POST">
                    @csrf
            <div class="row">
            {{-- <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Profile Image</label>
                    <input type="file" class="form-control">
                </div>
            </div> --}}
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="">Profile Image</label>
                    <!-- Button trigger modal -->
<div class="">
    <button type="button" onclick="profileImage()" class="btn btn-primary" data-toggle="modal" data-target="#showImageProfil">
        Show Profile Image
      </button>
</div>

                </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-firstname-input">Full name</label>
            <input type="text" class="form-control" id="name" name="name" readonly value="{{$data->employee_name}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-lastname-input">Email</label>
            <input type="email" class="form-control" id="email" name="email" readonly value="{{$data->email}}">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-phoneno-input">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" readonly value="+60{{$data->phone}}">
                </div>
                </div>
            </div>
            <div class="row">

            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-email-input">Number Employee</label>
                <input type="number" class="form-control" id="number_id_staff" readonly name="number_id_staff" value="{{$data->number_id_staff}}">
                </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-email-input">ID Card Company</label>
 <!-- Button trigger modal -->
 <div class="">
    <button type="button" onclick="cardCompany()" class="btn btn-primary" data-toggle="modal" data-target="#profileImage">
        Show ID Card Company
      </button>
</div>

</div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="progresspill-email-input">NRIC</label>
                <input type="number" class="form-control" id="nric" readonly name="nric" value="{{$data->nric}}">
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label for="progresspill-email-input">ID Card National</label>
<!-- Button trigger modal -->
<div class="">
    <button type="button" onclick="cardNational()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Show ID Card National
      </button>
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
            <input type="text" class="form-control" readonly id="address_line_1" name="address_line_1"value="{{$data->address_line_1}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-vatno-input" class="form-label">Address Line 2</label>
            <input type="text" class="form-control"readonly id="address_line_2" name="address_line_2"value="{{$data->address_line_2}}">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-cstno-input" class="form-label">Landmark</label>
            <input type="text" class="form-control" readonly id="landmark" name="landmark" value="{{$data->landmark}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-servicetax-input" class="form-label">City</label>
            <input type="text" class="form-control" readonly id="city" name="city" value="{{$data->city}}">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-companyuin-input" class="form-label">State</label>
            <input type="text" class="form-control" readonly id="state" name="state" value="{{$data->state}}">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label for="progresspill-declaration-input" class="form-label">Country</label>
            <input type="text" class="form-control" readonly id="country" name="country" value="{{$data->country}}">
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
           <input type="text" class="form-control" readonly value="{{$data->name_bank}}">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                 <label for="progresspill-expiration-input" class="form-label">Number of Bank</label>
                <input type="number" class="form-control" readonly id="number_bank" name="number_bank" value="{{$data->number_bank}}">
                </div>
                </div>
            </div>
            <ul class="pager wizard twitter-bs-wizard-pager-link">
            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
            <li class="float-end">
                <a href="{{route('users.management')}}" class="btn btn-secondary">Return Back</a>
            </li>
            </ul>



    </div>
    </div>
    </div>

      <!-- Modal -->
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
                    <img src={{$profileImage}}  alt="">
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
  <!-- Modal -->
  <div class="modal fade" id="cardCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show ID Card Company</h5>
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

 <!-- Modal -->
 <div class="modal fade" id="cardNational" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show ID Card National</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">
                <div class="mb-3">
                    <img src="{{$cardNational}}" alt="">
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
    function cardCompany(){
        $('#cardCompany').modal('show')
    }
    function cardNational(){
        $('#cardNational').modal('show')
    }
 </script>
@endpush
