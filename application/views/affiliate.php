<?php
$this->load->view('includes/header');
?>
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="align-items-center d-flex align-items-center justify-content-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-6 m-funding align-items-center d-flex align-items-center justify-content-center flex-column">
                <h1>
                    Share, Get Paid, Repeat<br>
                    Earn Like a<span> Champion</span><br>
                </h1>  
                <p style="margin: 1rem 0 0 24px; font-size:16px; color:#000000; width:90%">Start earning up to 15% commission on every referral.</p>
                <div class="btns justify-content-start d-flex" style="width:80%">
                    <a href="#why-us" class="btn-book animated fadeInUp scrollto gradient-btn" style="font-size:20px; padding-top:12px">
                        <span>Become An Affiliate</span>
                    </a>
                    <!-- <a href="#why-us" class="btn-book animated text-secondary fadeInUp scrollto" style="border: 2px solid #00000080;">Free Trial</a> -->
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
            <img src="<?= base_url('assets/')?>img/affiliate.png" alt="" srcset="">
        </div>
        
      </div>
    </div>
  </section><!-- End Hero -->
  <style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
        height: 200px;
    }
    .header{
        font-weight:bold;
    }
</style>
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto 0 auto;padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Affiliates</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Highest affiliate commission</div>
                                <p class="mt-3" style="font-size:14px">Equinox Trading Capital is offering up to 15% commission for our affiliates which is the industry-highest. Simply register with us in a few minutes and start sharing your affiliate link to earn generously.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Easy & Fast Withdrawals</div>
                                <p class="mt-3" style="font-size:14px">Equinoc Trading Capital has built the fastest process for you to withdraw your commissions. Submit your withdrawal request from the dashboard and collect your commissions instantly.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Real-Time Tracking</div>
                                <p class="mt-3" style="font-size:14px">Track your clicks, registrations and conversions in real-time to stay up-to-date with your progress. You can also check your payment and withdrawal history easily in your dashboard.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section><!-- End Pricing -->
</main><!-- End #main -->
<?php
$this->load->view('includes/footer');
?>