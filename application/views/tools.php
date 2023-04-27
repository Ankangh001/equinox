<?php
$this->load->view('includes/header');
?>
<style>
    .card{
        box-shadow: 2px 2px 8px #00000050;
        height: 400px;
    }
</style>
<main id="main">
	<section id="about" class="payout why-trade" style="background:#fff">
		<div class="container mt-5" data-aos="fade-up">
			<div class="row align-items-center">
			<div class="col-lg-6 order-2 order-lg-1 aos-init aos-animate d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
				<div class="about-img  m-auto">
				<img class="why-trade-img" src="<?= base_url('assets/img/')?>etc-trade-journal.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 pt-4 mt-0 pt-lg-0 order-1 order-lg-2 content why-trade-content">
				<h3>ETC Trade Journal</h3>
				<div class="av_textblock_section ">
					<div class="avia_textblock  " itemprop="text">
						<p>
						Here you can record and review you daily trades for better output and for future reference. This can help you to keep track of your success as well as study mistakes made when entering or exiting a trade.

						</p>
					</div>
				</div>
			</div>
			</div>
		</div>
    </section>

    <section id="about" class="payout why-trade" style="background:#fff">
		<div class="container mt-5" data-aos="fade-up">
			<div class="row">
			<div class="col-lg-6 order-2 order-lg-2 aos-init aos-animate d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
				<div class="about-img  m-auto">
				<img class="why-trade-img" src="<?= base_url('assets/img/')?>etc_trade_manager.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-1 content why-trade-content">
				<h3>ETC Trade Manager</h3>
				<div class="av_textblock_section ">
					<div class="avia_textblock  " itemprop="text">
						<p>
						Execute your trades with precision. You can also calculate your lot size, close partial trades, or efficiently move your stop-loss to breakeven.

						</p>
					</div>
				</div>
			</div>
			</div>
		</div>
    </section>

    <section id="about" class="payout why-trade" style="background:#fff">
		<div class="container mt-5" data-aos="fade-up">
			<div class="row">
			<div class="col-lg-6 order-2 order-lg-1 aos-init aos-animate d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
				<div class="about-img  m-auto">
				<img class="why-trade-img" src="<?= base_url('assets/img/') ?>etc_risk_manager.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content why-trade-content">
				<h3>ETC Risk Manager</h3>
				<div class="av_textblock_section ">
					<div class="avia_textblock  " itemprop="text">
						<p>
						It's a very convenient tool allowing you to manage your risk with ease. It also helps you to follow your trading rules at all times. With this tool, you are getting better risk management and improving your overall trading performance.

						</p>
					</div>
				</div>
			</div>
			</div>
		</div>
    </section>
</main>
<?php
$this->load->view('includes/footer');
?>