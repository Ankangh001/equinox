<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Challenge Type</h4>
    <div class="row">
        <div class="col-lg-6">
          <div class="card mb-4">
            <!-- <h5 class="card-header">Order Summary</h5> -->
            <div class="card-body">
              <div class="mt-5 mb-3 row  text-center d-block w-100">
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" style="width:40%">
                <label for="html5-text-input" class="fs-1 text-dark my-3 col-form-label">Free Trial</label>
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
              <button type="submit" class="w-100 btn btn-secondary">Try for free</button>
            </div>
          </div>
        </div>


        <div class="col-lg-6">
          <div class="card mb-4">
            <!-- <h5 class="card-header">Order Summary</h5> -->
            <div class="card-body">
              <div class="mt-5 mb-3 row  text-center d-block w-100">
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" style="width:40%">
                <label for="html5-text-input" class="fs-1 text-dark my-3 col-form-label">Challenge</label>
              </div>
              <div class="mb-5 d-flex flex-column text-center">
                <label for="html5-text-input" class="text-primary col-form-label">Trade upto $200,000 SmartProp trde account</label>
                <label for="html5-text-input" class="col-form-label">Pass the simple Evaluation and recieve your Funded Smart Prop Trader Account</label>
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
              <button type="submit" class="w-100 btn btn-primary">Start New challenge</button>
            </div>
          </div>
        </div>
      </div>
    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>