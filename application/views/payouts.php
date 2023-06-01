<?php
$this->load->view('includes/header');
?>

<main id="main">
  	<!-- ======= Pricing ======= -->
    <section id="table-pricing" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Payouts</h2>
          <p>What we offer</p>
        </div>

        <div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
              <table class="account-config">
                <thead>
                  <tr>
                  <td>LogIn</td>
                  <td></td>
                  <td>Profit</td>
                  <td>Account Size</td>
                  <td>Sex</td>
                  <td>Country</td>
                  <td>Stats</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>113234332</td>
                    <td x-text="currentConfig[0][0]" class="text-success">paid</td>
                    <td x-text="currentConfig[1][0]">$454</td>
                    <td x-text="currentConfig[2][0]">$4565456</td>
                    <td x-text="currentConfig[2][0]">M</td>
                    <td x-text="currentConfig[2][0]">INDIA</td>
                    <td x-text="currentConfig[2][0]">stats</td>
                  </tr>
                </tbody>
              </table>
            </div>
      </div>
    </section><!-- End Pricing -->
</main><!-- End #main -->

<?php
$this->load->view('includes/footer');
?>