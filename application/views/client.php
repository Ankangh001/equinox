<?php
$this->load->view('includes/header');
?>
    <style>
        #header{
            display:none !important;
        }
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
        background: linear-gradient(91deg, #ff5757, #8c52ff);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
    form{
        color:#000000;
        width:500px;
        margin:8rem auto;
        padding: 2rem;
        background: #fff;
        border-radius:20px;
        box-shadow: 3px 3px 36px #00000090
    }
    button{
        background: #0d6efd;
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
                    <a href="/" class="text-center w-100"><img class ="m-auto" width="40%" src="<?=base_url('assets/'); ?>img/equinoxLogoBlack.png" rel="icon"></a><br>
                    <!-- <p class="lead fw-normal mb-0 me-3">Sign in to your account</p><br> -->
                </div>

                <div class="divider d-flex align-items-center mb-3">
                    <p class="text-center fw-bold mb-0">Sign in to your account</p>
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
                           Remember me
                        </label>
                    </div>
                    <a href="#!" class="text-body" style="color:#0d6efd !important">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column align-items-center justify-content-between">
                    <button type="button" class="btn w-100  btn-primary"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign In</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="client-signup"
                        class="link-danger">Register</a></p>
                </div>
            </form>
</body>
</html>