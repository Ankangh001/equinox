<?php
$this->load->view('user/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-5">
      <div class="col-md-6">
        <div class="card mb-3 p-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img class="card-img card-img-left" src="<?=base_url('assets/img/')?>etc_risk_manager.png" alt="image">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">ETC Risk Manager</h5>
                <p class="card-text">
                  It's a very convenient tool allowing you to manage your risk with ease.
                </p>
              </div>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center text-center">
              <a href="<?=base_url('assets/user/files/ETC Trade Manager.ex5')?>" class="pointer btn btn-outline-secondary p-2"><i class='bx bx-download fs-3' ></i></a>
            </div>
          </div>
        </div>
      </div>

        <div class="col-md-6">
          <div class="card mb-3 p-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img card-img-left" src="<?=base_url('assets/img/')?>etc_trade_manager.png" alt="image">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">ETC Trade Manager</h5>
                  <p class="card-text">
                    Execute your trades with precision. You can also calculate your lot size.
                  </p>
                </div>
              </div>
              <div class="col-md-2 d-flex align-items-center justify-content-center text-center">
                <a href="<?=base_url('assets/user/files/ETC Trade Manager.ex5')?>" class="pointer btn btn-outline-secondary p-2"><i class='bx bx-download fs-3' ></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 m-auto">
          <div class="card mb-3 p-3">
            <div class="row g-0">
              <div class="col-md-6">
                <img class="card-img card-img-left" src="<?=base_url('assets/img/')?>etc-trade-journal.png" alt="image">
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <h5 class="card-title">ETC Trade Journal</h5>
                  <p class="card-text">
                  Here you can record and review you daily trades for better output and for future reference.
                  </p>
                </div>
              </div>
              <div class="col-md-2 d-flex align-items-center justify-content-center text-center">
                <a href="<?=base_url('assets/user/files/ETC Trade Journal.xlsx')?>" class="pointer btn btn-outline-secondary p-2"><i class='bx bx-download fs-3' ></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- / Content -->
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Applications or Tools</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>