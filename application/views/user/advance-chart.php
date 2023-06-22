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
          <div id="element"  class="card-body text-center">
              <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container">
                <div id="tradingview_6bb72"></div>
                <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                  new TradingView.widget(
                    {
                      "width": "100%",
                      "height": 900,
                      "symbol": "FX:EURUSD",
                      "interval": "60",
                      "timezone": "Etc/UTC",
                      "theme": "light",
                      "style": "1",
                      
                      "toolbar_bg": "#f1f3f6",
                      "enable_publishing": false,
                      "withdateranges": true,
                      "hide_side_toolbar": false,
                      "allow_symbol_change": true,
                      "details": true,
                      "hotlist": true,
                      "calendar": true,
                      "container_id": "tradingview_6bb72"
                    }
                );
                </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- / Content -->
<script>
  $('#navbar-collapse').prepend(
    `<h4 class="fw-bold mb-0 mr-3" id="mob-title">Advanced Chart</h4> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class="btn btn-outline-dark ml-3 btn-sm" onclick="var el = document.getElementById('element'); el.requestFullscreen();">
        <i class='bx bx-fullscreen' ></i>
        </button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="btn btn-outline-dark me-3 btn-sm" href="split">
        Merge<i class='bx bxs-arrow-to-right' ></i>
      </a>`
    );
</script>
<?php $this->load->view('user/includes/footer');?>