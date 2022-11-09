
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/css/animate.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/owlcarousel/owl.carousel.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/dragula/dragula.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://dreamspos.dreamguystech.com/laravel/template/public/assets/css/style.css"> </head>
<body>
<body class="account-page">
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>
<div class="main-wrapper">

<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">
<div class="login-logo">
<img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/logo.png" alt="img">
</div>
<div class="login-userheading">
<h3>Satu langkah mudah setting Kaser</h3>
<h4>Continue where you left off</h4>
</div>

<Form method="POST" action="{{ route('onboardWizard') }}">
    @csrf
<div class="row">

    <div class="form-login col-lg-6">
        <label>Nama Bisnis</label>
        <div class="form-addons">
        <input type="text" id="nama_bisnis" name="nama_bisnis"  class="form-control" >
        <div class="text-danger pt-2">
        </div>
        </div>
    </div>
    <div class="form-login col-lg-6">
        <label>Telepon</label>
        <div class="form-addons">
        <input type="text" id="telepon" name="telepon"  class="form-control" >
        <div class="text-danger pt-2">
        </div>
        </div>
    </div>
    <div class="form-login col-lg-12">
        <label>Alamat</label>
        <div class="form-addons">
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
        <div class="text-danger pt-2">
        </div>
        </div>
    </div>
    <div class="form-login col-lg-12">
        <label>Kelurahan</label>
        <div class="form-addons">
            <select id="kelurahan" name="kelurahan" class="form-control" ></select>
            <div class="text-danger pt-2">
        </div>
        </div>
    </div>
    <div class="form-login col-lg-12">
        <label>Kode Pos</label>
        <div class="form-addons">
            <input name="kode_pos" id="kode_pos" class="form-control">
        <div class="text-danger pt-2">
        </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary">Finish</button>

</div>

    </Form>



<div class="signinform text-center">
<h4>Already a user? <a href="https://dreamspos.dreamguystech.com/laravel/template/public/signin" class="hover-a">Sign In</a></h4>
</div>
<div class="form-setlogin">
<h4>Or sign up with</h4>
</div>
<div class="form-sociallink">
<ul>
<li>
<a href="javascript:void(0);">
<img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/google.png" class="me-2" alt="google">
Sign Up using Google
</a>
</li>
<li>
<a href="javascript:void(0);">
<img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/facebook.png" class="me-2" alt="google">
Sign Up using Facebook
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="login-img">
<img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/login.jpg" alt="img">
</div>
</div>
</div>


<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/jquery/jquery.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/bootstrap.bundle.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/feather.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/jquery.slimscroll.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/datatables/datatables.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/select2/js/select2.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/moment.min.js"></script>
<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/apexchart/chart-data.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/fileupload/fileupload.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/js/script.js"></script> </body>
<script>
    $('#kelurahan').select2({
    placeholder: "Pilih Kelurahan...",
    minimumInputLength: 2,
    ajax: {
        url: "{{route('json.kelurahan')}}",
        dataType: 'json',
        data: function (params) {
            return {
                kelurahan: $.trim(params.term)
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
});
</script>

</html>
