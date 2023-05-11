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
                      <label for="exampleFormControlSelect1" class="form-label">Payout Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Payout Type</option>
                        <!-- static  -->
                        <option value="Profit Split">Profit Split</option>
                        <option value="Affiliate">Affiliate</option>
                        <option value="Rewards">Rewards</option>
                        <!-- static  -->
                      </select>
                    </div>
                  </div>

                  <!-- will show when profit selected -->
                  <div class="col-lg-4" id="account">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect2" class="form-label">Account Number</label>
                      <select class="form-select" id="exampleFormControlSelect2" aria-label="Default select example">
                        <option selected="">Select Account Number</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <!-- will show when profit selected -->

                  <div class="col-lg-6" id="mode">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect2" class="form-label">Payment Mode</label>
                      <select class="form-select" id="exampleFormControlSelect2" aria-label="Default select example">
                        <option selected="">Select Payment Mode</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label class="form-label d-flex align-items-center" for="basic-default-phone">Amount &nbsp;&nbsp;
                        <span id="available_amount" class="ml-3 text-info text-transform-none float-end"></span></label>
                      <input type="text" id="basic-default-zip" class="form-control phone-mask" placeholder="Enter amount">
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">User Address</label>
                      <input type="text" id="basic-default-zip" class="form-control phone-mask" placeholder="Enter your address">
                    </div>
                  </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
        <h3 class="my-3"></h3>
        <div class="col-xl">
          <div class="card">
            <h5 class="card-header">Withdrawl History</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>05/04/2023</td>
                    <td>$999</td>
                    <td>Free Trial</td>
                    <!-- <td class="text-center"><i class='bx bx-download fs-3' ></i></td> -->
                    <td>
                      <span class="badge bg-label-warning me-1">Pending</span>
                      <span class="badge bg-label-success me-1">Paid</span>
                      <span class="badge bg-label-danger me-1">Denied</span>
                    </td>
                    <!-- <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Bootstrap Table with Header - Light -->
        </div>
      </div>
    <!-- / Content -->

<script>

  $('#account').css('display','none');

  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Payout / Withdraw</h4>`)
  $('#exampleFormControlSelect1').change((e)=>{
    if(e.target.value == "Profit Split"){
      $('#payout').removeClass('col-lg-6');
      $('#payout').addClass('col-lg-4');

      $('#mode').removeClass('col-lg-6');
      $('#mode').addClass('col-lg-4');

      $('#account').css('display','block');
      $('#available_amount').text('Availble amount : $89');

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
</script>
<?php $this->load->view('user/includes/footer');?>