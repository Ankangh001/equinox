<?php
$this->load->view('user/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-header text-center mb-3">
            <img src="<?=base_url('assets/user/assets/img/elements/')?>windows.png" alt="meta trader 5" width="120" height="120" srcset="">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Meta Trader 5</h5>
            <p class="card-text mb-3">Download your Meta Trader 5</p>
            <a href="https://download.mql5.com/cdn/web/metaquotes.software.corp/mt5/mt5setup.exe?utm_source=www.metatrader5.com&utm_campaign=download" class="btn btn-primary"><i class="bx bx-download"></i>&nbsp;&nbsp;&nbsp;Download</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-header text-center mb-3">
            <img src="<?=base_url('assets/user/assets/img/elements/')?>mac_os.png" alt="meta trader 5" width="120" height="120" srcset="">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Meta Trader 5</h5>
            <p class="card-text mb-3">Download your Meta Trader 5</p>
            <a href="https://download.mql5.com/cdn/web/metaquotes.software.corp/mt5/MetaTrader5.dmg?utm_source=www.metatrader5.com&utm_campaign=download.mt5.macos" class="btn btn-primary"><i class="bx bx-download"></i>&nbsp;&nbsp;&nbsp;Download</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-header text-center mb-3">
            <img src="<?=base_url('assets/user/assets/img/elements/')?>ios.png" alt="meta trader 5" width="120" height="120" srcset="">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Meta Trader 5</h5>
            <p class="card-text mb-3">Download your Meta Trader 5</p>
            <a href="https://download.mql5.com/cdn/mobile/mt5/ios?utm_source=www.metatrader5.com&utm_campaign=install.metaquotes" target="_blank" class="btn btn-primary"><i class="bx bx-download"></i>&nbsp;&nbsp;&nbsp;Download</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-header text-center mb-3">
            <img src="<?=base_url('assets/user/assets/img/elements/')?>android.png" alt="meta trader 5" width="120" height="120" srcset="">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Meta Trader 5</h5>
            <p class="card-text mb-3">Download your Meta Trader 5</p>
            <a href="https://download.mql5.com/cdn/mobile/mt5/android?utm_source=www.metatrader5.com&utm_campaign=install.metaquotes" target="_blank" class="btn btn-primary"><i class="bx bx-download"></i>&nbsp;&nbsp;&nbsp;Download</a>
          </div>
        </div>
      </div>


    </div>
  </div>
  </div>
    <!-- / Content -->
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Platforms</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>