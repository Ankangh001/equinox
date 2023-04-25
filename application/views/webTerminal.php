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
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>MT5 Web Terminal</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-6 mb-5">
                    <a href="client-login">
                        <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                            <div class="card-body text-center">
                                <div class="header pb-1">This is a sub heading</div>
                                <img class="my-3 mx-auto" src="<?= base_url('assets')?>/img/mt5-web.jpeg" alt="">
                                <p class="mt-3" style="font-size:14px">Par above button</p>
                                <button class="btn btn-primary">CLick Here</button>
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