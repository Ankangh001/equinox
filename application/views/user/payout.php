<?php
$this->load->view('user/includes/header');
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-receipt"></i>Withdraw your earnings</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-lg-6" id="payout">
                    <div class="mb-3">
                      <label for="payout-type" class="form-label">Payout Type</label>
                      <select class="form-select" id="payout-type" aria-label="Default select example">
                        <option selected="">Select Payout Type</option>
                        <!-- static  -->
                        <option value="Profit Split">Profit Split</option>
                        <option value="Affiliate">Affiliate</option>
                        <!-- <option value="Rewards">Games & Rewards</option> -->
                        <!-- static  -->
                      </select>
                    </div>
                  </div>

                  <!-- will show when profit selected -->
                  <div class="col-lg-4" id="account">
                    <div class="mb-3">
                      <label for="account-numbers" class="form-label">Account Number</label>
                      <select class="form-select" id="account-numbers" aria-label="Default select example">
                        <option selected="">Select Account Number</option>
                      </select>
                    </div>
                  </div>
                  <!-- will show when profit selected -->

                  <div class="col-lg-6" id="mode">
                    <div class="mb-3">
                      <label for="payment-mode" class="form-label">Payment Mode</label>
                      <select class="form-select" id="payment-mode" aria-label="Default select example">
                        <option selected="">Select Payment Mode</option>
                        <option value="1">Deel</option>
                        <option value="2">Bank Transfer</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label class="form-label d-flex align-items-center" for="amount">Amount &nbsp;&nbsp;
                        <span id="available_amount" class="ml-3 text-info text-transform-none float-end"></span></label>
                        <input type="number" id="amount" class="form-control phone-mask" placeholder="Enter amount">
                        <p class="amnt-error d-none">You dont have enough balance</p>
                    </div>
                  </div>

                  <div class="col-lg-8" id="wallet">
                    <div class="mb-3">
                      <label class="form-label" for="walletAddress">Email / Wallet Address</label>
                      <input type="text" id="walletAddress" class="form-control phone-mask" placeholder="Enter your address">
                    </div>
                  </div>
                </div>
                <div id="bank-details" class="mt-5">
                  <div class="row mt-5">
                    <h4 class="tex-divider">Bank Transfer Details</h4>
                    <hr>
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Receipant Name &nbsp;&nbsp;
                          <span id="receipant-name" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="receipant-name" class="form-control phone-mask" placeholder="Enter Receipant Name">
                      </div>
                    </div>
  
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Receipant Address &nbsp;&nbsp;
                          <span id="receipant-address" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="receipant-address" class="form-control phone-mask" placeholder="Enter Receipant Address">
                      </div>
                    </div>
  
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Account Number/IBAN&nbsp;&nbsp;
                          <span id="iban" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="iban" class="form-control phone-mask" placeholder="Enter Account Number/IBAN">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Sortcode/ABN/Routing Code&nbsp;&nbsp;
                          <span id="sort-code" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="sort-code" class="form-control phone-mask" placeholder="Enter Sortcode/ABN/Routing Code">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Swift Code&nbsp;&nbsp;
                          <span id="swift-code" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="swift-code" class="form-control phone-mask" placeholder="Enter Swift Code">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Bank Name&nbsp;&nbsp;
                          <span id="bank-name" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="bank-name" class="form-control phone-mask" placeholder="Enter Bank Name">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Branch Address&nbsp;&nbsp;
                          <span id="branch_address" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="branch_address" class="form-control phone-mask" placeholder="Enter Branch Address">
                      </div>
                    </div>
  
                  </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Request Payout</button>
              </form>
            </div>
          </div>
        </div>
        <h3 class="my-3"></h3>
        <div class="col-xl">
          <div class="card">
            <h5 class="card-header">Withdrawal History</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>05/04/2023</td>
                    <td>$999</td>
                    <td>Free Trial</td>
                    <td>
                      <span class="badge bg-label-warning me-1">Pending</span>
                      <span class="badge bg-label-success me-1">Paid</span>
                      <span class="badge bg-label-danger me-1">Denied</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('user/includes/footer');?>

<script>

  $('#account').css('display','none');
  $('#bank-details').css('display','none');

  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Payout / Withdraw</h4>`);

  let balance = 0;
  $('#payout').change((e)=>{
    if(e.target.value == "Profit Split"){
      $('#payout').removeClass('col-lg-6');
      $('#payout').addClass('col-lg-4');

      $('#mode').removeClass('col-lg-6');
      $('#mode').addClass('col-lg-4');

      $('#account').css('display','block');
    }else if(e.target.value == "Affiliate"){
      $('#payout').addClass('col-lg-6');
      $('#payout').removeClass('col-lg-4');

      $('#mode').removeClass('col-lg-4');
      $('#mode').addClass('col-lg-6');

      $('#account').css('display','none');
      $('#available_amount').text('Availble amount : $83');
    }else if(e.target.value == "Rewards"){
      $('#payout').addClass('col-lg-6');
      $('#payout').removeClass('col-lg-4');

      $('#mode').removeClass('col-lg-4');
      $('#mode').addClass('col-lg-6');

      $('#account').css('display','none');
      $('#available_amount').text('Availble amount : $39');
    }else{
      $('#payout').addClass('col-lg-6');
      $('#payout').removeClass('col-lg-4');

      $('#mode').removeClass('col-lg-4');
      $('#mode').addClass('col-lg-6');

      $('#account').css('display','none');
      $('#available_amount').text('');
    }
  });

  $('#payment-mode').change((e)=>{
    if(e.target.value == "2"){
      $('#bank-details').css('display','block');
    }else{
      $('#bank-details').css('display','none');
    }
  });

  $('#account-numbers').change((e)=>{
    let account  = {};
    account.number  = e.target.value;
    $.ajax({
      type: "POST",
      url: "<?= base_url('user/payout/getAccountBalance'); ?>",
      data: account,
      dataType: "html",
      success: function(data){
        let res = JSON.parse(data);
        balance += res.data[0].balance;
        $('#available_amount').text(`Availble amount : $`+res.data[0].balance);
      },
      error: function() { alert("Error posting feed."); }
    });
  });

  $('#amount').keyup(function(e){
    if(balance < e.target.value){
      console.log(e.target.value);
      // $('amnt-error').removeClass('d-none');
    }
  });

  let user = {};
  user.user_id = "<?= $_SESSION['user_id'] ?>";
  $.ajax({
    type: "POST",
    url: "<?= base_url('user/payout/getAccounts'); ?>",
    data: user,
    dataType: "html",
    success: function(data){
      let res = JSON.parse(data);
      if(res.status == 200){
        $('div#loading').hide(200);
        if(res.data){
          res.data.forEach(element => {
            $('#account-numbers').append(`
              <option value="${element.account_id}">${element.account_id}</option>
            `);
          });
        }
      }else{
        $('#account-numbers').append(`
          <option selected>${res.message}</option>
        `);
      }
    },
    error: function() { alert("Error posting feed."); }
  });
</script>