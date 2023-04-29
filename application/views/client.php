<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Equinox</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/') ?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
    <style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    body{
        overflow: hidden;
        background: linear-gradient(86deg, #FF5758, #CF559E);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
    form{
        color:#000000;
        width:500px;
        margin:5rem auto;
        padding: 2rem;
        background: #fff;
        border-radius:20px;
        box-shadow: 3px 3px 36px #00000090
    }
    button{
        background: linear-gradient(86deg, #FF5758, #CF559E);
        border:none !important;
        color:#fff  !important;
        transition: 0.3s ease-in-out
    }

    button:hover{
        background:transparent !important;
        border: 1px solid #FF5758 !important;
        color:#FF5758 !important;
        margin-top:-3px;
    }
    .form-check-label{
        font-size:16px;
        display:inline-block;
        width: 100%;
    }
    .text-body{
        font-size:14px
    }
    </style>
</head>

<body>
<form class="">
                <div class="d-flex flex-column align-items-center justify-content-center justify-content-lg-start">
                    <a href="index"><img width="50%" src="<?=base_url('assets/'); ?>img/equinoxLogoBlack.png" rel="icon"></a><br>
                    <p class="lead fw-normal mb-0 me-3">Sign In with Equinox</p><br>
                </div>

                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Enter your details below</p>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control"
                    placeholder="Enter a valid email address" />
                    <!-- <label class="form-label" for="form3Example3">Email address</label> -->
                </div>
                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" class="form-control"
                    placeholder="Enter password" />
                    <!-- <label class="form-label" for="form3Example4">Password</label> -->
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                            agree with term & conditions
                        </label>
                    </div>
                    <a href="#!" class="text-body">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column align-items-center justify-content-between">
                    <button type="button" class="btn w-100 "
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="client-signup"
                        class="link-danger">Register</a></p>
                </div>
            </form>
</body>
</html>