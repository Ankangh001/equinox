<?php
$this->load->view('includes/header');
?>

<style>
    .tradingview-widget-container{
        width: 100%;
        margin: 1rem auto;
        height: 700px
    }
    .economic{
        padding: 5rem 0;
    }
</style>



<main id="main">
	<!-- ======= Why Us Section ======= -->
    <section id="faq" class="economic mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Economic Calender</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/economic-calendar/" rel="noopener" target="_blank"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                        {
                            "width": "100%",
                            "height": "100%",
                            "colorTheme": "light",
                            "isTransparent": false,
                            "locale": "in",
                            "importanceFilter": "-1,0,1",
                            "currencyFilter": "AON,ARS,AUD,ATS,BHD,BEF,BWP,BRL,USD,CAD,CLP,CNY,COP,CZK,DKK,EGP,EEK,ETB,EUR,FIM,FRF,DEM,GHC,GRD,HKD,HUF,ISK,INR,IDR,IRP,ILS,ITL,JPY,KES,KRW,KWD,LVR,LTL,MWK,MYR,MUR,MXN,MZM,NAD,NLG,NZD,NGN,NOK,OMR,PEN,PHP,PLZ,PTE,QAR,RON,RUR,RWF,SAR,RSD,SCR,SGD,SKK,ZAR,ESP,SEK,CHF,TWD,TZS,THB,TRL,UGX,UAK,AED,GBP,ZMK,ZWD"
                        }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Pricing -->
  </main><!-- End #main -->

<?php
$this->load->view('includes/footer');
?>