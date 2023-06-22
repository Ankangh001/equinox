<?php
$this->load->view('user/includes/header');
?>
<style>
    @media (max-width: 786px){
      #mob-title{
        display:none;
      }
    }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body text-center">
              <!-- Web Terminal Code Start -->
              <iframe 
                id="element" 
                src="https://trade.mql5.com/trade?servers=DKInternational-Demo,DKInternational-Live&amp;
                  lang=en&amp;"
                allowfullscreen="allowfullscreen" 
                style="width: 100%; height: 100vh; border: none;"
                startup_version ="5"
              ></iframe>
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
  $('#navbar-collapse').prepend(`<h4 id="mob-title" class="fw-bold mb-0 mr-3"> MT5 Webterminal</h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-outline-dark ml-3 btn-sm" onclick="var el = document.getElementById('element'); el.requestFullscreen();">
        <i class='bx bx-fullscreen' ></i>
        </button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a target="_blank" class="btn btn-outline-dark me-3 btn-sm" href="split">
        Merge<i class='bx bxs-arrow-to-right' ></i>
      </a>`)
</script>
<?php $this->load->view('user/includes/footer');?>