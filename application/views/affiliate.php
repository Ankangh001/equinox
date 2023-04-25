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
        height: 300px;
    }
    .header{
        font-weight:bold;
    }
</style>
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Calculators</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Position Size Calculator</div>
                                <p class="mt-3" style="font-size:14px">Calculate position size in units of a base currency based on amount at risk and stop loss.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Pip Calculator</div>
                                <p class="mt-3" style="font-size:14px">The calculator shows how an instrument’s price change in pips affects the trading account depending on the position size.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Profit Calculator</div>
                                <p class="mt-3" style="font-size:14px">The widget shows commission and profit/loss data on trades simulated based on specified position and account details.</p>
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