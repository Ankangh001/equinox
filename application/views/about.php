<?php
$this->load->view('includes/header');
?>
<style>
	.container {
		width:80%;
	}
	.get-funded{
        display: none !important;
    }
	.mob{
		display: none;
	}
	@media (max-width: 786px){
		.mob{
			display: block;
		}
		.pc{
			display:none;
		}
	}
</style>
<main id="main">
	<section id="contact" class="contact">
		<div class="container aos-init aos-animate" data-aos="fade-up">
			<div class="section-title text-center">
				<h2>About Us</h2>
				<p style="display:block">
					We are traders who have a passion for identifying hidden talent in our community. Equinox Trading Capital has strived to create unique funding opportunities and an approachable way to become a professional, funded trader, managing our capital remotely from anywhere in the world.
        			We have developed a user-friendly experience with essential information a trader needs and the industry’s best technology to back it. We provide access to tier-1 liquidity for our traders and aspire to be the top proprietary trading firm in the world. With our innovative ideas, we hope to provide our fellow traders with the best funding experience possible.
				</p>
			</div>
		</div>
		<div class="container aos-init aos-animate pc"  data-aos="fade-up">
			<div class="row" style="margin-top:1rem !important">
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">UK & EU - Equinox Trading Capital LTD</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">US & Global - Equinox Trading Capital LLC</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-6">
					<div class="info">
						<div class="email about-text">
							<h4>Address</h4>
							<p>71-75 SHELTON STREET, COVENT GARDEN <br>LONDON WC2H 9JQ<br>CIN: 14729881</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="info">
						<div class="email about-text">
							<h4>Address</h4>
							<p>16192 COASTAL HIGHWAY, LEWES <br>DELAWARE, 19958<br>CIN: 7448069</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container aos-init aos-animate mob"  data-aos="fade-up">
			<div class="row" style="margin-top:1rem !important">
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">UK & EU - Equinox Trading Capital LTD</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="info">
						<div class="email about-text">
							<h4>Address</h4>
							<p>71-75 SHELTON STREET, COVENT GARDEN <br>LONDON WC2H 9JQ<br>CIN: 14729881</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">US & Global - Equinox Trading Capital LLC</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="info">
						<div class="email about-text">
							<h4>Address</h4>
							<p>16192 COASTAL HIGHWAY, LEWES <br>DELAWARE, 19958<br>CIN: 7448069</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- End #main -->

<?php
$this->load->view('includes/footer');
?>