<?php
$this->load->view('includes/header');
?>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
		
	
		<div class="row">
        	<div class="col-lg-6" style="margin-top: -30px;">
				<h1>Funding for traders <br>-  <span>Simplified !</span></h1>
				<h2>Coming Soon</h2>

				<div class="flex items-end justify-start z-10">
					<div class="timer-m text-center">
						<span id="day" class="text-xl sm:text-5xl">110</span>
						<p style="font-size:0.8rem">Days</p>
					</div>
					<div class="timer-m text-center">
						<span id="hours" class="text-xl sm:text-5xl">13</span>
						<p style="font-size:0.8rem">Hours</p>
					</div>
					<div class="timer-m text-center">
						<span id="min" class="text-xl sm:text-5xl">47</span>
						<p style="font-size:0.8rem">Minutes</p>
					</div>
					<div class="timer-m text-center">
						<span id="sec" class="text-xl sm:text-5xl">20</span>
						<p style="font-size:0.8rem">Seconds</p>
					</div>
				</div>

				<div class="btns">
					<a href="#why-us" class="btn-book animated fadeInUp scrollto"><i style="color: #1586d4;" class="fa-brands fa-discord"></i>&nbsp;&nbsp;Join our discord</a>
					<input type="text" class="btn btn-input animated fadeInUp scrollto" placeholder="Email Updates" />
					<i style="color: #00e894;position: relative;left: -35px;top: 2px;" class="fas fa-arrow-right ms-1"></i>
				</div>
		</div>
		<div id="device" class="col-lg-6 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
			<a href="" class="glightbox play-btn"></a>
		</div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
	<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title text-center">
          <h2>Evaluation Process</h2>
          <p>Steps to grow with us</p>
        </div>

        <div class="row">
			<div class="col-lg-8">
				<p class="evaluation-text">This is where we evaluate your trading</p>
				<div class="row">
					<div class="col-lg-6 mt-4 mt-lg-0">
						<div class="box" data-aos="zoom-in" data-aos-delay="200">
							<span><i class="fas fa-0 ms-1"></i><i class="fas fa-1 ms-1"></i></span>
							<h4>EQUINOX Challenge</h4>
							<p>The FTMO Challenge is the first step of the Evaluation Process. You need to succeed here to advance into the Verification stage. Prove your trading skills and discipline in observing the Trading Objectives.</p>
						</div>
					</div>

					<div class="col-lg-6 mt-4 mt-lg-0">
						<div class="box" data-aos="zoom-in" data-aos-delay="200">
							<span><i class="fas fa-0 ms-1"></i><i class="fas fa-2 ms-1"></i></span>
							<h4>Verification</h4>
							<p>The Verification is the second and the last step towards becoming the FTMO Trader. Once you pass the Verification stage and your results are verified, you will be offered to trade for our Proprietary Trading Firm.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 mt-4 mt-lg-0">
				<div class="box" data-aos="zoom-in" data-aos-delay="200" style="padding: 20px 0;">
					<a><i class="fas fa-coins"></i>&nbsp;&nbsp;Earn Real Money</a>
					<div style="padding:0px 30px">
						<span><i class="fas fa-0 ms-1"></i><i class="fas fa-3 ms-1"></i></span>
						<h4>EQ Trader</h4>
						<p>You are becoming a trader of the FTMO Proprietary Trading firm. Trade responsibly and consistently and receive up to 90% of your profits. If you consistently generate profits on your FTMO Account, we can scale your account according to our Scaling Plan.</p>
					</div>
				</div>
			</div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

	<!-- ======= Pricing ======= -->
    <section id="table-pricing" class="table-pricing">
		<div class="container" data-aos="fade-up">
			<div class="section-title text-center">
				<h2>Pricing</h2>
				<p>What we offer</p>
			</div>

			<ul class="nav nav-pills mb-3 justify-content-center mb-5" id="pills-tab" role="tablist">
				<li class="nav-item m-2 pointer">
					<div data-toggle="pill" 
						id="pills-home-tab"
						href="#pills-home" 
						role="tab" 
						aria-controls="pills-home" 
						aria-selected="true" 
						class="flex justify-center active
							items-center flex-row px-16p py-8p 
							bg-primary-500/16 border-pricing 
							border-primary-500 rounded-full 
							-my-12p h-40p gap-8p">
						<strong>$10000</strong>
					</div>
				</li>
				<li class="nav-item m-2 pointer">
					<div id="pills-profile-tab" 
						data-toggle="pill" 
						href="#pills-profile" 
						role="tab" 
						aria-controls="pills-profile" 
						aria-selected="false"
						class="flex justify-center 
							items-center flex-row px-16p py-8p 
							bg-primary-500/16 border-pricing 
							border-primary-500 rounded-full 
							-my-12p h-40p gap-8p">
						<strong>$20000</strong>
					</div>
				</li>
				<li class="nav-item m-2 pointer">
					<div id="pills-contact-tab" 
						data-toggle="pill" 
						href="#pills-contact" 
						role="tab" 
						aria-controls="pills-contact" 
						aria-selected="false"
						class="flex justify-center 
							items-center flex-row px-16p py-8p 
							bg-primary-500/16 border-pricing 
							border-primary-500 rounded-full 
							-my-12p h-40p gap-8p">
						<strong>$30000</strong>
					</div>
					<!-- <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a> -->
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
						<table class="account-config">
							<thead>
								<tr>
								<td></td>
								<td>Phase 1</td>
								<td>Phase 2</td>
								<td>Funded</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td>Trading period</td>
								<td x-text="currentConfig[0][0]">30 days</td>
								<td x-text="currentConfig[1][0]">60 days</td>
								<td x-text="currentConfig[2][0]">indefinite</td>
								</tr>
								<tr>
								<td>Minimum trading days</td>
								<td x-text="currentConfig[0][1]">5 days</td>
								<td x-text="currentConfig[1][1]">5 days</td>
								<td x-text="currentConfig[2][1]">x</td>
								</tr>
								<tr>
								<td>Max Daily Loss</td>
								<td x-text="currentConfig[0][2]">£7,000</td>
								<td x-text="currentConfig[1][2]">£7,000</td>
								<td x-text="currentConfig[2][2]">£7,000</td>
								</tr>
								<tr>
								<td>Max Overall Loss</td>
								<td x-text="currentConfig[0][3]">£14,000</td>
								<td x-text="currentConfig[1][3]">£14,000</td>
								<td x-text="currentConfig[2][3]">£14,000</td>
								</tr>
								<tr>
								<td>Profit Target</td>
								<td x-text="currentConfig[0][4]">£11,200</td>
								<td x-text="currentConfig[1][4]">£7,000</td>
								<td x-text="currentConfig[2][4]">x</td>
								</tr>
								<tr>
								<td>Refundable Fee</td>
								<td colspan="3">
									<div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
									<span>Coiming Soon</span>
									<strong x-text="currentConfig[0][5]"></strong>
									</div>
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
						<table class="account-config">
							<thead>
								<tr>
								<td></td>
								<td>Phase 1</td>
								<td>Phase 2</td>
								<td>Funded</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td>Trading period</td>
								<td x-text="currentConfig[0][0]">30 days</td>
								<td x-text="currentConfig[1][0]">60 days</td>
								<td x-text="currentConfig[2][0]">indefinite</td>
								</tr>
								<tr>
								<td>Minimum trading days</td>
								<td x-text="currentConfig[0][1]">5 days</td>
								<td x-text="currentConfig[1][1]">5 days</td>
								<td x-text="currentConfig[2][1]">x</td>
								</tr>
								<tr>
								<td>Max Daily Loss</td>
								<td x-text="currentConfig[0][2]">£7,000</td>
								<td x-text="currentConfig[1][2]">£7,000</td>
								<td x-text="currentConfig[2][2]">£7,000</td>
								</tr>
								<tr>
								<td>Max Overall Loss</td>
								<td x-text="currentConfig[0][3]">£14,000</td>
								<td x-text="currentConfig[1][3]">£14,000</td>
								<td x-text="currentConfig[2][3]">£14,000</td>
								</tr>
								<tr>
								<td>Profit Target</td>
								<td x-text="currentConfig[0][4]">£11,200</td>
								<td x-text="currentConfig[1][4]">£7,000</td>
								<td x-text="currentConfig[2][4]">x</td>
								</tr>
								<tr>
								<td>Refundable Fee</td>
								<td colspan="3">
									<div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
										<span>Coiming Soon</span>
										<strong x-text="currentConfig[0][5]"></strong>
									</div>
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
						<table class="account-config">
							<thead>
								<tr>
								<td></td>
								<td>Phase 1</td>
								<td>Phase 2</td>
								<td>Funded</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td>Trading period</td>
								<td x-text="currentConfig[0][0]">30 days</td>
								<td x-text="currentConfig[1][0]">60 days</td>
								<td x-text="currentConfig[2][0]">indefinite</td>
								</tr>
								<tr>
								<td>Minimum trading days</td>
								<td x-text="currentConfig[0][1]">5 days</td>
								<td x-text="currentConfig[1][1]">5 days</td>
								<td x-text="currentConfig[2][1]">x</td>
								</tr>
								<tr>
								<td>Max Daily Loss</td>
								<td x-text="currentConfig[0][2]">£7,000</td>
								<td x-text="currentConfig[1][2]">£7,000</td>
								<td x-text="currentConfig[2][2]">£7,000</td>
								</tr>
								<tr>
								<td>Max Overall Loss</td>
								<td x-text="currentConfig[0][3]">£14,000</td>
								<td x-text="currentConfig[1][3]">£14,000</td>
								<td x-text="currentConfig[2][3]">£14,000</td>
								</tr>
								<tr>
								<td>Profit Target</td>
								<td x-text="currentConfig[0][4]">£11,200</td>
								<td x-text="currentConfig[1][4]">£7,000</td>
								<td x-text="currentConfig[2][4]">x</td>
								</tr>
								<tr>
								<td>Refundable Fee</td>
								<td colspan="3">
									<div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
									<span>Coiming Soon</span>
									<strong x-text="currentConfig[0][5]"></strong>
									</div>
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </section><!-- End Pricing -->
	
	<!-- ======= Key Feature ======= -->
    <section id="why-us" class="key-feature">
      <div class="container" data-aos="fade-up">

        <div class="section-title text-center">
          <h2>Key Benefits</h2>
          <p> Benefits</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
				<h4 class="key-benefits-h4"><i class="fas fa-coins ms-1"></i>&nbsp;&nbsp;Swing Account</h4>
				<p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 mt-4 mt-lg-0">
		  	<div class="box" data-aos="zoom-in" data-aos-delay="100">
				<h4 class="key-benefits-h4"><i class="fas fa-chart-line ms-1"></i>&nbsp;&nbsp;Scaling Plan</h4>
				<p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 mt-4 mt-lg-0">
		  	<div class="box" data-aos="zoom-in" data-aos-delay="100">
				<h4 class="key-benefits-h4"><i class="fas fa-chart-pie ms-1"></i>&nbsp;&nbsp;Free Trial</h4>
				<p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>	
		  <div class="col-lg-3 col-md-3 col-sm-6 mt-4 mt-lg-0">
		  	<div class="box" data-aos="zoom-in" data-aos-delay="100">
				<h4 class="key-benefits-h4"><i class="fas fa-magnifying-glass-chart"></i>&nbsp;&nbsp;Other Projects</h4>
				<p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>	  
        </div>

		<!-- <div class="row" data-aos="fade-up">
			<div class="col-lg-8 justify-content-center join-team text-center">
				<h2 class="text-lg">Join the team of our experienced traders</h2>
				<p class="sm-text mt-5">If you are ready, accept our FTMO Challenge and become our FTMO Trader. You can even try the entire process completely free of charge.</p>
				<div class="row m-auto mt-5">
					<div class="col-lg-3">
					</div>
					<div class="col-lg-3" data-aos="fade-right">
						<button class="btn btn-challenge">EQ Challenge</button>
					</div>
					<div class="col-lg-3" data-aos="fade-left">
						<button class="btn btn-light">Free Trial</button>
					</div>
					<div class="col-lg-3">
					</div>
				</div>
			</div>
		</div> -->

      </div>
    </section><!-- End Key Feature -->
	
	 <!-- ======= About Section ======= -->
	 <section id="about" class="payout">
      <div class="container" data-aos="fade-up">
	  	<!-- <div class="section-title text-center">
			<h2>Payout</h2>
			<p>Our Payout System</p>
		</div> -->
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/payout.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3 style="margin-bottom:2rem; font-size:2rem; font-weight: 600;">Payout System</h3>
            <p class="fst-italic">
			The default payout ratio for all FTMO Traders is set to 80:20, however, an 80% share is not where we draw the line.
			<br>
			If you meet the conditions of our Scaling Plan, not only do we increase the balance of your FTMO Account by 25%, the payout ratio will also automatically change to a staggering 90:10!
			<br>
			All FTMO Traders can request payout on-demand. The payout can be processed just after 14 days, but you also have the ability to choose your own Profit Split Day, which can be even changed up to three times. In conclusion, we make sure that you will always receive your withdrawal on your most convenient day.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


	 <!-- ======= About Section ======= -->
	 <section id="about" class="payout">
      <div class="container" data-aos="fade-up">
	  	<!-- <div class="section-title text-center">
			<h2>Payout</h2>
			<p>Our Payout System</p>
		</div> -->
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/payout.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content">
            <h3 style="margin-bottom:2rem; font-size:2rem; font-weight: 600;">Payout System</h3>
            <p class="fst-italic">
			The default payout ratio for all FTMO Traders is set to 80:20, however, an 80% share is not where we draw the line.
			<br>
			If you meet the conditions of our Scaling Plan, not only do we increase the balance of your FTMO Account by 25%, the payout ratio will also automatically change to a staggering 90:10!
			<br>
			All FTMO Traders can request payout on-demand. The payout can be processed just after 14 days, but you also have the ability to choose your own Profit Split Day, which can be even changed up to three times. In conclusion, we make sure that you will always receive your withdrawal on your most convenient day.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->
<?php
$this->load->view('includes/footer');
?>