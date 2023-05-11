<?php
$this->load->view('user/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body text-center">
              <!-- Web Terminal Code Start -->
              <iframe id="element" src="https://trade.mql5.com/trade?demo_all_servers=1&amp;startup_mode=open_demo&amp;lang=en&amp;save_password=off" 
                allowfullscreen="allowfullscreen" style="width: 100%; height: 100vh; border: none;"></iframe>
              <!-- Web Terminal Code End -->
            </div>
            <div class="footer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    <!-- / Content -->
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0 mr-3"><span class="text-muted fw-light">User /</span> MT5 Webterminal</h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-outline-dark ml-3 btn-sm" onclick="var el = document.getElementById('element'); el.requestFullscreen();">
            <i class='bx bx-fullscreen' ></i>
          </button>`)
</script>
<?php $this->load->view('user/includes/footer');?>