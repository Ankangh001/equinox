<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false">
                  Aggressive
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                  Normal
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <!-- products for aggressive  -->
                <div class="row">
                  <div class="col-md-6 col-xl-6">
                  <form id="form" action="<?=base_url('user/')?>payment">
                    <?php 
                      foreach($res as $data){
                        if($data['product_category'] == 'Aggressive') {
                    ?>
                      <div class="card bg-white text-dark mb-3">
                          <label class="card-body pointer">
                            <div class="form-check d-flex justify-content-between align-items-center">
                              <div class="d-flex justify-content-start align-items-center">
                                <input name="product-code" class="form-check-input me-3 product" type="radio" value="<?php echo $data['product_id'] ?>" id="defaultRadio1">
                                <div class="d-flex flex-column">
                                  <label class="fw-bold form-check-label" for="defaultRadio1"><?php echo $data['product_name'] ?></label>
                                  <!-- <label class="form-check-label fw-bold" for="defaultRadio1"> One Time Fund </label> -->
                                </div>
                              </div>
                              <p class="card-title fw-bold text-primary">$<?php echo $data['account_size'] ?></p>
                            </div>
                          </label>
                      </div>
                    <?php }} ?>
                    <button type="submit" class="btn submit btn-primary w-100">Buy Now</button>
                    </form>
                  </div>
                  <!-- end aggressive -->
                  <div class="col-md-6 col-xl-6">
                    <div class="card shadow-none bg-transparent border border-secondary mb-3">
                      <div class="card-body">
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;$5000 Daily Drawdown</p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;$10,000 Daily Drawdown</p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 1 <strong>  - $200</strong></p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 2 <strong>  - $500</strong></p>
                      </div>
                    </div>

                    <div class="card shadow-none bg-transparent mb-3  align-items-center d-flex">
                      <div class="card-body">
                        <p class="card-text align-items-center d-flex flex-column fw-bold">Your Total Pricing<br/>
                          <span class="fw-bold text-primary" style="font-size:1.5rem">$999</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <!-- products for Normal  -->
                <div class="row">
                  <div class="col-md-6 col-xl-6">
                    <form id="form" action="<?=base_url('user/')?>payment">
                      <?php 
                      foreach($res as $data){
                        if($data['product_category'] == 'Normal') {
                      ?>
                      <div class="card bg-white text-dark mb-3">
                          <label class="card-body pointer">
                            <div class="form-check d-flex justify-content-between align-items-center">
                              <div class="d-flex justify-content-start align-items-center">
                                <input name="normal-product-code" required class="form-check-input me-3 product" type="radio" value="<?php echo $data['product_id'] ?>" id="defaultRadio1<?php echo $data['product_id'] ?>">
                                <div class="d-flex flex-column">
                                  <label class="fw-bold form-check-label" for="defaultRadio1<?php echo $data['product_id'] ?>"><?php echo $data['product_name'] ?></label>
                                </div>
                              </div>
                              <p class="card-title fw-bold text-primary">$<?php echo $data['account_size'] ?></p>
                            </div>
                          </label>
                      </div>
                    <?php }} ?>
                    <button type="submit" class="btn submit-n btn-primary w-100">Buy Now</button>
                  </div>
                      </form>
                  <!-- end Nomal -->
                  <div class="col-md-6 col-xl-6">
                    <div class="card shadow-none bg-transparent border border-secondary mb-3">
                      <div class="card-body">
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Two step assesment process</p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;5% Daily Drawdown</p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;10% Daily Drawdown</p>
                        <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;5 Trading Days</p>
                      </div>
                    </div>

                    <div class="card shadow-none bg-transparent mb-3  align-items-center d-flex">
                      <div class="card-body">
                        <p class="card-text align-items-center d-flex flex-column fw-bold">Your Total Pricing<br/>
                          <span class="fw-bold text-primary" style="font-size:1.5rem">$999</span>
                        </p>
                      </div>
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

<script>
  $('.submit').prop('disabled', true);

  $("input[name=product-code]").change(function(){
    if($(this).is(':checked')){
      $('.submit').prop('disabled', false);
    }
  });

  $('.submit-n').prop('disabled', true);

  $("input[name=normal-product-code]").change(function(){
    if($(this).is(':checked')){
      $('.submit-n').prop('disabled', false);
    }
  });

  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Start New Challenege</h4>`);

  
</script>
<?php $this->load->view('user/includes/footer');?>