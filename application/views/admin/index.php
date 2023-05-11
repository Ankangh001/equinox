<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <div class="accordion mt-3 mb-5" id="accordionExample">
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button type="button" class="bg-primary p-3 text-white accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
            Free Trial
          </button>
        </h2>

        <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Your Login Credentials</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="col-xl">
                    <div class="card-body">
                      <div class="mb-3 row border-bottom justfy-content-start">
                        <label for="html5-text-input" class="col-md-4 col-form-label">Login</label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">098765678</label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                      </div>
                      <div class="mb-3 row border-bottom justfy-content-evenly">
                        <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Master Password
                          <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                            <i class='bx bx-info-circle' ></i>
                          </span>
                        </label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">********<i class='bx bxs-low-vision'></i></label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                      </div>
                      <div class="mb-3 row border-bottom justfy-content-evenly">
                        <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Investor Password
                          <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                            <i class='bx bx-info-circle' ></i>
                          </span>
                        </label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">098765678</label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                      </div>
                      <div class="mb-3 row border-bottom justfy-content-evenly">
                        <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">Demo</label>
                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
                        
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <div class="d-flex mb-3 justify-content-between align-items-center shadow pointer btn w-100">
                      <label for="html5-text-input" class="col-form-label text-dark pointer">Login: &nbsp;&nbsp;&nbsp;&nbsp; 098765678</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer"><i class='bx bx-chevrons-right'></i></label>
                    </div>

                    <div class="d-flex mb-3 justify-content-between align-items-center shadow pointer btn w-100">
                      <label for="html5-text-input" class="col-form-label text-dark pointer">Login: &nbsp;&nbsp;&nbsp;&nbsp; 098765678</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer"><i class='bx bx-chevrons-right'></i></label>
                    </div>

                    <div class="d-flex mb-3 justify-content-between align-items-center shadow pointer btn w-100">
                      <label for="html5-text-input" class="col-form-label text-dark pointer">Login: &nbsp;&nbsp;&nbsp;&nbsp; 098765678</label>
                      <label for="html5-text-input" class="fw-bold col-form-label text-dark pointer">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
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
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button type="button" class="bg-primary text-white p-3 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
            Evaluation Phase 1
          </button>
        </h2>
        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <div class="row">
                      <label for="html5-text-input" class="col-md-4 col-form-label">Login:</label>
                      <label for="html5-text-input" class="col-md-8 text-right col-form-label"> 098765678</label>
                    </div>
                    <div class="row">
                      <label for="html5-text-input" class="text-dark fw-bold col-md-4 col-form-label">Account size</label>
                      <label for="html5-text-input" class="text-dark fw-bold col-md-8 text-right col-form-label">$100,000</label>
                    </div>
                    <div class="row">
                      <label for="html5-text-input" class="text-dark fw-bold col-lg-2 col-form-label">
                        <i class='bx bxs-key p-1 fs-3'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-decoration-underline text-primary" href="#">Credentials</a>
                      </label>
                      <label for="html5-text-input" class="text-dark fw-bold col-lg-2 col-form-label">
                        <i class='bx bx-line-chart-down p-1 fs-3' ></i>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-decoration-underline text-primary" href="#">Metrix</a>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button type="button" class="bg-primary text-white p-3 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
            Evaluation Phase 2
          </button>
        </h2>
        <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <div class="row">
                      <label for="html5-text-input" class="col-md-4 col-form-label">Login:</label>
                      <label for="html5-text-input" class="col-md-8 text-right col-form-label"> 098765678</label>
                    </div>
                    <div class="row">
                      <label for="html5-text-input" class="text-dark fw-bold col-md-4 col-form-label">Account size</label>
                      <label for="html5-text-input" class="text-dark fw-bold col-md-8 text-right col-form-label">$100,000</label>
                    </div>
                    <div class="row">
                      <label for="html5-text-input" class="text-dark fw-bold col-lg-2 col-form-label">
                        <i class='bx bxs-key p-1 fs-3'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-decoration-underline text-primary" href="#">Credentials</a>
                      </label>
                      <label for="html5-text-input" class="text-dark fw-bold col-lg-2 col-form-label">
                        <i class='bx bx-line-chart-down p-1 fs-3' ></i>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-decoration-underline text-primary" href="#">Metrix</a>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
          <div class="card mb-4">
            <!-- <h5 class="card-header">Order Summary</h5> -->
            <div class="card-body">
              <div class="mt-5 mb-3 row  text-center d-block w-100">
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" style="width:30%">
                <label for="html5-text-input" class="fs-1 text-dark my-3 col-form-label fw-bold text-transform-none  ">Free Trial</label>
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
              <button type="submit" class="w-100 btn btn-primary">Start New challenge</button>
            </div>
          </div>
        </div>
      </div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Dashboard</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>