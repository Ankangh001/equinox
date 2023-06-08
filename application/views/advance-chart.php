<?php
$this->load->view('includes/header');
?>
<style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
        height: 100%;
    }
    .header{
        font-size:14px;
    }
</style>
<main id="main">
    <section style="margin: 6rem auto 0 auto;padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Advanced Chart</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body text-center">
                                <div class="header p-3">ETC's Advanced Chart is a free and powerful charting solution from Tradingview. You can personalize the chart by modifying the default symbol, watchlist, adding tools for technical analysis and a lot more. You can even use news, hotlists, or an economic calendar to use it as an entire analytics platform.</div>
                                <img class="my-3 mx-auto" src="<?= base_url('assets')?>/img/advance-chart.jpeg" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$this->load->view('includes/footer');
?>