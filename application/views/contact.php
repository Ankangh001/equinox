<?php
$this->load->view('includes/header');
?>
<style>
	.ss {
		width:80%;
	}
	.get-funded{
        display:none !important;
    }
	@media (max-width: 992px){
		.mob-form-group{
			width: 100% !important;
			padding: 0;
		}
		form {
			width: 100% !important;
			margin: 5rem auto;
		}
		.m-mt-0{
			margin-top:0 !important;
		}
		.mt-m{
			margin-top:1rem;
		}
  	}
	.m-mt-0{
		margin-top: 6rem;
	}

</style>
<main id="main">
	<section id="contact" class="contact">
		<div class="container ss aos-init aos-animate" data-aos="fade-up">

			<div class="section-title text-center">
				<h2>Contact</h2>
				<p>Contact Us</p>
			</div>
		</div>
		<div class="container ss aos-init aos-animate"  data-aos="fade-up">
			<div class="row mt-5  mt-m">
				<div class="col-lg-6">
					<div class="info">
						<div class="email d-flex flex-column justify-content-center align-items-center">
							<i class="bi bi-envelope"></i>
							<h4>Email</h4>
							<p>support@equinoxtradingcapital.com</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6  mt-m">
					<div class="info">
						<div class="open-hours d-flex flex-column justify-content-center align-items-center">
							<i class="bi bi-clock"></i>
							<h4>Response Time</h4>
							<!-- <p>24*5</p> -->
							<p>Within 48hours</p>
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
				<div class="col-lg-6">
					<div class="info">
						<div class="email about-text">
							<h4>EQUINOX TRADING CAPITAL LTD</h4>
							<p>71-75 SHELTON STREET, COVENT GARDEN <br/>LONDON WC2H 9JQ<br>CIN: 14729881</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6  mt-m">
					<div class="info">
						<div class="email about-text">
							<h4>EQUINOX TRADING CAPITAL LLC</h4>
							<p>16192 COASTAL HIGHWAY, LEWES <br>DELAWARE, 19958<br>CIN: 7448069</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row m-mt-0">
				<div class="col-lg-8 m-auto mt-lg-0">
					<form action="" id="contactForm" class="php-email-form">
						<div class="row">
							<div class="col-md-6 form-group mob-form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
								<input type="hidden" name="type" id="type" value="contact">
							</div>
							<div class="col-md-6 form-group mob-form-group mt-3 mt-md-0">
								<input type="email" class="form-control" name="email-add" id="email-add" placeholder="Your Email" required>
							</div>
						</div>
						<div class="form-group mt-3">
							<select class="form-control" name="complaintType" id="ticket-type">
								<option selected>Select Type of Ticket</option>
								<option value="General Question">General Question</option>
								<option value="Payments & Orders">Payments & Orders</option>
								<option value="Evaluation/Funded Phase">Evaluation/Funded Phase</option>
								<option value="Technical Issue">Technical Issue</option>
								<option value="Request">Request</option>
							</select>
						</div>
						<div class="form-group mt-3">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
						</div>
						<div class="form-group mt-3">
							<textarea class="form-control" name="message" rows="8" placeholder="Description" required style="height:100px"></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="sent-message">Your ticket has been received. Thank you!</div>
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

<script>
	$('.success-msg').css('display', 'none');

	$('form').on('submit',(e)=>{
	e.preventDefault();
	var form = $('form').serializeArray();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('ContactForm'); ?>",
		data: form,
		dataType: "html",
		beforeSend: function(){
			$('.loading').fadeIn();
		},
		success: function(data){
			let res = JSON.parse(data);
			if(res.status == 200){
			$('form')[0].reset();
			$('.loading').fadeOut();
			$('.sent-message').fadeIn();
			setTimeout(() => {
				$('.sent-message').fadeOut();
			}, 8000);
			}
		},
		error: function() { alert("Error posting feed."); }
	});
	});
</script>