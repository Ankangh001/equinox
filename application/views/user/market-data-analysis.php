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
                  <span>Market Sentiments</span>
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                  <span>COT Data</span>
                </button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                  <span>Historical Sentiments</span>
                </button>
                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Technical Indicators</span>
                </button>

                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Pivot Points</span>
                </button>

                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-6" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                  <span>Forex Heat Map</span>
                </button>
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
                          "type":"realtime_sentiment_index",
                          "params":{
                            "liquidity":"consumers",
                            "type":"swfx",
                            "showPairs":true,
                            "showCurrencies":true,
                            "availableInstruments":"l:EUR/USD,GBP/USD,USD/CHF,USD/JPY,AUD/USD,XAU/USD,E_SandP-500,E_Brent",
                            "availableCurrencies":["AUD","CAD","CHF","GBP","JPY","NZD","USD","EUR"],
                            "headingColor":"#000000",
                            "dateColor":"#000000",
                            "bgColor":"#ffffff",
                            "width":"100%",
                            "height":"600",
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
                        "type":"cot",
                        "params":{
                          "showHeader":false,
                          "primaryColor":"#e00",
                          "secondaryColor":"#000",
                          "defaultCurrency":"EUR",
                          "width":"100%",
                          "height":"465",
                          "adv":"popup"
                        }
                      };
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
                      "type":"historical_sentiment_index",
                      "params":{
                        "showHeader":false,
                        "tableBorderColor":"#D92626",
                        "liquidity":"consumers",
                        "availableInstruments":[
                          "EUR/USD",
                          "GBP/USD",
                          "USD/JPY",
                          "USD/CHF",
                          "EUR/JPY",
                          "GBP/JPY"
                        ],
                        "availableCurrencies":[
                          "AUD","CAD","CHF","GBP","HKD","JPY","MXN","NOK","NZD","PLN","RUB","SEK","SGD","TRY","USD","ZAR","EUR","XAG","XAU"
                        ],
                        "last":true,
                        "sixhours":true,
                        "oneday":true,
                        "fivedays":true,
                        "width":"100%",
                        "height":"400",
                        "adv":"popup"
                      }
                    };
                  </script>
                  <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
                <!-- TradingView Widget END -->
              </div>

              <!-- Technical Indicators -->
              <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div class="tradingview-widget-container__widget"></div>
                  <div class="tradingview-widget-copyright">
                    <a href="https://in.tradingview.com" rel="noopener" target="_blank">
                      <span class="blue-text"></span>
                    </a>
                  </div>
                  <script type="text/javascript">DukascopyApplet = {"type":"technical_analysis","params":{"showHeader":false,"tableBorderColor":"#D92626","availableInstruments":"l:EUR/USD,USD/JPY,GBP/USD,EUR/JPY,GBP/JPY,USD/CAD,XAU/USD,AUD/USD,USD/CHF,NZD/USD,E_Brent,E_SandP-500,E_DJE50XX,E_N225Jap,BTC/USD","instrument":"EUR/USD","period":["6","8","10","11","13","16","17","18"],"width":"100%","height":"340","adv":"popup"}};</script><script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
                <!-- TradingView Widget END -->
              </div>

              <!-- Pivot Points -->
              <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-4-tab">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div class="tradingview-widget-container__widget"></div>
                  <div class="tradingview-widget-copyright">
                    <a href="https://in.tradingview.com" rel="noopener" target="_blank">
                      <span class="blue-text"></span>
                    </a>
                  </div>
                  <script type="text/javascript">DukascopyApplet = {"type":"pivot_point_levels","params":{"showHeader":false,"tableBorderColor":"#D92626","instrument":"EUR/USD","woodie":true,"fibonacci":true,"camarilla":true,"width":"100%","height":"310","adv":"popup"}};</script><script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
                <!-- TradingView Widget END -->
              </div>

              <!-- Heat Map -->
              <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-4-tab">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div class="tradingview-widget-container__widget"></div>
                  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/currencies/forex-heat-map/" rel="noopener" target="_blank"><span class="blue-text"></span></a> </div>
                  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-heat-map.js" async>
                  {
                  "width": "100%",
                  "height": "500",
                  "currencies": [
                    "EUR",
                    "USD",
                    "JPY",
                    "GBP",
                    "CHF",
                    "AUD",
                    "CAD",
                    "NZD",
                    "CNY"
                  ],
                  "isTransparent": false,
                  "colorTheme": "light",
                }
                  </script>
                </div>
                <!-- TradingView Widget END -->
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Market Analysis</h4>`);
</script>
<?php $this->load->view('user/includes/footer');?>