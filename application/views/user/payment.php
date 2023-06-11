<?php
$this->load->view('user/includes/header');
$web_payment_sdk_url = SQUARE_ENVIRONMENT === 'PRODUCTION' ? "https://web.squarecdn.com/v1/square.js" : "https://sandbox.web.squarecdn.com/v1/square.js";
?>
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/user/assets/css/sq-payment.css')?>">

<style>
  button.btn.active {
    border-bottom: 4px solid #535355;
    border-radius: 0;
}
</style>
<script type="text/javascript" src="<?php echo $web_payment_sdk_url ?>"></script>
  <script type="text/javascript">
    window.applicationId ="<?= SQUARE_APPLICATION_ID?>";
    window.locationId = "<?= SQUARE_LOCATION_ID?>";
    window.currency ="<?= $squareData['currency']?>";
    window.country = "<?= $squareData['country']?>";
    window.idempotencyKey ="<?= $squareData['idempotencyKey']?>";
  </script>
<div class="buy-now">
  <button id="skip-payment" class="btn btn-danger btn-buy-now">Skip Payment For testing</button>
</div>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12 col-lg-7">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-credit-card-alt"></i>Our Payment Methods</h5>
            <!-- <small class="text-muted float-end">Default label</small> -->
          </div>
          <ul class="card-header d-flex justify-content-around align-items-center nav nav-" role="tablist">
            <li class="nav-item">
              <button type="button" class="btn active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png" width="50" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>square.png">
              </button>
            </li>

            <li class="nav-item">
              <button type="button" class="btn" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png">
              </button>
            </li>

            <li class="nav-item">
              <button type="button" class="btn" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-amazon" aria-controls="navs-top-amazon" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>amazonpay-logo.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>amazonpay-logo.png">
              </button>
            </li>

            <li class="nav-item">
              <button type="button" class="btn" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile-upi" aria-controls="navs-top-profile" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>UPI.png">
              </button>
            </li>
          </ul>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel" style="margin-top: -5rem;">
                <form class="payment-form" id="fast-checkout">
                  <div class="wrapper">
                    <div id="apple-pay-button" alt="apple-pay" type="button"></div>
                    <div id="google-pay-button" alt="google-pay" type="button"></div>
                    <!-- <div class="border">
                      <span>OR</span>
                    </div> -->
                    <!-- <div id="ach-wrapper">
                      <label for="ach-account-holder-name">Full Name</label>
                      <input id="ach-account-holder-name" type="text" placeholder="Jane Doe" name="ach-account-holder-name" autocomplete="name" /><span id="ach-message"></span><button id="ach-button" type="button">Pay with Bank Account</button>

                      <div class="border">
                        <span>OR</span>
                      </div>
                    </div> -->
                    <div id="card-container"></div>
                    <button id="card-button" type="button">Pay with Card</button>
                    <span id="payment-flow-message"></span>
                  </div>
                </form>
              </div>
            </div>
                <!-- <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
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
                  <button type="submit" class="w-100 btn btn-primary">Purchase</button>
                </form>
              </div> -->
            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
              <div class="col-lg-12 mt-5">
                <div class="card-title d-flex justify-content-center">
                  I want to continue with coinbase
                </div>
                <div class="card-body d-flex justify-content-center">
                  <button id="coinbase_buy" class="btn btn-primary ">Pay Now With Coinbase</button>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="navs-top-amazon" role="tabpanel">
              <h1>Amazon Pay Integration</h1>
              <div id="amazonPayButton"></div>
            </div>

            <div class="tab-pane fade" id="navs-top-profile-upi" role="tabpanel">
              UPI
            </div>
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
              <label for="html5-text-input" class="col-md-8 text-right col-form-label"> $
                <span id="product_price"><?=@$product_details['product_price']?></span>
              </label>
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
              <label for="html5-text-input" class="col-md-8 text-right col-form-label">-$
                <span id="product_discount"><?=@$product_details['product_price']?></span>
              </label>
            </div>
            <div class="mb-1 row border-bottom">
              <label for="html5-text-input" class="text-dark fw-bold col-md-4 col-form-label">Total</label>
              <label for="html5-text-input" class="text-dark fw-bold col-md-8 text-right col-form-label">$
                <span id="final_product_price"><?=@$product_details['product_price']?></span>
              </label>
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
<?php $this->load->view('user/includes/footer');?>
<script>
  const PANEL_URL = "<?=base_url()?>";
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Account Overview</h4>`);

  var requestData ={};

  <?php if(isset($_GET['product-code'])){ ?>
    requestData.product_id = "<?php echo $_GET['product-code']?>";

  <?php }elseif(isset($_GET['normal-product-code'])){ ?>
    requestData.product_id = "<?php echo $_GET['normal-product-code']?>";
  <?php } ?>

  requestData.user_id = "<?php echo $_SESSION['user_id'];?>";
  requestData.product_price = $("#product_price").text();
  requestData.product_discount = $("#product_discount").text();
  requestData.final_product_price = $("#final_product_price").text();

  $('#coinbase_buy').click(()=>{
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/payment/coinbaseCreateCharge'); ?>",
        data: requestData,
        dataType: "html",
        success: function(data){
          window.location.href = data;
        },
        error: function() { 
          alert("Error posting feed."); 
        }
    });
  });

  $('#skip-payment').click(()=>{
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/payment/success'); ?>",
        data: requestData,
        dataType: "html",
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
  })

</script>

<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-google-pay.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-apple-pay.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-ach.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-card-pay.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-payment-flow.js')?>"></script>

<script src="https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js"></script>
 
<script>

window.onAmazonLoginReady = function () {
  amazon.Login.setClientId('YOUR_CLIENT_ID');
};

document.addEventListener('DOMContentLoaded', function () {
  OffAmazonPayments.Button('amazonPayButton', 'YOUR_SELLER_ID', {
    type: 'PwA',
    color: 'Gold',
    size: 'medium',

    authorization: function () {
      loginOptions = { scope: 'profile postal_code payments:widget payments:shipping_address' };
      amazon.Login.authorize(loginOptions, 'YOUR_REDIRECT_URL');
    },

    onError: function (error) {
      console.log('Amazon Pay Button error:', error.getErrorCode(), error.getErrorMessage());
    }
  });
});

</script>