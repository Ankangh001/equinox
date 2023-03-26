<?php
$this->load->view('includes/header');
?>

<!-- ======= Hero Section ======= -->
 <section id="hero" class=" affiliate d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-9">
          <h2>Share, Get Paid, Repeat</h2><br>
          <h1>Earn Like a<span> Champion</span></h1><br>
          <h2>Start earning up to 15% commission on every referral.</h2>
          <br><br>
          <h2>Check out what our successful affiliates earned last month and join them now!</h2>

          <p class="font-bold text-lg my-5">
            <span class="bg-white otp-text">$</span>
            <span class="bg-white otp-text">1</span>
            <span class="bg-white otp-text">4</span>
            <span class="bg-white otp-text">1</span>
            <span class="bg-white otp-text">3</span>
            <span class="bg-white otp-text">2</span>
            <span class="bg-white otp-text">2</span>
          </p>
          <div class="btns">
            <a href="" class="btn-menu animated fadeInUp scrollto">Become a Affiliate</a>
          </div>
        </div>
        <div class="col-lg-3 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <!-- <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="glightbox play-btn"></a> -->
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="calculate">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="visma-page--container">
              <div class="autoinvoice-box">  
                <!-- Efficiency calculator -->
                <div class="slider-autoinvoice-module" data-color="light-blue">
                  <div class="slider-autoinvoice">
                    <p class="slider-autoinvoice--label">Affiliate Calculator</p>
                    <p class="slider-autoinvoice--slider-scale">
                      <span>1000</span>
                      <span>100 000</span>
                    </p>
                    <div id="slider-autoinvoice-invoices" class="slider-autoinvoice--slider">&nbsp;</div>
                  </div>
                  <div class="slider-autoinvoice"  style="display:none">
                    <p class="slider-autoinvoice--label">Amount of digital invoices today</p>
                    <p class="slider-autoinvoice--slider-scale">
                      <span>0%</span>
                      <span>100%</span>
                    </p>
                    <div id="slider-autoinvoice-digital" class="slider-autoinvoice--slider">&nbsp;</div>
                  </div>
                  <div class="slider-autoinvoice--result">
                    <p>
                      <span class="slider-autoinvoice--result-label">You can earn:</span>
                      <span id="slider-result">&nbsp;</span>
                    </p>
                  </div>
                  <!-- calculation result-->
                </div>
                <!-- end efficiency calculator -->
              </div>
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content my-5">
            <h3>Let our Earnings Calculator get you excited.</h3>
            <p class="fst-italic py-3">Earn up to 15% in commissions on all referred purchases. Use the calculator to estimate your earnings.</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>How our Affiliate Model Works</p>
        </div>

        <div class="row">

          <div class="col-lg-3">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

          <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.js"></script>
  <script>
    
$(document).ready(function() {
  var vismaAutoivoice = vismaAutoivoice || {};
  vismaAutoivoice.calculator = function() {
    var slider1 = document.getElementById("slider-autoinvoice-invoices"), //1 element to create slider
      slider2 = document.getElementById("slider-autoinvoice-digital"), //2 element to create slider
      savingRate = 63.55, //saved money kr per 1 invoice
      $result = $("#slider-result"); //calculation output element
    // Appending money-formatting (visual)
    var outputFormat = wNumb({
      prefix: "Rs ",
      decimals: 2,
      thousand: " ",
      mark: ","
    });
    //Create slider for invoice count
    noUiSlider.create(slider1, {
      start: 10000,
      step: 1000,
      tooltips: wNumb({
        decimals: 0,
        thousand: " "
      }),
      range: {
        min: 1000,
        max: 100000
      },
      connect: "lower"
    });
    //Create slider for digital % of invoice count
    noUiSlider.create(slider2, {
      start: 50,
      step: 1,
      tooltips: wNumb({
        decimals: 0
      }),
      range: {
        min: 0,
        max: 100
      },
      connect: "lower"
    });

    function calculateSavings(invoices, digital) {
      digital = digital / 100;
      var result = invoices * (1 - digital) * savingRate;
      console.log("total result: ", result, invoices, digital);
      $result.html(outputFormat.to(result))
    }
    //Default result before interaction with sliders
    var invoiceCount = Number(slider1.noUiSlider.get()),
        digitalCount = Number(slider2.noUiSlider.get());
    console.log(
      invoiceCount,
      digitalCount,
      typeof invoiceCount,
    //  invoiceCount + digitalCount
    );
    //calculate saved hours and update calculation output element's content
    var calculateMoney = function() {
        //Show calculation result on screen
        $amountSpan.html(mod);
    };
    /* var digitalInvoices = 80;
    digitalInvoices = digitalInvoices / 100;
    console.log(outputFormat.to(1000 * (1 - digitalInvoices) * savingRate), slider1);
*/
    function calculateMoney() {
      //Formula: totalInvoices * (1 - digitalInvoices)*savingRate
    }

    //User can input calculation value by slider or directly into input field
    //When the slider value changes, update the input and calculation output element's content
    calculateSavings(invoiceCount, digitalCount);
    
    slider1.noUiSlider.on("update", function(values, handle) {
      invoiceCount = Number(values[handle]);
    
      calculateSavings(invoiceCount, digitalCount);
     // console.log(" slider 1 ", invoiceCount, typeof invoiceCount);
      return invoiceCount;
    });
  

    slider2.noUiSlider.on("update", function(values, handle) {
      digitalCount = Number(values[handle]);
      calculateSavings(invoiceCount, digitalCount);
     
    });
  };

  vismaAutoivoice.calculator();
});

  </script>



<?php
$this->load->view('includes/footer');
?>