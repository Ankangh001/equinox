<?php
$this->load->view('admin/includes/header');
?>
<style>
  .card:hover{
    background-color:#ddd;
    cursor: pointer;
  }
</style>


<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>phase-1" class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-dollar fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Phase 1 Accounts</span>
            <h3 class="card-title mb-2 text-primary fw-bold"><?= @$phase1?></h3>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>phase-2" class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-dollar fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Phase 2 Accounts</span>
            <h3 class="card-title mb-2 text-primary fw-bold"><?= @$phase2?></h3>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>phase-3"  class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-dollar fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Funded Accounts</span>
            <h3 class="card-title mb-2 text-primary fw-bold"><?= @$funded ?></h3>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>users"  class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-user fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Users</span>
            <h3 class="card-title mb text-primary fw-bold-2"><?= @$users ?></h3>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>completed"  class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-dollar fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Completed Accounts</span>
            <h3 class="card-title mb-2 text-primary fw-bold"><?= @$completed ?></h3>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-4 col-3 mb-4">
        <a href="<?=base_url('admin/')?>completed"  class="card text-dark">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class="bx bx-dollar fs-3"></i>
              </div>
            </div>
            <span class="fw-bold fs-3 d-block mb-1">Revenue Generated</span>
            <h3 class="card-title mb-2 text-primary fw-bold"><?= @$revenue ?></h3>
          </div>
        </a>
      </div>

      
    </div>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Dashboard</h4>`)
</script>
<?php $this->load->view('admin/includes/footer');?>