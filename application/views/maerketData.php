<?php
$this->load->view('includes/header');
?>
<style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
        height: 400px;
    }
    .header{
        font-weight:bold;
    }
</style>
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto 0 auto;padding-bottom: 0; 0 auto;padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Market Analysis</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Market Sentiments</div>
                                <p class="mt-3" style="font-size:14px">The sentiment widget shows current difference in long and short positions for various FX instruments, currencies, and CFDs.</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/SENTIMENT.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">COT Data</div>
                                <p class="mt-3" style="font-size:14px">The CoT Charts show non-commercial traders’ buy and sell positions in the currency futures market based on the CFTC CoT repor ...</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/COT.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Historical Sentiments</div>
                                <p class="mt-3" style="font-size:14px">A table showing the day’s highest and lowest price levels for various Forex instruments and commodity, stock, and index CFDs.</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/hist-sentiment.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Technical Indicators</div>
                                <p class="mt-3" style="font-size:14px">An overview of trading signals for Forex instruments, CFDs, and bitcoin based on the most popular technical indicators.</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Pivot Points</div>
                                <p class="mt-3" style="font-size:14px">A technical analysis tool with support and resistance levels based on classic, Woodie, Fibonacci, and Camarilla pivot points.</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/pivot-point.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body">
                                <div class="header text-center pb-1">Forex Heat Map</div>
                                <p class="mt-3" style="font-size:14px">This lets you spot strong and weak currencies and see how they compare to each other, all in real-time</p>
                                <img class="my-3" src="<?= base_url('assets')?>/img/fx-heatmap.PNG" alt="">
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