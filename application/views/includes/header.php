<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Cache-control" content="no-cache">
  
  <title>Equinox</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/') ?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <!-- <link href="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>

  .swiper {
    width: 80%;
    height: 500px;
  }

  .swiper-slide {
    border-radius:20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    font-size: 22px;
    font-weight: bold;
    color: #fff;
  } 

  .swiper-scrollbar{
    display: none;
  }

  .swiper-slide:nth-child(1n) {
    background-color: rgb(206, 17, 17);
  }

  .swiper-slide:nth-child(2n) {
    background-color: rgb(0, 140, 255);
  }

  .swiper-slide:nth-child(3n) {
    background-color: rgb(10, 184, 111);
  }

  .swiper-slide:nth-child(4n) {
    background-color: rgb(211, 122, 7);
  }

  .swiper-slide:nth-child(5n) {
    background-color: rgb(118, 163, 12);
  }

  .swiper-slide:nth-child(6n) {
    background-color: rgb(180, 10, 47);
  }

  .swiper-slide:nth-child(7n) {
    background-color: rgb(35, 99, 19);
  }

  .swiper-slide:nth-child(8n) {
    background-color: rgb(0, 68, 255);
  }

  .swiper-slide:nth-child(9n) {
    background-color: rgb(218, 12, 218);
  }

  .swiper-slide:nth-child(10n) {
    background-color: rgb(54, 94, 77);
  }
</style>


  <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.6.2/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
    <div style="max-width: 83% !important;" class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0">
        <a  href="<?= base_url() ?>">
          <img id="eqLogoblack" src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" />
          <img id="eqLogoWhite" class="hiddden" src="<?= base_url('assets/') ?>img/equinoxLogo.png" />
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="<?= base_url('assets/') ?>img/logo.png" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar hidden order-last order-lg-0">
        <ul>
		 	<li class="dropdown"><a href="#"><span>How it Works</span> <i class="bi bi-chevron-down"></i></a>
				<ul>
				<li><a href="#why-us">Evaluation Process</a></li>
				<li><a href="#table-pricing">Pricing</a></li>
				<li><a href="#">Scaling Plan</a></li>
				</ul>
			</li>
			<li class="dropdown"><a href="#"><span>Help</span> <i class="bi bi-chevron-down"></i></a>
				<ul>
					<li><a href="faq">FaQ</a></li>
					<li><a href="rules">Rules</a></li>
				</ul>
			</li>
			<li><a class="nav-link scrollto" href="testimonial">Testimonials</a></li>
			<li class="dropdown"><a href="#"><span>Trading</span> <i class="bi bi-chevron-down"></i></a>
				<ul>
					<li><a href="notice">Announcements</a></li>
					<li><a href="symbol">Symbol</a></li>
					<li><a href="calender">News Calender</a></li>
				</ul>
			</li>
			<li><a class="nav-link scrollto" href="affiliate">Affiliate</a></li>
			<li><a class="nav-link scrollto" href="payouts">Payouts</a></li>
			<li class="dropdown"><a href="#"><span>Contact</span> <i class="bi bi-chevron-down"></i></a>
				<ul>
					<li><a href="contact">Contact</a></li>
					<li><a href="about">About Us</a></li>
				</ul>
			</li>
			<li class="dropdown"><a href="#"><span>En</span> <i class="bi bi-chevron-down"></i></a>
				<ul>
					<li><a href="contact">English</a></li>
					<li><a href="about">Hindi</a></li>
				</ul>
			</li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <!-- <a href="client-login" class="book-a-table-btn scrollto d-none d-lg-flex">Client Area</a> -->

    </div>
  </header><!-- End Header -->