<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Account Overview</h4>

    <div class="row">
        <div class="col-md-12 col-lg-7">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-credit-card-alt"></i>Our Payment Methods</h5>
              <!-- <small class="text-muted float-end">Default label</small> -->
            </div>
            <div class="card-header d-flex justify-content-around align-items-center">
              <img src="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png">
              <img src="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png">
              <img src="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png">
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Card Holder Name</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Phone No</label>
                      <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Billing Country</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Billing Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Zip Code</label>
                      <input type="text" id="basic-default-zip" class="form-control phone-mask" placeholder="987 980">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">State/Province</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select State/Province</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-email">Card Number</label>
                      <div class="input-group input-group-merge">
                        <input type="number" id="basic-default-card-number" class="form-control" placeholder="0000 0000 0000 0000" aria-label="0000 0000 0000 0000" aria-describedby="basic-default-email2">
                        <span class="input-group-text" id="basic-default-email2">
                          <img src="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png" width="40" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png">
                          <img src="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png" width="40" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png">
                        </span>
                      </div>
                      <!-- <div class="form-text">You can use letters, numbers &amp; periods</div> -->
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Expiration</label>
                            <input type="text" id="basic-default-zip" class="form-control phone-mask" placeholder="01/20">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-email">CVV</label>
                            <div class="input-group input-group-merge">
                              <input type="number" id="basic-default-card-number" class="form-control" placeholder="123" aria-label="123" aria-describedby="basic-default-email2">
                              <span class="input-group-text" id="basic-default-email2">
                                <i class="fs-3 bx bx-credit-card-alt"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-text">By providing your card information you allow Equinox Trading Capital Limited</div>
                </div>
                <div class="mb-3">
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1"> I agree that i have read <a href="#">terms and conditions</a>. </label>
                  </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl">
          <div class="card mb-4">
            <h5 class="card-header">Order Summary</h5>
            <div class="card-body">
              <div class="mb-3 row border-bottom">
                <label for="html5-text-input" class="col-md-4 col-form-label">Plan</label>
                <label for="html5-text-input" class="col-md-8 text-right col-form-label">Evaluation- &nbsp; 098765678</label>
              </div>
              <div class="mb-3 row border-bottom">
                <label for="html5-text-input" class="col-md-4 col-form-label">Price</label>
                <label for="html5-text-input" class="col-md-8 text-right col-form-label"> $9876</label>
              </div>
              <div class="mb-3 row border-bottom align-items-center d-flex ">
                <label for="html5-text-input" class="col-md-4 col-form-label">Apply Coupon</label>
                <div for="html5-text-input" class="col-md-8 text-right col-form-label">
                  <div class="input-group input-group-merge">
                    <input type="number" id="basic-default-card-number" class="form-control" placeholder="KJH9" aria-label="KJH9" aria-describedby="basic-default-email2">
                    <span class="input-group-text p-1" id="basic-default-email2">
                      <button class="btn btn-sm btn-secondary">Apply</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="mb-3 row border-bottom">
                <label for="html5-text-input" class="col-md-4 col-form-label">Discount</label>
                <label for="html5-text-input" class="col-md-8 text-right col-form-label">-$5678</label>
              </div>
              <div class="mb-1 row border-bottom">
                <label for="html5-text-input" class="text-dark fw-bold col-md-4 col-form-label">Total</label>
                <label for="html5-text-input" class="text-dark fw-bold col-md-8 text-right col-form-label">$999</label>
              </div>

              <div class="my-3 row align-items-center d-flex ">
                <div class="form-check text-dark fw-bold">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                  <label class="form-check-label" for="defaultCheck2"> I agree that i have read <a href="<?=base_url('terms-of-service')?>">terms and conditions</a>. </label>
                </div>
              </div>

              <div class="my-3 row align-items-center d-flex ">
                <div class="form-check text-dark fw-bold">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                  <label class="form-check-label" for="defaultCheck2"> I agree that i have read <a href="<?=base_url('privacy-policy')?>">privacy policy</a>. </label>
                </div>
              </div>

              <div class="my-3 row align-items-center d-flex ">
                <div class="form-check text-dark fw-bold">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                  <label class="form-check-label" for="defaultCheck2"> I agree that i have read <a href="<?=base_url('live-account')?>">funded account  disclaimer</a></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>