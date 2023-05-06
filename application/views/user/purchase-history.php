<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Purchase History</h4>
    <div class="accordion mt-3" id="accordionExample">
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
                  <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Name</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Email</label>
                      <input type="text" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                      <label for="dobWithTitle" class="form-label">DOB</label>
                      <input type="text" id="dobWithTitle" class="form-control" placeholder="DD / MM / YY">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
                        
          <div class="accordion-body p-0">
            <div class="row">
              <div class="col-xl">
                <div class="">
                  <div class="card-body">
                    <div class="row">
                      <label for="html5-text-input" class="col-md-4 col-form-label">Login:</label>
                      <label for="html5-text-input" class="col-md-8 text-right col-form-label"> 098765678</label>
                    </div>
                    <div class="row border-bottom mb-3">
                      <label for="html5-text-input" class="text-dark fw-bold col-md-4 col-form-label">Account size</label>
                      <label for="html5-text-input" class="text-dark fw-bold col-md-8 text-right col-form-label">$100,000</label>
                    </div>
                    <div class="row justify-content-evenly">
                      <button data-bs-toggle="modal" data-bs-target="#modalCenter" class="fs-5 btn btn-sm btn-outline-secondary col-lg-3">
                        <i class='bx bxs-key p-1 fs-3'></i>Credentials
                      </button>
                      <button data-bs-toggle="modal" data-bs-target="#modalCenter" class="fs-5 btn btn-sm btn-outline-primary col-lg-3">
                      <i class='bx bx-line-chart-down p-1 fs-3' ></i>Metrix
                      </button>
                    </div>
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


    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>