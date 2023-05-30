<?php 
// print_r($res);die;

//   $this->CI = & get_instance();
//  print_r($this->CI->encryptAES('hi') );
//  print_r($this->CI->decryptAES('h1IwXyBRYLy1cbPP39FpnQ==') );
//   die;
?>

<?php $this->load->view('user/includes/header');?>

<style>
  .accordion-button.collapsed {
    border-radius: 0.375rem;
    box-shadow: 0 0 5px #00000050;
}
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
<?php if(!empty($res)){?>
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="accordion mt-3" id="accordionExample">
      <!-- Free Trial -->
      <?php 
        foreach ($res as $key => $value) { 
          if ($value['phase'] == '0'){
            echo '<div class="card-title fw-bold">Free Trial</div>';
            break;  
          }
        };
        foreach ($res as $key => $value) { if ($value['phase'] == '0'){?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
            <button type="button" class="bg-light text-dark fw-bold p-3  accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne<?= @$value['id'] ?>">
              Login :  <?= @$value['account_id'] ?>
            </button>
          </h2>

          <div id="accordionOne<?= @$value['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password
                            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                              <i class='bx bx-info-circle' ></i>
                            </span>
                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo substr($value['created_date'],0,10)?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">ACTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary">
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <a href="<?=base_url('user/metrix?account='.@$value['account_id'].'&size='.@$value['account_size'].'&type='.strtolower(@$value['product_category']).'&max='.@$value['max_drawdown'].'&daily='.@$value['daily_drawdown'].'&target='.@$value['profit_target'].'')?>" class="btn btn-sm btn-outline-primary">
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
            <button type="button" class="bg-light text-dark fw-bold p-3  accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne<?= @$value['id'] ?>">
              Login :  <?= @$value['account_id'] ?>
            </button>
          </h2>
          <div id="accordionOne<?= @$value['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password
                            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                              <i class='bx bx-info-circle' ></i>
                            </span>
                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
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
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; 01/02/2023</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">ACTTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary">
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <a href="<?=base_url('user/metrix?account='.@$value['account_id'].'&size='.@$value['account_size'].'&type='.strtolower(@$value['product_category']).'&max='.@$value['max_drawdown'].'&daily='.@$value['daily_drawdown'].'&target='.@$value['profit_target'].'')?>" class="btn btn-sm btn-outline-primary">
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
        }
        foreach ($res as $key => $value) { 
          if ($value['phase'] == '2'){
      ?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
            <button type="button" class="bg-light text-dark fw-bold p-3  accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne<?= @$value['id'] ?>">
              Login :  <?= @$value['account_id'] ?>
            </button>
          </h2>
          <div id="accordionOne<?= @$value['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password
                            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                              <i class='bx bx-info-circle' ></i>
                            </span>
                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
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
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; 01/02/2023</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">ACTTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary">
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <a href="<?=base_url('user/metrix?account='.@$value['account_id'].'&size='.@$value['account_size'].'&type='.strtolower(@$value['product_category']).'&max='.@$value['max_drawdown'].'&daily='.@$value['daily_drawdown'].'&target='.@$value['profit_target'].'')?>" class="btn btn-sm btn-outline-primary">
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
      <?php 
          } 
        }
      ?>

      <!-- Evaluation Funded -->
      <?php 
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '3'){
              echo '<div class="card-title fw-bold">Evaluation Funded</div>';
              break;  
            }
          }
          foreach ($res as $key => $value) { 
            if ($value['phase'] == '3'){
      ?>
        <div class="card accordion-item mb-5">
          <h2 class="accordion-header" id="headingOne">
            <button type="button" class="bg-light text-dark fw-bold p-3  accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne<?= @$value['id'] ?>" aria-expanded="false" aria-controls="accordionOne<?= @$value['id'] ?>">
              Login :  <?= @$value['account_id'] ?>
            </button>
          </h2>
          <div id="accordionOne<?= @$value['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label d-flex">Password
                            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                              <i class='bx bx-info-circle' ></i>
                            </span>
                          </label>
                          <label for="html5-text-input" style="text-transform: none;" class="col-md-4 text-right col-form-label">
                            <?= @$value['account_password'] ?>
                            <!-- <i class='bx bxs-low-vision'></i> -->
                          </label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                        
                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Server</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><?= @$value['server'] ?></label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>

                        <div class="mb-3 row border-bottom justfy-content-evenly">
                          <label for="html5-text-input" class="col-md-4 col-form-label">Platform</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label">Meta Trader 5</label>
                          <label for="html5-text-input" class="col-md-4 text-right col-form-label"><i class='bx bx-copy' ></i></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
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
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Type: &nbsp;&nbsp;&nbsp;&nbsp; <?= @$value['product_category'] ?></label>
                      </div>
                      <div class="row mb-3">
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">End Date: &nbsp;&nbsp;&nbsp;&nbsp; 01/02/2023</label>
                        <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">
                          <?php if($value['product_status'] == '0'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-warning text-white me-1">PENDING</span>
                          <?php }elseif($value['product_status'] == '1'){ ?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-success text-white me-1">ACTTIVE</span>
                          <?php }elseif($value['product_status'] == '2'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-primary text-white me-1">PASSED</span>
                          <?php }elseif($value['product_status'] == '3'){?>
                            Status: &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-danger text-white me-1">FAILED</span>
                          <?php }?>
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-lg-6 text-left">
                          <button data-bs-toggle="modal" data-bs-target="#modalCenter<?= @$value['id'] ?>" class="me-3 btn btn-sm btn-outline-primary">
                            <i class='bx bxs-key p-1 fs-3 text-dark'></i>Credentials
                          </button>
                          <a href="<?=base_url('user/metrix?account='.@$value['account_id'].'&size='.@$value['account_size'].'&type='.strtolower(@$value['product_category']).'&max='.@$value['max_drawdown'].'&daily='.@$value['daily_drawdown'].'&target='.@$value['profit_target'].'')?>" class="btn btn-sm btn-outline-primary">
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
                😧 Hey ! Looks like you no accounts yet .<br /><br />
                <a href="<?=base_url('user')?>" >click here</a> to get started with a free trial account 
                or &nbsp;&nbsp;<a href="<?=base_url('user/')?>start-new-challenge" class="btn btn-primary btn-sm"> Start New Challenge</a>
              </div>
          </div>
        </div>
      </div>
  <?php } ?>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Account Overview</h4>`);
</script>
<?php $this->load->view('user/includes/footer');?>