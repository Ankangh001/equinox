<?php
$this->load->view('includes/header');
?>
<style>
	.container {
		width:80%;
	}
</style>
<main id="main">
	<section id="contact" class="contact">
		<div class="container aos-init aos-animate" data-aos="fade-up">

			<div class="section-title text-center">
				<h2>Contact</h2>
				<p>Contact Us</p>
			</div>
		</div>

		<!-- <div data-aos="fade-up" class="aos-init aos-animate">
			<iframe style="border:0; width: 100%; height: 350px;"
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
				frameborder="0" allowfullscreen=""></iframe>
		</div> -->

		<div class="container aos-init aos-animate"  data-aos="fade-up">
			<div class="row mt-5">
				<div class="col-lg-4">
					<div class="info">
						<div class="email d-flex flex-column justify-content-center align-items-center">
							<i class="bi bi-envelope"></i>
							<h4>Email</h4>
							<p>info@example.com</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="info">
						<div class="open-hours d-flex flex-column justify-content-center align-items-center">
							<i class="bi bi-clock"></i>
							<h4>Open Hours</h4>
							<p>Monday-Saturday<br>11:00 AM - 2300 PM</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="info">
						<div class="phone d-flex flex-column justify-content-center align-items-center">
							<i class="bi bi-phone"></i>
							<h4>Live Chat</h4>
							<p>Monday-Saturday<br>11:00 AM - 2300 PM</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:6rem !important">
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:22px; font-weight:bold">About Company</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					
				</div>
				<div class="col-lg-4">
					
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-lg-4">
					<div class="info">
						<div class="email about-text">
							<h4>FTMO Evaluation Global s.r.o.</h4>
							<p>Purkyňova 2121/3<br>110 00 Prague, Czech Republic <br>ID: 09213651 <br>VAT: CZ699005540</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="info">
						<div class="email about-text">
							<h4>FTMO Evaluation Global s.r.o.</h4>
							<p>Purkyňova 2121/3<br>110 00 Prague, Czech Republic <br>ID: 09213651 <br>VAT: CZ699005540</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="info">
						<div class="email about-text">
							<h4>FTMO Evaluation Global s.r.o.</h4>
							<p>Purkyňova 2121/3<br>110 00 Prague, Czech Republic <br>ID: 09213651 <br>VAT: CZ699005540</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-top:6rem !important">
				<div class="col-lg-8 m-auto mt-lg-0">
					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
									required="">
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
								<input type="email" class="form-control" name="email" id="email"
									placeholder="Your Email" required="">
							</div>
						</div>
						<div class="form-group mt-3">
							<select class="form-control" name="complaintType" id="">
								<option selected>Select Type of Ticket</option>
								<option value="General">General</option>
								<option value="Products & Services">Products & Services</option>
								<option value="Payments & Finances">Payments & Finances</option>
								<option value="Technical Issue">Technical Issue</option>
							</select>
						</div>
						<div class="form-group mt-3">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
								required="">
						</div>
						<div class="form-group mt-3">
							<textarea class="form-control" name="message" rows="8" placeholder="Description"
								required=""></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your complaint has been sent. Thank you!</div>
						</div>
						<div class="text-center"><button type="submit">Submit</button></div>
					</form>

				</div>
			</div>
		</div>
	</section>
</main><!-- End #main -->

<?php
$this->load->view('includes/footer');
?>