<?php
$this->load->view('user/includes/header');
?>
<style>
  aside#layout-menu {
    display: none;
}
.layout-menu-fixed:not(.layout-menu-collapsed) .layout-page, .layout-menu-fixed-offcanvas:not(.layout-menu-collapsed) .layout-page {
    padding-left: 0;
}
.layout-navbar.navbar-detached.container-xxl {
    display: none;
}
</style>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row d-flex">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body text-center" style="width: 100%; height: 650px; border: none;">
              <iframe 
                id="element" src="https://trade.mql5.com/trade?servers=DKInternational-Demo,DKInternational-Live&amp;
                  lang=en&amp;"
                allowfullscreen="allowfullscreen" 
                style="width: 100%; height: 600px; border: none;"
                startup_version ="5"
              ></iframe>
            </div>
          </div>
        </div>
      <div class="col-md-6">
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
                "height": 635,
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0 mr-3"><span class="text-muted fw-light"></span> MT5 Webterminal</h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-outline-dark ml-3 btn-sm" onclick="var el = document.getElementById('element'); el.requestFullscreen();">
            <i class='bx bx-fullscreen' ></i>
          </button>`)
</script>
<?php $this->load->view('user/includes/footer');?>