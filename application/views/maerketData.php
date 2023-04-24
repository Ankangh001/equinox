<?php
$this->load->view('includes/header');
?>
<style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
    }
</style>
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Market Data Analysis</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">Market Sentiments - DK</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">COT Data - DK</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">Historical Sentiments - DK</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">Technical Indicator - DK</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">Pivot Points - DK</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-1">
                    <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                        <div class="card-body">
                            <div class="header text-center pb-1">Forex Heat Map - TV</div>
                            <p class="mt-3" style="font-size:14px">An easy to use compact calculator for converting currencies and gold.</p>
                            <img class="my-3" src="<?= base_url('assets')?>/img/indicators.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Pricing -->
</main><!-- End #main -->
<?php
$this->load->view('includes/footer');
?>