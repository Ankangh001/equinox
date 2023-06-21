<?php 
// echo "<pre>";
// print_r($res);
// exit;
$this->CI = & get_instance();
$this->load->view('user/includes/header');
?>

<style>
  .accordion-button.collapsed {
    border-radius: 0.375rem;
    box-shadow: 0 0 5px #00000050;
}

.ribbon {
  display: block;
  position: relative;
  overflow: hidden;
}

.ribbons span {
  width: 150px;
  height: 22px;
  top: 9px;
  right: -58px;
  position: absolute;
  display: block;
  /* background: #FF0000; */
  color: #333;
  font-family: arial;
  font-size: 10px;
  color: white;
  text-align: center;
  line-height: 16px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  font-weight: bold;
  letter-spacing: 1px;
}
  @media (max-width: 786px){
    .mob-acc {
      display: none !important;
      justify-content: center;
    }
    button{
      font-size: 13px !important;
      justify-content:center;
    }
    button span{
      margin:5px;
    }
    .cred-holder{
      display:flex;
    }
  }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
<?php if(!empty($res)){?>
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="accordion mt-3" id="accordionExample">

      <!-- Evaluation Phase 1 -->
      <?php 
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '1'){
              echo '<div class="card-title fw-bold">Evaluation Phase 1</div>';
              break;  
            }
          };
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '1'){
      ?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
            <button type="button" class="bg-light text-dark fw-bold p-3 accordion-button d-flex <?php if(isset($_GET['id'])){ if($_GET['id'] != $value['id']){ echo "collapsed";  } } ?>" data-bs-toggle="collapse" data-bs-target="#accordionOne_<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne_<?= @$value['id'] ?>">
              <span class="col-lg-2 col-md-2">Login :  <?= @$value['account_id'] ? $value['account_id'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
              <div class="closed-details row col-lg-8">
                <span class="col-lg-2 col-md-2 mob-acc"><?= @$value['product_category'] ? $value['product_category'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2">$<?= @$value['account_size'] ? number_format($value['account_size'], 0, '.',',') : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2"><?php if($value['product_status'] == '0'){ ?>
                    <span class="badge bg-warning text-white me-1">PENDING</span>
                  <?php }elseif($value['product_status'] == '1'){ ?>
                    <span class="badge bg-primary text-white me-1">ACTIVE</span>
                  <?php }elseif($value['product_status'] == '2'){?>
                    <span class="badge bg-success text-white me-1">PASSED</span>
                  <?php }elseif($value['product_status'] == '3'){?>
                    <span class="badge bg-danger text-white me-1">FAILED</span>
                  <?php }?>
                </span>
              </div>
            </button>
          </h2>
          <div id="accordionOne_<?= @$value['id'] ?>" class="accordion-collapse 
            <?php if(isset($_GET['id'])){
                    if($_GET['id'] == $value['id']){
                      echo "show";
                    }
                  }
            ?> collapse" data-bs-parent="#accordionExample">
            <div class="modal fade" id="modalCenter<?= @$value['id'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['account_id'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
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
                      <div class="row">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $<?= @$value['account_size'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['start_date'],0,10) == '0000-00-00' ? '': substr($value['start_date'],0,10)?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['end_date'],0,10) == '0000-00-00' ? '': substr($value['end_date'],0,10)?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">ACTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left cred-holder">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary"
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                          >
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <?php 
                            $ecryptedData = $this->CI->encrypt(
                              $value['account_id'].','.
                              $value['account_password'].','.
                              $value['account_size'].','.
                              $value['product_category'].','.
                              $value['max_drawdown'].','.
                              $value['daily_drawdown'].','.
                              $value['p1_target'].','.
                              $value['ip'].','.
                              $value['port'].','.
                              $value['id'].','.
                              $value['phase']
                              ,"mm"
                            );
                          ?>
                          <a href="<?= base_url('user/metrix?account=').$ecryptedData?>" 
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                            class="btn btn-sm btn-outline-primary">
                          &nbsp;&nbsp;<i class='bx bx-line-chart-down p-1 fs-3 text-dark' ></i>&nbsp;&nbsp;&nbsp;Metrics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } }?>


      <!-- Evaluation Phase 2 -->
      <?php 
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '2'){
              echo '<div class="card-title fw-bold">Evaluation Phase 2</div>';
              break;  
            }
          };
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '2'){
      ?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
          <button type="button" class="bg-light text-dark fw-bold p-3 accordion-button d-flex <?php if(isset($_GET['id'])){ if($_GET['id'] != $value['id']){ echo "collapsed";  } } ?>" data-bs-toggle="collapse" data-bs-target="#accordionOne_<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne_<?= @$value['id'] ?>">
              <span class="col-lg-2 col-md-2">Login :  <?= @$value['account_id'] ? $value['account_id'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
              
              <div class="closed-details  row col-lg-8">
                <span class="col-lg-2 col-md-2 mob-acc"><?= @$value['product_category'] ? $value['product_category'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2">$<?= @$value['account_size'] ? number_format($value['account_size'], 0, '.',',') : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2"><?php if($value['product_status'] == '0'){ ?>
                    <span class="badge bg-warning text-white me-1">PENDING</span>
                  <?php }elseif($value['product_status'] == '1'){ ?>
                    <span class="badge bg-primary text-white me-1">ACTIVE</span>
                  <?php }elseif($value['product_status'] == '2'){?>
                    <span class="badge bg-success text-white me-1">PASSED</span>
                  <?php }elseif($value['product_status'] == '3'){?>
                    <span class="badge bg-danger text-white me-1">FAILED</span>
                  <?php }?>
                </span>
              </div>
            </button>
          </h2>
          <div id="accordionOne_<?= @$value['id'] ?>" class="accordion-collapse 
            <?php if(isset($_GET['id'])){
                    if($_GET['id'] == $value['id']){
                      echo "show";
                    }
                  }
            ?> collapse" data-bs-parent="#accordionExample">
            <div class="modal fade" id="modalCenter<?= @$value['id'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['account_id'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
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
                      <div class="row">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Account size: &nbsp; $<?= @$value['account_size'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp; <?= substr($value['start_date'],0,10) == '0000-00-00' ? '': substr($value['start_date'],0,10)?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp; <?= substr($value['end_date'],0,10) == '0000-00-00' ? '': substr($value['end_date'],0,10)?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp; <?= @$value['product_category'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;<span class="badge bg-primary text-white me-1">ACTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;<span class="badge bg-success text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left cred-holder cred-holder">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary"
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                          >
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <?php 
                            $ecryptedData = $this->CI->encrypt(
                              $value['account_id'].','.
                              $value['account_password'].','.
                              $value['account_size'].','.
                              $value['product_category'].','.
                              $value['max_drawdown'].','.
                              $value['daily_drawdown'].','.
                              $value['p2_target'].','.
                              $value['ip'].','.
                              $value['port'].','.
                              $value['id'].','.
                              $value['phase']
                              ,"mm"
                            );
                          ?>
                          <a href="<?= base_url('user/metrix?account=').$ecryptedData?>" 
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                            class="btn btn-sm btn-outline-primary">
                          &nbsp;&nbsp;<i class='bx bx-line-chart-down p-1 fs-3 text-dark' ></i>&nbsp;&nbsp;&nbsp;Metrics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } }?>

      <!-- Evaluation Funded -->
      <?php 
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '3'){
              echo '<div class="card-title fw-bold">Evaluation Funded</div>';
              break;  
            }
          };
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '3'){
      ?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
          <button type="button" class="bg-light text-dark fw-bold p-3 accordion-button d-flex <?php if(isset($_GET['id'])){ if($_GET['id'] != $value['id']){ echo "collapsed";  } } ?>" data-bs-toggle="collapse" data-bs-target="#accordionOne_<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne_<?= @$value['id'] ?>">
              <span class="col-lg-2 col-md-2">Login :  <?= @$value['account_id'] ? $value['account_id'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
              <div class="closed-details  row col-lg-8">
              
                <span class="col-lg-2 col-md-2 mob-acc"><?= @$value['product_category'] ? $value['product_category'] : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2">$<?= @$value['account_size'] ? number_format($value['account_size'], 0, '.',',') : "<span style='color:#fff'>12345&nbsp;&nbsp;&nbsp;&nbsp;</span>" ?></span>
                <span class="col-lg-2 col-md-2"><?php if($value['product_status'] == '0'){ ?>
                    <span class="badge bg-warning text-white me-1">PENDING</span>
                  <?php }elseif($value['product_status'] == '1'){ ?>
                    <span class="badge bg-primary text-white me-1">ACTIVE</span>
                  <?php }elseif($value['product_status'] == '2'){?>
                    <span class="badge bg-success text-white me-1">PASSED</span>
                  <?php }elseif($value['product_status'] == '3'){?>
                    <span class="badge bg-danger text-white me-1">FAILED</span>
                  <?php }?>
                </span>
              </div>
            </button>
          </h2>
          <div id="accordionOne_<?= @$value['id'] ?>" class="accordion-collapse 
            <?php if(isset($_GET['id'])){
                    if($_GET['id'] == $value['id']){
                      echo "show";
                    }
                  }
            ?> collapse" data-bs-parent="#accordionExample">
            <div class="modal fade" id="modalCenter<?= @$value['id'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['account_id'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
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
                      <div class="row">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $<?= @$value['account_size'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['start_date'],0,10) == '0000-00-00' ? '': substr($value['start_date'],0,10)?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['end_date'],0,10) == '0000-00-00' ? '': substr($value['end_date'],0,10)?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">ACTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left cred-holder">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary"
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                          >
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <?php 
                            $ecryptedData = $this->CI->encrypt(
                              $value['account_id'].','.
                              $value['account_password'].','.
                              $value['account_size'].','.
                              $value['product_category'].','.
                              $value['max_drawdown'].','.
                              $value['daily_drawdown'].','.
                              $value['profit_target'].','.
                              $value['ip'].','.
                              $value['port'].','.
                              $value['id'].','.
                              $value['phase']
                              ,"mm"
                            );
                          ?>
                          <a href="<?= base_url('user/metrix?account=').$ecryptedData?>" 
                            <?php if($value['account_id'] == ''){?> 
                              style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                            <?php }?> 
                            class="btn btn-sm btn-outline-primary">
                          &nbsp;&nbsp;<i class='bx bx-line-chart-down p-1 fs-3 text-dark' ></i>&nbsp;&nbsp;&nbsp;Metrics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } }?>
    </div>
  </div>

