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
  }
  .nav-tabs .nav-link.active {
      background: #444;
      color: #fff !important;
  }
  .tradingview-widget-container{
    margin:auto
  }
  .J-ug-M-N.J-ug-wg.J-K-L.J-ug {
      margin: auto !important;
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
          <div class="row">
          <div class="col-lg-12 order-2 order-lg-1 iframe" data-aos="zoom-in" data-aos-delay="100">
            <nav class="quotes-nav">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                  <span>Position Calculator</span>
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                  <span>Pip Calculator</span>
                </button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                  <span>Profit Calculator</span>
                </button>
                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Margin Requirement</span>
                </button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <!-- PS Calculator -->
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
                          "type":"position_size_calculator",
                          "params":{
                            "showHeader":false,
                            "showFooter":false,
                            "accentColor":"#000000",
                            "availableInstruments":"l:",
                            "instrument":"EUR/USD",
                            "accountCurrency":"USD",
                            "accountBalance":"1000",
                            "stopLossPips":"50",
                            "riskUnit":1,
                            "riskPercentage":"2",
                            "width":"100%",
                            "height":"364",
                            "adv":"popup"
                          }
                        };
                      </script>
                      <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                  </div>
              </div>

              <!-- PIP Calculator -->
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
                        "type":"pip_calculator",
                        "params":{
                          "header":false,
                          "orientation":"portrait",
                          "pipAmount":"100",
                          "accountCurrency":"USD",
                          "defaultInstrument":"EUR/USD",
                          "resultColor":"#696969",
                          "width":"300",
                          "height":"410",
                          "adv":"popup"
                        }
                      };
                    </script>
                    <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
              </div>
              
              <!-- FX Calculator -->
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
                      "type":"fx_calculator",
                      "params":{
                        "header":false,
                        "tabs":false,
                        "orientation":"portrait",
                        "currency":"USD",
                        "showValues":"account",
                        "side":"ask",
                        "rollover":"advanced",
                        "islamic":false,
                        "availableInstruments":"l:",
                        "instrument":"EUR/USD",
                        "amount":"10000",
                        "lot":"mio",
                        "resultColor":"#5e5e5e",
                        "width":"100%",
                        "height":"630",
                        "adv":"popup"
                      }
                    };
                  </script>
                  <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
                <!-- TradingView Widget END -->
              </div>

              <!-- Margin Requirement -->
              <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div class="tradingview-widget-container__widget"></div>
                  <div class="tradingview-widget-copyright">
                    <a href="https://in.tradingview.com" rel="noopener" target="_blank">
                      <span class="blue-text"></span>
                    </a>
                  </div>
                  <script type="text/javascript">
                    DukascopyApplet = {
                      "type":"margin_requirements_cfd",
                      "params":{
                        "showHeader":false,
                        "tableBorderColor":"#D92626",
                        "availableInstruments":"l:",
                        "showForex":true,
                        "showMetals":true,
                        "showCommodities":true,
                        "showIndex":true,
                        "showStock":true,
                        "availableCurrencies":[
                          "AUD","CAD","CHF","DKK","EUR","GBP","HKD","JPY","MXN","NOK","NZD","PLN","SEK","SGD","TRY","USD","XAU","ZAR"
                        ],
                        "currency":"AUD",
                        "showWeekend":true,
                        "amount":"0.001",
                        "leveragesList":"{\"common\":[\"1:100,1:30\",\"1:200,1:60\",\"1:300,1:90\"],\"custom\":[]}","leverage":"1:100",
                        "width":"100%",
                        "height":"460",
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Calcualtors</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>