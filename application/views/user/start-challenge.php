<?php
$this->load->view('user/includes/header');
?>

<style>
  label.fw-bold.form-check-label {
    font-size: 20px;
  }
  p.card-title.fw-bold.text-primary {
      font-size: 20px;
  }
  @media (max-width: 992px){
    .card-title, label.fw-bold.form-check-label {
      margin-bottom: 0;
      font-size: 18px !important;
    }
    .nav-align-left>.tab-content {
        border-radius: 0 0.375rem 0.375rem 0.375rem;
        padding: 0;
    }
  }
</style>

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
              <!-- products for aggressive  -->
              <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <div class="row">
                  <div class="col-md-12 col-xl-12">
                    <form id="form" action="<?=base_url('user/')?>payment">
                      <div class="nav-align-left mb-4 row">
                        <ul class="nav nav-pills mb-3 col-lg-6" id="tabs" role="tablist">

                          <?php 
                            foreach($res as $data){
                              if($data['product_category'] == 'Aggressive') {
                          ?>
                          <li class="nav-item">
                            <div class="card bg-white text-dark mb-3" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home<?=@$data['product_id']?>" aria-controls="navs-pills-top-home<?=@$data['product_id']?>" aria-selected="false">
                              <label class="card-body pointer">
                                <div class="form-check d-flex justify-content-between align-items-center">
                                  <div class="d-flex justify-content-start align-items-center">
                                    <input name="product-code" class="form-check-input me-3 product" type="radio" value="<?=@$data['product_id']?>" id="defaultRadio1<?=@$data['product_id']?>">
                                    <div class="d-flex flex-column">
                                      <label class="fw-bold form-check-label" for="defaultRadio1<?=@$data['product_id']?>"><?=@$data['product_name']?></label>
                                    </div>
                                  </div>
                                  <p class="card-title fw-bold text-primary">$<?=@$data['account_size']?></p>
                                </div>
                              </label>
                            </div>
                          </li>
                          <?php 
                              }
                            } 
                          ?>

                        </ul>
                        <div id="contents" class="tab-content shadow-none col-lg-6">
                          <?php 
                            foreach($res as $data){ 
                              if($data['product_category'] == 'Aggressive') {
                          ?>

                            <div class="tab-pane fade" id="navs-pills-top-home<?=@$data['product_id']?>" role="tabpanel">
                              <div class="col-md-12 col-xl-12">
                                <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                  <div class="card-body">
                                    <div class="card-text">Objectives</div><br>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Maximum Drawdown <strong> - $<?=@$data['max_drawdown']?></strong> </p>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 1 <strong>  - $<?=@$data['p1_target']?></strong></p>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 2 <strong>  - $<?=@$data['p2_target']?></strong></p>
                                  </div>
                                </div>

                                <div class="card shadow-none bg-transparent mb-3  align-items-center d-flex">
                                  <div class="card-body">
                                    <p class="card-text align-items-center d-flex flex-column fw-bold">Your Total Pricing<br/>
                                      <span class="fw-bold text-primary" style="font-size:1.5rem">$<?=@$data['product_price']?></span>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          <?php 
                              }
                            } 
                          ?>
                        </div>
                      </div>

                      <div class="row">
                        <button type="submit"  class="btn submit btn-primary col-lg-6">Buy Now</button>
                      </div>
                    </form>
                  </div>
                </div> 
              </div>
              <!-- end aggressive -->

              <!-- products for Normal  -->
              <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <div class="row">
                  <div class="col-md-12 col-xl-12">
                    <form id="form2" action="<?=base_url('user/')?>payment">
                      <div class="nav-align-left mb-4 row">
                        <ul class="nav nav-pills mb-3 col-lg-6" id="normalTabs" role="tablist">
                          <?php foreach($res as $data){if($data['product_category'] == 'Normal') {?>
                            <li class="nav-item">
                              <div class="card bg-white text-dark mb-3" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home<?=@$data['product_id']?>" aria-controls="navs-pills-top-home<?=@$data['product_id']?>" aria-selected="false">
                                <label class="card-body pointer">
                                  <div class="form-check d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                      <input name="product-code" class="form-check-input me-3 product" type="radio" value="<?=@$data['product_id']?>" id="defaultRadio1<?=@$data['product_id']?>">
                                      <div class="d-flex flex-column">
                                        <label class="fw-bold form-check-label" for="defaultRadio1<?=@$data['product_id']?>"><?=@$data['product_name']?></label>
                                      </div>
                                    </div>
                                    <p class="card-title fw-bold text-primary">$<?=@$data['account_size']?></p>
                                  </div>
                                </label>
                              </div>
                            </li>
                          <?php }} ?>
                        </ul>
                        <div id="normal-contents" class="tab-content shadow-none col-lg-6">
                          <?php foreach($res as $data){ if($data['product_category'] == 'Normal') {?>

                            <div class="tab-pane fade" id="navs-pills-top-home<?=@$data['product_id']?>" role="tabpanel">
                              <div class="col-md-12 col-xl-12">
                                <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                  <div class="card-body">
                                    <div class="card-text">Objectives</div><br>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Maximum Drawdown <strong> - $<?=@$data['max_drawdown']?></strong></p>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Daily Drawdown <strong> - $<?=@$data['daily_drawdown']?> </strong></p>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 1 <strong>  - $<?=@$data['p1_target']?></strong></p>
                                    <p class="card-text align-items-center d-flex"><i class='text-primary bx bxs-check-circle'></i>&nbsp;&nbsp;Profit Target Phase 2 <strong>  - $<?=@$data['p2_target']?></strong></p>
                                  </div>
                                </div>

                                <div class="card shadow-none bg-transparent mb-3  align-items-center d-flex">
                                  <div class="card-body">
                                    <p class="card-text align-items-center d-flex flex-column fw-bold">Your Total Pricing<br/>
                                      <span class="fw-bold text-primary" style="font-size:1.5rem">$<?=@$data['product_price']?></span>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          <?php }} ?>
                      </div>
                      <div class="row">
                        <button type="submit"  class="btn submit-n btn-primary col-lg-6">Buy Now</button>
                      </div>
                    </form>
                  </div>
                </div> 
              </div>
              <!-- end Nomal -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

<script>
  // $('.submit').prop('disabled', true);

  // $("input[name=product-code]").change(function(){
  //   if($(this).is(':checked')){
  //     $('.submit').prop('disabled', false);
  //   }
  // });

  // $('.submit-n').prop('disabled', true);

  // $("input[name=normal-product-code]").change(function(){
  //   if($(this).is(':checked')){
  //     $('.submit-n').prop('disabled', false);
  //   }
  // });

  // tabs
  $('ul#tabs li input').each(function(i) {
    if ( i === 0 ) {
      $(this).attr('checked', true);
    }
  });
  
  $('#contents .tab-pane').each(function(i) {
    if ( i === 0 ) {
      $(this).addClass('active');
      $(this).addClass('show');
    }
  });

  // normal tabs
  $('ul#normalTabs li input').each(function(i) {
    if ( i === 0 ) {
      $(this).attr('checked', true);
    }
  });
  
  $('#normal-contents .tab-pane').each(function(i) {
    if ( i === 0 ) {
      $(this).addClass('active');
      $(this).addClass('show');
    }
  });
  

  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Start New Challenge</h4>`);

  
</script>
<?php $this->load->view('user/includes/footer');?>