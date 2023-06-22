<?php
$this->load->view('user/includes/header');
?>

<style>

  .nav-tabs {
    display: flex;
    border-bottom: 1px solid #fff;
    width: 100% !important;
    background: transparent;
    border-top-right-radius: 12px;
    border-top-left-radius: 12px;
    justify-content: space-evenly;
    align-items: center;
    padding: 0.5rem;
    transition: 0.3s ease-in-out !important;
    flex-direction: row;
}
.nav-tabs:not(.nav-fill):not(.nav-justified) .nav-link, .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link {
    width: fit-content !important;
    color: #000000;
    font-size: 16px;
    border: 1px solid #444;
    padding: 6px 14px;
    border-radius: 25px;
    box-shadow: 0px 0px 8px #00000090;
    letter-spacing: 1.2px;
    font-weight: bold;
    margin-bottom:2rem;
}
.nav-tabs .nav-link.active {
    background: #444;
    color: #fff !important;
}
.tradingview-widget-container{
  margin:auto
}
.tab-content {
    padding: 0;}
    
/* iframe {
  pointer-events: none;
} */
</style>


<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body text-center">
          <div class="row">
          <div class="col-lg-12 order-2 order-lg-1 iframe" data-aos="zoom-in" data-aos-delay="100">
            <nav class="quotes-nav">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                  <span>Economic Calendar</span>
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                  <span>Central Bank Rates</span>
                </button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                  <span>National Holidays</span>
                </button>
                <!-- <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Technical Indicators</span>
                </button>

                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Pivot Points</span>
                </button>

                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-6" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Forex Heat Map</span>
                </button> -->
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <!-- Market Sentiments -->
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                      <div class="tradingview-widget-copyright">
                          <a href="https://in.tradingview.com/markets/currencies/" rel="noopener" target="_blank">
                              <span class="blue-text"></span>
                          </a>
                      </div>
                      <script type="text/javascript">
                        DukascopyApplet = {
                            "type":"economic_calendar_new",
                            "params":{
                                "showHeader":false,
                                "tableBorderColor":"#D92626",
                                "defaultTimezone":0,
                                "defaultCountries":"c:AU,CA,CH,CN,EU,GB,JP,NZ,US,DE,FR,IT,ES",
                                "impacts":[1,2],
                                "dateTab":2,
                                "dateFrom":1459036800000,
                                "dateTo":1459555200000,
                                "showColCountry":true,
                                "showColCurrency":true,
                                "showColImpact":true,
                                "showColPrevious":true,
                                "showColForecast":true,
                                "width":"100%",
                                "height":"500",
                                "adv":"popup"
                            }
                        };
                        </script>
                      <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                  </div>
              </div>

              <!-- COT Data -->
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright">
                      <a href="https://in.tradingview.com/markets/indices/" rel="noopener" target="_blank">
                        <span class="blue-text"></span>
                      </a>
                    </div>
                    <script type="text/javascript">
                        DukascopyApplet = {
                            "type":"interest_rate_calendar",
                            "params":{
                                "showHeader":false,
                                "tableBorderColor":"#D92626",
                                "delta":true,
                                "changed":true,
                                "nameType":2,
                                "width":"100%",
                                "height":"450",
                                "adv":"popup"
                            }};
                    </script>
                    <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
              </div>
              
              <!-- Historical Sentiments -->
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div class="tradingview-widget-container__widget"></div>
                  <div class="tradingview-widget-copyright">
                    <a href="https://in.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank">
                      <span class="blue-text"></span>
                    </a>
                  </div>
                  <script type="text/javascript">
                    DukascopyApplet = {
                        "type":"holiday_calendar",
                        "params":{
                            "showHeader":false,
                            "tableBorderColor":"#D92626",
                            "showPastItems":false,
                            "defaultRegion":0,
                            "width":"100%",
                            "height":"450",
                            "adv":"popup"
                        }
                    };
                    </script>
                    <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
                <!-- TradingView Widget END -->
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Economic Calendar</h4>`);
</script>
<?php $this->load->view('user/includes/footer');?>