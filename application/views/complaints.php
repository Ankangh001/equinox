<?php
$this->load->view('includes/header');
?>
<style>
	.container {
		width:80%;
	}
	.get-funded{
        display:none !important;
    }
</style>
<main id="main">
	<section id="contact" class="contact">
		<div class="container aos-init aos-animate" data-aos="fade-up">
			<div class="section-title text-center">
				<h2>Complaints</h2>
			</div>
		</div>
		<div class="container aos-init aos-animate"  data-aos="fade-up">
			<div class="row" style="margin-top:1rem !important">
				<div class="col-lg-12">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">
								INFORMATION ABOUT OUR COMPLAINTS PROCEDURE
							</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="info">
						<div class="email about-text">
							<p>
							Equinox Trading Capital strives to build strong, long-lasting relationships with our stakeholders, including and most importantly with our clients. In keeping with this, we view your comments, suggestions and concerns as matter of premiere importance. We also recognize that a client's dissatisfaction is an opportunity for us to improve by enhancing our products and level of service.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container aos-init aos-animate"  data-aos="fade-up">
			<div class="row" style="margin-top:1rem !important">
				<div class="col-lg-12">
					<div class="info">
						<div class="email d-flex flex-column justify-content-start align-items-center">
							<h4 style="text-align: left; width: 100%; font-size:18px; font-weight:bold">
							WHAT SHOULD I DO IF I HAVE A COMPLAINT?
							</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="info">
						<div class="email about-text">
							<p>In the unlikely event that you are dissatisfied with the product or service provided by Equinox Trading Capital, please contact our Customer Service as soon as possible on live chat or via email at <strong class="text-primary">support@equinoxtradingcapital.com</strong></p><br>
							<p>If our customer service team is unable to resolve the matter or if you wish to submit a complaint, you may submit a formal complaint by completing our Online Complaint Form below.</p><br>
							<p>The complaint will receive an impartial review to determine if we have acted fairly within our rights and have met our contractual obligations. We will acknowledge your complaint promptly and a full written response will be provided within  <strong class="text-primary">eight weeks</strong> of receiving the complaint.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:6rem !important">
				<div class="col-lg-8 m-auto mt-lg-0">
					<form action="" id="contactForm" class="php-email-form">
						<div class="row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
								<input type="hidden" name="type" id="type" value="complaints">
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
								<input type="email" class="form-control" name="email-add" id="email" placeholder="Your Email" required>
							</div>
						</div>
						<div class="form-group mt-3">
							<select class="form-control" name="complaintType" id="ticket-type">
								<option selected>Select Type of Complaint</option>
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
							<textarea class="form-control" name="message" rows="8" placeholder="Description" required></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
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

<script>
	$('.success-msg').css('display', 'none');

	$('form').on('submit',(e)=>{
	e.preventDefault();
	var form = $('form').serializeArray();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('ComplaintsForm'); ?>",
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
			}, 2000);
			}
		},
		error: function() { alert("Error posting feed."); }
	});
	});
</script>