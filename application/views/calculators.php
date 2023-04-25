<?php
$this->load->view('includes/header');
?>
<style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
        height: 520px;
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
                <div class="col-lg-6 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Position Size Calculator</div>
                                <p class="mt-3" style="font-size:14px">Calculate position size in units of a base currency based on amount at risk and stop loss.</p>
                                <img class="my-3 mx-auto" src="<?= base_url('assets')?>/img/position-size.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Pip Calculator</div>
                                <p class="mt-3" style="font-size:14px">The calculator shows how an instrument’s price change in pips affects the trading account depending on the position size.</p>
                                <img class="my-3 mx-auto" src="<?= base_url('assets')?>/img/pip-cal.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Profit Calculator</div>
                                <p class="mt-3" style="font-size:14px">The widget shows commission and profit/loss data on trades simulated based on specified position and account details.</p>
                                <img class="my-3 mx-auto" src="<?= base_url('assets')?>/img/profit-cal.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-6 mb-1">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Margin Calculator</div>
                                <p class="mt-3" style="font-size:14px">The widget helps calculate margin requirements for trading various financial instruments on Swiss FX marketplace.</p>
                                <img class="my-3 mx-auto " src="<?= base_url('assets')?>/img/margin-cal.png" alt="">
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