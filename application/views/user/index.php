<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <div class="accordion mt-3 mb-5" id="accordionExample">
    <?php  
      foreach ($res as $key => $value) { 
        if ($value['phase'] == '0'){
    ?>
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button type="button" class="bg-primary p-3 text-white accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
            Free Trial
          </button>
        </h2>

        <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">    
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <div id="redirect" class="d-flex mb-3 justify-content-between align-items-center shadow pointer btn w-100">
                      <label for="html5-text-input" class="col-form-label text-dark pointer">Login: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['account_id']?></label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $<?= @$value['account_size']?></label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer"><i class='bx bx-chevrons-right'></i></label>
                    </div>
                    <div style="margin-bottom:-12px"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
          break;
        }
      };
    ?>


      <?php foreach ($res as $key => $value) { if ($value['phase'] == '1'){?>
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingOne2">
          <button type="button" class="bg-primary p-3 text-white accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
            Evaluation Phase 1
          </button>
        </h2>

        <div id="accordionTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">    
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <?php foreach ($res as $key => $value) { ?>
                    <div class="d-flex mb-3 justify-content-between align-items-center shadow pointer btn w-100">
                      <label for="html5-text-input" class="col-form-label text-dark pointer">Login: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['account_id']?></label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer"><i class='bx bx-chevrons-right'></i></label>
                    </div>
                    <?php } ?>
                    <div style="margin-bottom:-12px"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php break;}} ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body">
              <div class="mt-5 mb-3 row  text-center d-block w-100">
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" style="width:30%">
                <label for="html5-text-input" class="fs-1 text-dark my-3 col-form-label fw-bold text-transform-none">Free Trial</label>
              </div>
              <div class="mb-5 d-flex flex-column text-center">
                <label for="html5-text-input" class="text-primary col-form-label">Master Your Skills</label>
                <label for="html5-text-input" class="col-form-label">Practice Trading without risking anything !</label>
              </div>

              <div class="mb-3 d-flex flex-column text-left border-bottom">
                <ul class="list-unstyled mt-2">
                  <li>
                    <ul>
                      <li>Basic account featured</li>
                      <li>Master your trading stratergy</li>
                      <li>Trading upto 14 days</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <button type="button" id="free-trial-btn" class="w-100 btn btn-secondary">Try for free</button>
            </div>
          </div>
        </div>


        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body">
              <div class="mt-5 mb-3 row  text-center d-block w-100">
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" style="width:30%">
                <label for="html5-text-input" class="fs-1 text-dark my-3 col-form-label fw-bold text-transform-none ">Challenge</label>
              </div>
              <div class="mb-5 d-flex flex-column text-center">
                <label for="html5-text-input" class="text-primary col-form-label">Trade upto $200,000 SmartProp trde account</label>
                <label for="html5-text-input" class="col-form-label">Pass the simple Evaluation and Trader Account</label>
              </div>

              <div class="mb-3 d-flex flex-column text-left border-bottom">
                <ul class="list-unstyled mt-2">
                  <li>
                    <ul>
                      <li>Basic account featured</li>
                      <li>Master your trading stratergy</li>
                      <li>Trading upto 14 days</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <a href="<?= base_url('user/start-new-challenge') ?>" class="w-100 btn btn-primary">Start New challenge</a>
            </div>
          </div>
        </div>
      </div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Dashboard</h4>`);

  var user ={};
  user.id = <?php echo $_SESSION['user_id']; ?>;
  $('#free-trial-btn').click(()=>{
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/account/freeTrial'); ?>",
      data: user,
      success: function(data){
        let res = JSON.parse(data);
        if(res.status == 200){
          window.location.href = "<?= base_url('user/account-overview') ?>";
        }
      },
      error: function() { 
        alert("Error posting feed."); 
      }
    });
  });

  function redirection(cred){
    window.location.href = "<?= base_url('user/account-overview') ?>"+cred;
  }
  $('#redirect').click(()=>{
    redirection();
  });
</script>
<?php $this->load->view('user/includes/footer');?>