<?php $this->load->view('user/includes/header');?>

<style>
  .accordion-button.collapsed {
    border-radius: 0.375rem;
    box-shadow: 0 0 5px #00000050;
}
</style>
<!-- Content wrapper -->
<div class="content-wrapper">

  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="accordion mt-3" id="accordionExample">

    <?php foreach ($res as $key => $value) {   ?>
      <div class="card-title fw-bold">
        <?php 
          if ($value['phase'] == '0'){
              echo 'Free Trial';
          }elseif ($value['phase'] == '1') {
              echo 'Evaluation Phase 1';
          }elseif ($value['phase'] == '2') {
            echo 'Evaluation Phase 2';
          }elseif ($value['phase'] == '3') {
            echo 'Evaluation Funded';
          } 
        ?>
      </div>

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
                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label">Status: &nbsp;&nbsp;&nbsp;&nbsp; <span class="badge bg-success text-white me-1">Active</span>
                      <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-4 col-form-label"></span>
                    
                      <!-- <span class="badge bg-primary text-white me-1">Passed</span>
                      <span class="badge bg-danger text-white me-1">Failed</span></label> -->
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
    <?php } ?>
    </div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Account Overview</h4>`);
</script>
<?php $this->load->view('user/includes/footer');?>