<?php }else{ ?>
      <div class="row my-5 mx-auto">
        <div class="col-md-12 m-auto">
          <div class="card">
              <div class="card-body text-center text-muted ">
                😧 Hey ! Looks like you have no account yet .<br /><br />
                <!-- <a href="<?=base_url('user')?>" >click here</a> to get started with a free trial account or -->
                 &nbsp;&nbsp;<a href="<?=base_url('user/')?>start-new-challenge" class="btn btn-primary btn-sm"> Start New Challenge</a>
              </div>
          </div>
        </div>
      </div>
  <?php } ?>
    <!-- / Content -->



<?php $this->load->view('user/includes/footer');?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Account Overview</h4>`);
  let requestData = {};
  requestData.uid = "<?= $_SESSION['user_id']?>";

  let getId = "<?= $_GET['id'] ?? ''?>";
  function getAccounts(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/account/getAccounts'); ?>",
      data: requestData,
      dataType: "html",
      success: function(data){
        let res = JSON.parse(data);
        if(res.status == 200){
          console.log(res);
          res.data.forEach(element => {
            $('#accordionExample').html('');
            $('#accordionExample').append(`
                ${
                  element.phase == '1' ?
                  (`
                    <div class="card accordion-item mb-5">
                      <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="bg-light text-dark fw-bold p-3  accordion-button" 
                        data-bs-toggle="collapse" data-bs-target="#accordionOne_<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne_<?= @$value['id'] ?>">
                          Login :  ${element.account_id}
                        </button>
                      </h2>
                      <div id="accordionOne_${element.id}" class="accordion-collapse  show data-bs-parent="#accordionExample">
                          <div class="modal fade" id="modalCenter<?= @$value['id'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">${element.account_id}</label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                                      </div>
                                      <div class="mb-3 row border-bottom justfy-content-evenly">
                                        <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password                          </label>
                                        <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                                          ${element.account_password}
                                          <!-- <i class='bx bxs-low-vision'></i> -->
                                        </label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                                      </div>
                                      
                                      <div class="mb-3 row border-bottom justfy-content-evenly">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">${element.server}</label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
                                      </div>

                                      <div class="mb-3 row border-bottom justfy-content-evenly">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                                        <label for="html5-text-input" class="col-md-4 text-right col-form-label"></label>
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
                                    <div class="row">
                                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $<?= @$value['account_size'] ?></label>
                                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['start_date'],0,10) == '0000-00-00' ? '': substr($value['start_date'],0,10)?></label>
                                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; <?= substr($value['end_date'],0,10) == '0000-00-00' ? '': substr($value['end_date'],0,10)?></label>
                                    </div>
                                    <div class="row mb-3">
                                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                                        ${
                                          element.product_status == '0' ? ('Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>') :
                                              (element.product_status == '1' ? 'Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">ACTIVE</span>':
                                                element.product_status == '2' ? 'Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">PASSED</span>':
                                                  element.product_status == '3' ? 'Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>':'')
                                        }                         
                                      </label>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-6 text-left">
                                        <button data-bs-toggle="modal" data-bs-target="#modalCenter${element.id}" class="me-3 btn btn-sm btn-outline-primary">
                                          <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                                        </button>
                                        <a href="" style="pointer-events: none; opacity: 0.5; background: #696cff; color: #ffffff; border: 2px solid #696cff; cursor: not-allowed;" 
                                          class="btn btn-sm btn-outline-primary">
                                        &nbsp;&nbsp;<i class='bx bx-line-chart-down p-1 fs-3 text-dark' ></i>&nbsp;&nbsp;&nbsp;Metrics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  `) :
                  element.phase == '2' ?
                  (`<div class="card-title fw-bold">Evaluation Phase 2</div>`) :
                  element.phase == '3' ?
                  (`<div class="card-title fw-bold">Evaluation Funded</div>`) :''                  
                }
            `);
            console.log(element.account_id);
          });
        }
      },
      error: function() { 
        alert("Error posting feed."); 
      }
    });
  }

  function withJquery(){
    console.time('time1');
    var temp = $("<input>");
    $("body").append(temp);
    temp.val($('#copyText1').text()).select();
    document.execCommand("copy");
    temp.remove();
    console.timeEnd('time1');
  }
  
  
  $("button").click(function(){
    if($(this).hasClass('collapsed')){
      $(this).children().eq(1).css('display', 'block');
    }else{
      console.log($(this).children().eq(1));
      $(this).children().eq(1).css('display', 'none');
    }
  });

  // setInterval(() => {
  //   getAccounts();
  // }, 1000);
</script>
</body>
</html>