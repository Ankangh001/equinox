<?php
$this->load->view('user/includes/header');
$web_payment_sdk_url = SQUARE_CUSTOM_ENVIRONMENT === 'PRODUCTION' ? "https://web.squarecdn.com/v1/square.js" : "https://sandbox.web.squarecdn.com/v1/square.js";
?>
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/user/assets/css/sq-payment.css')?>">

<style>
  button.btn.active {
    border-bottom: 4px solid #535355;
    border-radius: 0;
  }
  .input-group:focus-within .form-control, .input-group:focus-within .input-group-text {
      border-color: #ffffff;
  }
  @media (max-width: 786px){
    .tab-content>.active {
        display: block;
        margin: 0 !important;
    }
    #mob{
      display:none;
    }
    #p-method{
      display:none !important;
    }
    .mp{
      display:block !important;
    }
  }
  .payment-form {
      padding: 0 !important;
      border-radius: 0;
      margin: 0;
      height: auto;
      max-width: 100%;
      background: #fff !important;
      margin-bottom: -3rem;
  }
  .mp{
    display:none;
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
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- update alert modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-xl">
              <div class="card-body">
                <h5 class="modal-title" id="modalCenterTitle">Payment successfull <i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-7">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <img src="<?= base_url('assets/img/card-checkout.png')?>" alt="card-image" class="mp" style="width: 15%;" />
            <h5 class="mb-0 mp">&nbsp;Our Payment Methods</h5>
            <h5 class="mb-0" id="p-method"><img src="<?= base_url('assets/img/card-checkout.png')?>" alt="card-image" style="width: 15%;" />&nbsp;Our Payment Methods</h5>
            <small id="mob" class="text-muted float-end">Choose Your Payment Method</small>
          </div>
          <ul class="card-header d-flex justify-content-around align-items-center nav nav-" role="tablist">
            <li class="nav-item">
              <button type="button" class="btn active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>stripe.png" width="50" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>square.png">
              </button>
            </li>

            <li class="nav-item">
              <button type="button" class="btn " role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>coinbase.png">
              </button>
            </li>

            <!-- <li class="nav-item">
              <button type="button" class="btn" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-amazon" aria-controls="navs-top-amazon" aria-selected="false">
                <img src="<?= base_url('assets/user/assets/img/elements/') ?>amazonpay-logo.png" width="100" alt="stripe-logo" srcset="<?= base_url('assets/user/assets/img/elements/') ?>amazonpay-logo.png">
              </button>
            </li> -->
          </ul>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <form class="payment-form" id="fast-checkout">
                  <div class="wrapper">
                     <!--<div id="apple-pay-button" alt="apple-pay" type="button"></div> -->
                     <!-- <div id="google-pay-button" alt="google-pay" type="button"></div>  -->
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

              <div class="tab-pane fade " id="navs-top-profile" role="tabpanel">
                <div class="col-lg-12">
                  <button id="coinbase_buy" class="m-auto" type="submit">Pay with Coinbase</button>
                  <form id="paymentForm">
                  </form>
                </div>
              </div>

              <div class="tab-pane fade" id="navs-top-amazon" role="tabpanel">
                <form method="POST" action="<?=base_url('user/payment/amazonPay')?>">
                  <input type="hidden" name="action" value="checkout">
                  <div id="amazonPayButton"></div>
                </form>
              </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-xl">
        <div class="card mb-4">
          <h5 class="card-header">Order Summary</h5>
          <div class="card-body">
            <div class="mb-3 row border-bottom">
              <label for="html5-text-input" class="col-md-4 col-form-label">Evaluation</label>
              <label for="html5-text-input" class="col-md-8 text-right col-form-label"><?=@$product_details['account_size']?>K</label>
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
                  <input type="text" id="coupon-code" class="form-control" placeholder="Enter Coupon Code">
                  <span class="input-group-text p-1" id="basic-default-email2">
                    <button class="btn btn-sm btn-primary m-1" id="apply-btn">Apply</button>
                  </span>
                </div>
              </div>
            </div>
            <div class="mb-3 row border-bottom">
              <label for="html5-text-input" class="col-md-4 col-form-label">Discount</label>
              <label for="html5-text-input" class="col-md-8 text-right col-form-label">-$
                <span id="product_discount">0</span>
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
                <input class="form-check-input" type="checkbox" required name="1" value="" id="defaultCheck22">
                <label class="form-check-label" for="defaultCheck22"> I agree that i have read <a href="<?=base_url('terms-of-service')?>">terms and conditions</a>. </label>
              </div>
            </div>

            <div class="my-3 row align-items-center d-flex ">
              <div class="form-check text-dark fw-bold">
                <input class="form-check-input" type="checkbox" required name="2" value="" id="defaultCheck233">
                <label class="form-check-label" for="defaultCheck233"> I agree that i have read <a href="<?=base_url('privacy-policy')?>">privacy policy</a>. </label>
              </div>
            </div>

            <div class="my-3 row align-items-center d-flex ">
              <div class="form-check text-dark fw-bold">
                <input class="form-check-input" type="checkbox" required name="3" value="" id="defaultCheck244">
                <label class="form-check-label" for="defaultCheck244"> I agree that i have read <a href="<?=base_url('live-account')?>">funded account  disclaimer</a></label>
              </div>
            </div>
            <span id="error" class="d-none text-danger">Please check all the required fields !</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="buy-now">
  <button id="skip-payment" class="btn btn-danger btn-buy-now">Skip Payment For testing</button>
</div> -->
<?php $this->load->view('user/includes/footer');?>
<script>
  const PANEL_URL = "<?=base_url()?>";
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Checkout</h4>`);
  


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
    if($('#defaultCheck22').is(":checked") && $('#defaultCheck244').is(":checked") && $('#defaultCheck233').is(":checked")){
      $("#error").addClass('d-none');
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('user/payment/coinbaseCreateCharge'); ?>",
          data: requestData,
          dataType: "html",
          success: function(data){
            console.log(data);
            window.location.href = data;
          },
          error: function() { 
            alert("Error posting feed."); 
          }
      });
    }else{
      $("#error").removeClass('d-none');
    }
  });


  //coupon code check
  $('#apply-btn').click(()=>{    
    requestData.code = $('#coupon-code').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/payment/checkCoupon'); ?>",
        data: requestData,
        dataType: "html",
        success: function(data){
          let res = JSON.parse(data);
          requestData.final_product_price = res.final_product_price;
          $('#final_product_price').text(res.final_product_price);
          $("#product_discount").text(res.product_discount);
        },
        error: function() { 
          alert("Error posting feed."); 
        }
    });
  });

  // $('#skip-payment').click(()=>{
  //   $.ajax({
  //       type: "POST",
  //       url: "<?php echo base_url('user/payment/success'); ?>",
  //       data: requestData,
  //       dataType: "html",
  //       success: function(data){
  //         let res = JSON.parse(data);
  //         if(res.status == 200){
  //           window.location.href = "<?= base_url('user/account-overview') ?>";
  //         }
  //       },
  //       error: function() { 
  //         alert("Error posting feed."); 
  //       }
  //   });
  // })
  // const form = document.getElementById('paymentForm');

  // form.addEventListener('submit', async (e) => {
  //     e.preventDefault();
  //     var coinbaseUrl = PANEL_URL+'user/payment/createCoinbasePayment';
  //     const response = await fetch(coinbaseUrl, {
  //         method: 'POST',
  //         headers: {
  //             'Content-Type': 'application/json',
  //         },
  //         body: JSON.stringify({requestData}),
  //     });

  //     if (response.ok) {
  //         const paymentData = await response.json();
  //         window.location.href = paymentData.hosted_url;
  //     } else {
  //         console.error('Failed to create payment');
  //     }
  // });

</script>

<!-- <script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-google-pay.js')?>"></script> -->
<!-- <script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-apple-pay.js')?>"></script> -->
<!-- <script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-ach.js')?>"></script> -->

<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-card-pay.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/user/assets/js/sq-payment-flow.js')?>"></script>

<script src="https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js"></script>
 
<script>

// window.onAmazonLoginReady = function () {
//   amazon.Login.setClientId('amzn1.application-oa2-client.3f77e56a623e45ca8fcece1d8045c39f');
// };

// document.addEventListener('DOMContentLoaded', function () {
//   OffAmazonPayments.Button('amazonPayButton', 'A2EN18MJPAR45R', {
//     type: 'PwA',
//     color: 'Gold',
//     size: 'medium',

//     authorization: function () {
//       var paymentUrl = PANEL_URL+'user/payment/amazonPay?action=checkout&amount=' + encodeURIComponent(requestData.final_product_price);
//       window.location.href = paymentUrl;
//     },

//     onError: function (error) {
//       console.log('Amazon Pay Button error:', error.getErrorCode(), error.getErrorMessage());
//     }
//   });
// });
  // $('#loading').show(1000);
  $('#fast-checkout').css('opacity', '0.05');
  setTimeout(() => {
    $('#fast-checkout').css('opacity', '1');
  }, 3000);

</script>