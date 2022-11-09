<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link href={{ asset("assets/css/plugins/dataTables/datatables.min.css")}} rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}}>
<link rel="stylesheet" href={{asset("assets/plugins/fontawesome/css/fontawesome.min.css")}}>
<link rel="stylesheet" href={{asset("assets/plugins/fontawesome/css/all.min.css")}}>
<link rel="stylesheet" href={{asset("assets/css/animate.css")}}>
<link rel="stylesheet" href={{asset("assets/css/bootstrap-datetimepicker.min.css")}}>
<link rel="stylesheet" href={{asset("assets/plugins/owlcarousel/owl.carousel.min.css")}}>
<link rel="stylesheet" href={{asset("assets/plugins/select2/css/select2.min.css")}}>
<link rel="stylesheet" href={{asset("assets/plugins/dragula/dragula.min.css")}}>
<link rel="stylesheet" href={{asset("assets/css/dataTables.bootstrap4.min.css")}}>
<link href={{asset("assets/css/plugins/toastr/toastr.min.css")}} rel="stylesheet">
<link href={{asset('assets/css/plugins/sweetalert/sweetalert.css')}} rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

<link rel="stylesheet" href={{asset("assets/css/style.css")}}>
<link rel="stylesheet" href="/assets/css/styles.css">

@stack('css')

</head>

<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

{{-- Navbar --}}
<x-layouts.navbar></x-layouts.navbar>
{{-- End Navbar --}}

{{-- sidebar --}}
<x-layouts.sidebar></x-layouts.sidebar>
{{-- End Sidebar --}}
<div class="page-wrapper">
<div class="content">
{{-- Content --}}
@yield('content')
{{-- End Content --}}
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

   <!-- Mainly scripts -->
<script src={{asset("assets/plugins/jquery/jquery.min.js")}}></script>
<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/feather.min.js")}}></script>
<script src={{asset("assets/js/jquery.slimscroll.min.js")}}></script>
<script src={{asset("assets/js/plugins/dataTables/datatables.min.js")}}></script>
<script src={{asset("assets/plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("assets/plugins/datatables/datatables.min.js")}}></script>
<script src={{asset("assets/js/validator.min.js")}}></script>
<script src={{asset("assets/plugins/select2/js/select2.min.js")}}></script>
<script src={{asset("assets/js/moment.min.js")}}></script>
<script src={{asset("assets/js/bootstrap-datetimepicker.min.js")}}></script>
<script src={{asset("assets/plugins/apexchart/apexcharts.min.js")}}></script>
<script src={{asset("assets/plugins/apexchart/chart-data.js")}}></script>
<script src={{asset("assets/plugins/owlcarousel/owl.carousel.min.js")}}></script>
<script src={{asset("assets/plugins/fileupload/fileupload.min.js")}}></script>
<script src={{asset("assets/plugins/sweetalert/sweetalert2.all.min.js")}}></script>
<script src={{asset("assets/plugins/sweetalert/sweetalerts.min.js")}}></script>
<script src={{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}></script>

<script src={{asset("assets/js/plugins/toastr/toastr.min.js")}}></script>

<script src={{asset("assets/js/script.js")}}></script>


@stack('scripts')

</body>

</html>
