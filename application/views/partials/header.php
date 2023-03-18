<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Addressme</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' integrity='sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/favicon.ico" sizes="32x32"/>
    <link rel='stylesheet' href='<?= base_url() ?>assets/style.css'>
   <style>
       .sub, .subsub {
            display:none;
        }
        ul.sub {
            position: fixed;
            background:#212529;
            z-index: 999;
            text-align: center;
            padding: 50px 3rem;
            width: 100%;
            height:150px;
            right: 0;
        }
        ul.sub li{
            list-style:none;
            color:#fff;
        }
        
        ul.sub li a {
            text-decoration: none;
            color: #fff !important;
            text-align: center;
            margin-right: 2.5rem;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 500;
        }
        ul.sub li a:hover{
            
            color:#ddd !important;
        }
   </style>
</head>
<script>
    $(document).ready(function () {
    $("ul.top li").hover(function () { //When trigger is hovered...
        $(this).children("ul.sub").slideDown('fast').show();
        $(this).children("ul.sub").css('display','flex');
    }, function () {
        $(this).children("ul.sub").slideUp('slow');
    });
});
</script>
<body>
    
 <?php
    if (isset($_SESSION['is_user_login']) && $_SESSION['is_user_login'] == true) {
        $fullname = $_SESSION['name'];
        $letter =  $fullname[0];
        echo " <a  class='float' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                    <i style=' font-size: 2.2rem; font-weight: 500; ' class='fas fa-comment my-float'></i><span class='badge badge-danger'></span>
                </a>
                <div class='top-bar'>
                    <nav class='navbar navbar-expand-lg navbar-dark bg-dark' style='padding: 0;'>
                        <div class='container-fluid'>
                            <a style='font-size: 1rem;' class='navbar-brand dropdown-toggle' href='#'>CONTACT US</a>
                            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                                <ul class='navbar-nav'>

                                    <li class='nav-item'>
                                        <a class='nav-link dropdown-toggle'><i style='margin-right: 0.5rem;' class='fas fa-user'></i>".$this->session->email."</a>
                                    </li>

                                </ul>

                            </div>
                            <i style='color:#fff;' class='fas fa-search'></i>
                        </div>
                    </nav>
                </div>
                <div class='global_header'>
                        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
                            <div style='padding: 0 0.8%;' class='container-fluid'>
                                <a class='navbar-brand logo-text ' href='home'>Addressme</a>
                                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                                    <span class='navbar-toggler-icon'></span>
                                </button>
                                <div class='collapse navbar-collapse my-nav-links ' id='navbarNavDropdown'>
                                    <ul class='navbar-nav'>
                                        <li class='nav-item'>
                                            <a class='nav-link my-nav-link' '><i style='margin-right: 0.5rem;' class='fab fa-btc'></i><span id='price'></span></a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link my-nav-link' style='display: flex;' ><span id='hour'></span><span style='margin-left: 0.5em;' id='sign'></span></a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='my-nav-link nav-link' ><i style='margin-right: 0.5rem;' class='fab fa-ethereum'></i><span id='price2'></span></a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link my-nav-link' style='display: flex;' ><span id='hour2'></span><span style='margin-left: 0.5em;' id='sign2'></span></a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='my-nav-link nav-link' href='dashboard'><i style='margin-right: 0.5rem;' class='fas fa-database'></i>Dashboard</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='my-nav-link nav-link' href='inbox'><i style='margin-right: 0.5rem;' class='fas fa-envelope'></i>Inbox</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='my-nav-link nav-link' href='settings'><i style='margin-right: 0.5rem;' class='fas fa-cog'></i>Setting</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='my-nav-link nav-link' href='security'><i style='margin-right: 0.5rem;' class='fas fa-lock'></i>Security</a>
                                        </li>
                                        <li class='nav-item dropdown'>
                                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <img class='ctr_flag' src=".base_url()."assets/images/country/flag-of-Afghanistan.png>
                                            </a>
                                            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                            <a class='dropdown-item' href='#'>Aland Islands</a>
                                            <a class='dropdown-item' href='#'>Afghanistan</a>
                                            <a class='dropdown-item' href='#'>Albania</a>
                                            <a class='dropdown-item' href='#'>Algeria</a>
                                            <a class='dropdown-item' href='#'>American Samoa</a>
                                            <a class='dropdown-item' href='#'>Andorra</a>
                                            <a class='dropdown-item' href='#'>Angola</a>
                                            <a class='dropdown-item' href='#'>Anguilla</a>
                                            <a class='dropdown-item' href='#'>Antarctica</a>
                                            <a class='dropdown-item' href='#'>Antigua and Barbuda</a>
                                            <a class='dropdown-item' href='#'>Argentina</a>
                                            <a class='dropdown-item' href='#'>Armenia</a>
                                            <a class='dropdown-item' href='#'>Aruba</a>
                                            <a class='dropdown-item' href='#'>Australia</a>
                                            <a class='dropdown-item' href='#'>Austria</a>
                                            <a class='dropdown-item' href='#'>Azerbaijan</a>
                                            <a class='dropdown-item' href='#'>Bahamas</a>
                                            <a class='dropdown-item' href='#'>Bahrain</a>
                                            </div>
                                        </li>
                                        
                                        <li class='nav-item dropdown'>
                                            <a class='my-nav-link nav-link ' href='settings' style='padding:0'>
                                               <!-- <p style=' background: #3268cc; text-align: center; width: 32px; padding-top: 2px; height: 28px; border-radius: 20%; '>$letter</p>-->
                                                <img style='border-radius: 20%;background: #d8d8d8;height:40px' width='35'src=".base_url(@$_SESSION['user_image']).">
                                            </a>
                                        </li>
                                        <li class='nav-item dropdown'>
                                            <a style='margin-right: 0 !important;' class='my-nav-link nav-link ' href='logout'>
                                                <i style='margin-right: 0.5rem;' class='fas fa-sign-out-alt'></i>Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                        ";
    } else {

        echo " <div  class='top-bar'>
                    <nav class='navbar navbar-expand-lg navbar-dark bg-dark' style='padding: 0;'>
                        <div style='padding: 0.5rem 10px;' class='container-fluid'>
                            <a style='font-size: 1rem;' class='navbar-brand ' href='#'></a>
                            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse' >
                                <ul class='navbar-nav'>

                                    <li class='nav-item'>
                                        <a class='nav-link '><i style='margin-right: 0.5rem;' class='fas fa'></i></a>
                                    </li>

                                </ul>

                            </div>
                            <i style='color:#fff;' class='fas fa-search'></i>
                        </div>
                    </nav>
                </div>

                <div class='global_header'>
                    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
                        <div style='padding: 0 0.8%;' class='container-fluid'>
                            <a class='navbar-brand logo-text ' href='home'>Addressme</a>
                            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse my-nav-links ' id='navbarNavDropdown'>
                                <ul class='navbar-nav top'>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' target='blank' href='https://exchange.blockchain.com' id='navbarDropdownMenuLink' >
                                        Exchange
                                        </a>
                                        <ul class='sub'>
                                            <li><a href='https://exchange.blockchain.com' target='blank'>Easy platform for trading </a></li>
                                            <li><a href='https://exchange.blockchain.com' target='blank'>Beginners guide </a></li>
                                            <li><a href='https://exchange.blockchain.com' target='blank'>Expert trading experience</a></li>
                                            <li><a href='https://exchange.blockchain.com' target='blank'>Trading Your Own Assets</a> </li>
                                            
                                        </ul>
                                       
                                    </li>

                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='associate' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        Associates
                                        </a>
                                        <ul class='sub'>
                                            <li><a href='associate'>Become a reputable Associate </a> </li>
                                            <li><a href='associate'>Search for other Associates across the globe </a> </li>
                                            <li><a href='associate'>Start a transaction with an Associate </a></li>
                                            <li><a href='associate'>Give your business Associates the confidence and trust they deserve.</a> </li>
                                           
                                        </ul>
                                        
                                        
                                    </li>

                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        Transactions
                                        </a>
                                        <ul class='sub'>
                                            <li><a href='login'>Create your own transactions </a> </li>
                                            <li><a href='login'>Share transactions with an associate </a> </li>
                                            <li><a href='login'>Add wallet address securely </a></li>
                                            <li><a href='login'>Share wallet address transaction </a> </li>
                                            
                                        </ul>
                                        
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        Support
                                        </a>
                                        <ul class='sub'>
                                            <li><a href=''>What is Addressme? (learn how Addressme works)</a> </li>
                                            <li><a href=''>Fees (no fee charge)  </a> </li>
                                            <li><a href=''>Send ticket</a></li>
                                            <li><a href=''>About us </a> </li>
                                            <li><a href=''>Contact us</a> </li>
                                            
                                        </ul>
                                        
                                    </li>
                                
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <img class='ctr_flag' src=".base_url()."/assets/images/country/flag-of-Afghanistan.png>
                                        </a>
                                        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                        <a class='dropdown-item' href='#'>Aland Islands</a>
                                        <a class='dropdown-item' href='#'>Afghanistan</a>
                                        <a class='dropdown-item' href='#'>Albania</a>
                                        <a class='dropdown-item' href='#'>Algeria</a>
                                        <a class='dropdown-item' href='#'>American Samoa</a>
                                        <a class='dropdown-item' href='#'>Andorra</a>
                                        <a class='dropdown-item' href='#'>Angola</a>
                                        <a class='dropdown-item' href='#'>Anguilla</a>
                                        <a class='dropdown-item' href='#'>Antarctica</a>
                                        <a class='dropdown-item' href='#'>Antigua and Barbuda</a>
                                        <a class='dropdown-item' href='#'>Argentina</a>
                                        <a class='dropdown-item' href='#'>Armenia</a>
                                        <a class='dropdown-item' href='#'>Aruba</a>
                                        <a class='dropdown-item' href='#'>Australia</a>
                                        <a class='dropdown-item' href='#'>Austria</a>
                                        <a class='dropdown-item' href='#'>Azerbaijan</a>
                                        <a class='dropdown-item' href='#'>Bahamas</a>
                                        <a class='dropdown-item' href='#'>Bahrain</a>
                                        </div>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='my-nav-link nav-link' href='signup'><i style='margin-right: 0.5rem;' class='fas '></i>Sign Up</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='my-nav-link nav-link' href='login'><i style='margin-right: 0.5rem;' class='fas '></i>Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                    ";
    }
    ?>
 