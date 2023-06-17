<?php
// echo "<pre>";
// print_r($res[0]['kyc_status']);
// die;

$this->load->view('user/includes/header');
?>
<style>
  .table-responsive{
    padding: 1rem;
  }
  a.paginate_button.current {
    border: none !important;
    background: transparent !important;
    color: blue !important;
}
</style>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <?php if($res[0]['kyc_status'] == 0 || $res[0]['kyc_status'] == 2 ||  $res[0]['kyc_status'] == 3){  ?>
          <span class="badge bg-label-warning mx-auto my-3 fs-5" style="text-transform : none">You can't request a payout as your KYC is not completed !</span>
          <?php }elseif ($res[0]['kyc_status'] == 1) { ?>
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-receipt"></i>Withdraw your earnings</h5>
            </div>
            <div class="card-body">
              <form id="payout-form">
                <input type="hidden" id="userId" class="form-control phone-mask" name="user_id" value="<?= $_SESSION['user_id']?>">

                <div class="row">
                  <div class="col-lg-6" id="payout">
                    <div class="mb-3">
                      <label for="payout-type" class="form-label">Payout Type</label>
                      <select required class="form-select" id="payout-type" name="payoutType" aria-label="Default select example">
                        <option selected="">Select Payout Type</option>
                        <option value="Profit Split">Profit Split</option>
                        <!-- <option value="Affiliate">Affiliate</option> -->
                        <!-- <option value="Rewards">Games & Rewards</option> -->
                      </select>
                    </div>
                  </div>

                  <!-- will show when profit selected -->
                  <div class="col-lg-4" id="account">
                    <div class="mb-3">
                      <label for="account-numbers" class="form-label">Account Number</label>
                      <select required class="form-select" id="account-numbers" name="mt5Acc" aria-label="Default select example">
                        <option>Select Account Number</option>
                      </select>
                    </div>
                  </div>
                  <!-- will show when profit selected -->

                  <div class="col-lg-6" id="mode">
                    <div class="mb-3">
                      <label for="payment-mode" class="form-label">Payment Mode</label>
                      <select required class="form-select" id="payment-mode" name="paymentMode" aria-label="Default select example">
                        <option selected="">Select Payment Mode</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Crypto Currency">Crypto Currency</option>
                        <option value="Paypal">Paypal</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label d-flex align-items-center" for="amount">Amount &nbsp;&nbsp;
                        <span id="available_amount" class="ml-3 text-info text-transform-none float-end"></span></label>
                        <input required type="number" id="amount" class="form-control phone-mask" name="payoutAmount" placeholder="Enter amount">
                        <p class="amnt-error d-none text-danger">You dont have enough balance</p>
                    </div>
                  </div>

                  <div class="col-lg-6" id="wallet">
                    <div class="mb-3">
                      <label class="form-label" for="walletAddress">Email / Wallet Address</label>
                      <input required type="text" id="walletAddress" class="form-control phone-mask" name="emailWalletAddress" placeholder="Enter your address">
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
                        <input type="text" id="receipant-name" class="form-control phone-mask" name="receipantName" placeholder="Enter Receipant Name">
                      </div>
                    </div>
  
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Receipant Address &nbsp;&nbsp;
                          <span id="receipant-address" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="receipant-address" class="form-control phone-mask" name="receipantAddress" placeholder="Enter Receipant Address">
                      </div>
                    </div>
  
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Account Number/IBAN&nbsp;&nbsp;
                          <span id="iban" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="iban" class="form-control phone-mask" name="accountNumber" placeholder="Enter Account Number/IBAN">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Sortcode/ABN/Routing Code&nbsp;&nbsp;
                          <span id="sort-code" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="sort-code" class="form-control phone-mask" name="sortCode" placeholder="Enter Sortcode/ABN/Routing Code">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Swift Code&nbsp;&nbsp;
                          <span id="swift-code" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="swift-code" class="form-control phone-mask" name="swiftCode" placeholder="Enter Swift Code">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Bank Name&nbsp;&nbsp;
                          <span id="bank-name" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="bank-name" class="form-control phone-mask" name="bankName" placeholder="Enter Bank Name">
                      </div>
                    </div>
  
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label d-flex align-items-center" for="amount">Branch Address&nbsp;&nbsp;
                          <span id="branch_address" class="ml-3 text-info text-transform-none float-end"></span>
                        </label>
                        <input type="text" id="branch_address" class="form-control phone-mask" name="branchAddress" placeholder="Enter Branch Address">
                      </div>
                    </div>  
                  </div>
                </div>
                <button id="submit-btn" type="submit" class="w-100 btn btn-primary">Request Payout</button>
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
                  <!-- <tr>
                    <td>05/04/2023</td>
                    <td>$999</td>
                    <td>Free Trial</td>
                    <td>
                      <span class="badge bg-label-warning me-1">Pending</span>
                      <span class="badge bg-label-success me-1">Paid</span>
                      <span class="badge bg-label-danger me-1">Denied</span>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
      <?php $this->load->view('user/includes/footer');?>

<script>

  $('#account').css('display','none');
  $('#bank-details').css('display','none');

  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Payout / Withdraw</h4>`);

  let accBalance = 0;
  $('#payout').change((e)=>{
    if(e.target.value == "Profit Split"){
      $('#available_amount').text('');
      $('#payout').removeClass('col-lg-6');
      $('#payout').addClass('col-lg-4');

      $('#mode').removeClass('col-lg-6');
      $('#mode').addClass('col-lg-4');

      $('#account').css('display','block');

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
            $('#account-numbers').html('');
            $('#account-numbers').html('<option>Select Account Number</option>');
            if(res.data){
              res.data.forEach(element => {
                $('#account-numbers').append(`
                  <option value="${element.account_id}">${element.account_id}</option>
                `);
              });
            }
          }else{
            $('#account-numbers').html('');
            $('#submit-btn').attr('disabled', true);
            $('input').attr('disabled', true);
            $('#payment-mode').attr('disabled', true);
            $('#account-numbers').append(`
              <option selected>${res.message}</option>
            `);
          }
        },
        error: function() { alert("Error posting feed."); }
      });
    }else if(e.target.value == "Affiliate"){
      $('.amnt-error').addClass('d-none');
      $('#submit-btn').attr('disabled', false);
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
    if(e.target.value == "Bank Transfer"){
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

        if(res.status == 200){
          accBalance = Number(res.data[0].balance);
          console.log(accBalance.toFixed(2));
          if(res.data[0].balance == "0.000000"){
            $('#available_amount').html(`<span class="text-danger">You don't have enough amount to withdraw !</span>`);
            $('#amount').attr('disabled', true);
            $('#submit-btn').attr('disabled', true);
          }else{
            $('#available_amount').html(`Availble amount : $`+accBalance.toFixed(2));
            // $('#available_amount').html(`Availble amount : $`+accBalance.toFixed(2)+` You get ($${(accBalance.toFixed(2) * 80)/100})`);
            $('#amount').attr('disabled', false);
            $('#submit-btn').attr('disabled', false);
          }
        }else{
          $('.amnt-error').text(res.message);
          $('.amnt-error').removeClass('d-none');
          $('#submit-btn').attr('disabled', true);
        }
      },
      error: function() { alert("Error posting feed."); }
    });
  });

  $('#amount').keyup(function(e){
    if(accBalance < e.target.value){
      console.log(e.target.value);
      $('.amnt-error').removeClass('d-none');
    }else{
      $('.amnt-error').addClass('d-none');
    }
  });


  $('#payout-form').on('submit',(e)=>{
    e.preventDefault();
    var form = $('#payout-form').serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/payout/requestPayout'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('#payout-form').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('#payout-form')[0].reset();
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            loadTable();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }
        },
        error: function() { alert("Error posting feed."); }
    });
  });

  function loadTable(){
    $('.table').DataTable().destroy();
    $('.table').DataTable({
        ajax: "<?php echo base_url('user/payout/getPayouts'); ?>",
        deferRender: true,
        searching: false, paging: false, info: false,
        // "pageLength": 100,
        columns:[
          {data:'payout_date'},
          {
            data: null,
            render: function (data, type, row) {
                return `${(Number(row.amount)).toFixed(2)}`;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `${row.payout_type}`;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `${
                  row.payout_status == 0 ? '<span class="badge bg-label-warning">Pending</span>' : 
                  (row.payout_status == 1 ? '<span class="badge bg-label-success">PAID</span>' : 
                    (row.payout_status == 2 ? '<span class="badge bg-label-danger">DENIED</span>' :'')
                  )
                }`;
            }
          }
        ]
    });
  }

  loadTable();
  // setInterval(() => {
  //   loadTable();
    
  // }, 5000);
  $('.paginate_button').addClass('btn btn-primary');
</script>