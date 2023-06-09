
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr"data-theme="theme-default" data-assets-path="../assets/">
<head>
<meta charset="utf-8" />
<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
/>

<title>Equinox User Dashoard</title>

<meta name="description" content="" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="<?=base_url('assets/img/')?>equinoxLogoBlack.png" />


<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="<?=base_url('assets/user/')?>assets/vendor/fonts/boxicons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="<?=base_url('assets/user/')?>assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="<?=base_url('assets/user/')?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="<?=base_url('assets/user/')?>assets/vendor/css/pages/page-auth.css" />
<!-- Helpers -->
<script src="<?=base_url('assets/user/')?>assets/vendor/js/helpers.js"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                    <a href="<?=base_url()?>" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                        <img src="<?=base_url('assets/img/')?>equinoxLogoBlack.png" alt="EQ logo" srcset="<?=base_url('assets/img/')?>equinoxLogoBlack.png" width="200">
                        </span>
                    </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-3 text-center">Sign In to your account</h4>
                    <p class="mb-5 text-center">start the adventure</p>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                        <a href="<?=base_url('client-forget-password')?>">
                            <small>Forgot Password?</small>
                        </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="button" onclick="validateUser()">Sign in</button>
                    </div>
                    <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="<?= base_url('client-signup');?>">
                        <span>Create an account</span>
                    </a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="<?=base_url('assets/user/')?>assets/js/main.js"></script>
    <script src="<?= base_url('assets/user/assets/') ?>vendor/libs/jquery/jquery.js"></script>
    <script>
        function validateUser() {
            let email = $("#email").val();
            let password = $("#password").val();
            if (email == "") {
                $.notify("Please enter email");
                $("#email").focus();
                return;
            }
            if (password == "") {
                $.notify("Please enter password");
                $("#password").focus();
                return;
            }
            $.ajax({
                type: "post",
                url: "Auth/login",
                data: {
                    "email": email,
                    "password": password,
                    "type":"Client"
                },
                success: function(response) {
                    if (response.success == 1) {
                        window.location.href = response.data.redirect_url;	
                    } else {
                        $.notify(response.message);
                    }
                },
                error: function(exception) {
                    $.notify("Some error occured");
                }
            })

        }
    </script>
</body>
</html>
