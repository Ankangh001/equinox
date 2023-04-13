
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-center align-items-center text-left">
            <div class="footer-info">
              <h3>Equinox</h3>
                <br>
              <p>About Us<br>
                NY 535022, USA<br>
                <br>
                <div class="social-links d-flex justify-content-evenly">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex flex-column justify-content-center align-items-start text-center footer-links">
            <h4>Important Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Testimonial</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Affiliate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Payouts</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Client Area</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 d-flex flex-column justify-content-center align-items-start text-left footer-links">
            <h4 class="text-left">User Tools</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">tool 1</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">tool 2</a></li>
            </ul>
            <h4 class="text-left">Market Data</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">tool 1</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">tool 2</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
          <div class="col-lg-12 col-md-12 footer-newsletter mb-5 text-center">
                <h4>Our Newsletter</h4>
                <!-- <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p> -->
                <form action="" method="post" >
                  <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
              </div>
            <div class="footer-info">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Equinox</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      All information provided on this site is intended solely for the study purposes related to trading on financial markets and does not serve in any way as a specific investment recommendation, business recommendation, investment opportunity analysis or similar general recommendation regarding the trading of investment instruments. Trading in financial markets is a high-risk activity and it is advised not to risk more than one can afford to lose! FTMO Evaluation Global s.r.o./FTMO Evaluation US s.r.o. does not provide any of the investment services listed in the Capital Market Undertakings Act No. 256/2004 Coll. The information on this site is not directed at residents in any country or jurisdiction where such distribution or use would be contrary to local laws or regulations. FTMO Evaluation Global s.r.o./FTMO Evaluation US s.r.o., and FTMO s.r.o. are not a broker and do not accept deposits. The offered technical solution for the FTMO platforms and data feed is powered by the institutional liquidity providers. The website FTMO.com is owned and operated by an EU company FTMO s.r.o., Purkyňova 3, 110 00 Prague, Czech Republic.
      2023 © Copyright - FTMO.com Made with ❤ for trading
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://kit.fontawesome.com/26637080d5.js" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>$(function(){
      var calcNewYear = setInterval(function(){
        date_future = new Date('2023-06-016');
        date_now = new Date();

        seconds = Math.floor((date_future - (date_now))/1000);
        minutes = Math.floor(seconds/60);
        hours = Math.floor(minutes/60);
        days = Math.floor(hours/24);
        
        hours = hours-(days*24);
        minutes = minutes-(days*24*60)-(hours*60);
        seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

        $("#day").text(days);
        $("#hours").text(hours);
        $("#min").text(minutes);
        $("#sec").text(seconds);
      },1000);
	});</script>
</body>

</html>