<?php
$this->load->view('includes/header');
?>

<main id="main">
  	<!-- ======= Pricing ======= -->
    <section id="table-pricing" class="why-us" style="background:#444444">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Payouts</h2>
          <p>What we offer</p>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item m-2 pointer">
            <div data-toggle="pill" 
              id="pills-home-tab"
              href="#pills-home" 
              role="tab" 
              aria-controls="pills-home" 
              aria-selected="true" 
              class="flex justify-center active
                items-center flex-row px-16p py-8p 
                bg-primary-500/16 border-pricing 
                border-primary-500 rounded-full 
                -my-12p h-40p gap-8p">
              <strong>$10000</strong>
            </div>
          </li>
          <li class="nav-item m-2 pointer">
            <div id="pills-profile-tab" 
              data-toggle="pill" 
              href="#pills-profile" 
              role="tab" 
              aria-controls="pills-profile" 
              aria-selected="false"
              class="flex justify-center 
                items-center flex-row px-16p py-8p 
                bg-primary-500/16 border-pricing 
                border-primary-500 rounded-full 
                -my-12p h-40p gap-8p">
              <strong>$20000</strong>
            </div>
          </li>
          <li class="nav-item m-2 pointer">
            <div id="pills-contact-tab" 
              data-toggle="pill" 
              href="#pills-contact" 
              role="tab" 
              aria-controls="pills-contact" 
              aria-selected="false"
              class="flex justify-center 
                items-center flex-row px-16p py-8p 
                bg-primary-500/16 border-pricing 
                border-primary-500 rounded-full 
                -my-12p h-40p gap-8p">
              <strong>$30000</strong>
            </div>
            <!-- <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a> -->
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
              <table class="account-config">
                <thead>
                  <tr>
                  <td></td>
                  <td>Phase 1</td>
                  <td>Phase 2</td>
                  <td>Funded</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>Trading period</td>
                  <td x-text="currentConfig[0][0]">30 days</td>
                  <td x-text="currentConfig[1][0]">60 days</td>
                  <td x-text="currentConfig[2][0]">indefinite</td>
                  </tr>
                  <tr>
                  <td>Minimum trading days</td>
                  <td x-text="currentConfig[0][1]">5 days</td>
                  <td x-text="currentConfig[1][1]">5 days</td>
                  <td x-text="currentConfig[2][1]">x</td>
                  </tr>
                  <tr>
                  <td>Max Daily Loss</td>
                  <td x-text="currentConfig[0][2]">£7,000</td>
                  <td x-text="currentConfig[1][2]">£7,000</td>
                  <td x-text="currentConfig[2][2]">£7,000</td>
                  </tr>
                  <tr>
                  <td>Max Overall Loss</td>
                  <td x-text="currentConfig[0][3]">£14,000</td>
                  <td x-text="currentConfig[1][3]">£14,000</td>
                  <td x-text="currentConfig[2][3]">£14,000</td>
                  </tr>
                  <tr>
                  <td>Profit Target</td>
                  <td x-text="currentConfig[0][4]">£11,200</td>
                  <td x-text="currentConfig[1][4]">£7,000</td>
                  <td x-text="currentConfig[2][4]">x</td>
                  </tr>
                  <tr>
                  <td>Refundable Fee</td>
                  <td colspan="3">
                    <div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
                    <span>Single payment of: </span>
                    <strong x-text="currentConfig[0][5]">€998</strong>
                    </div>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
              <table class="account-config">
                <thead>
                  <tr>
                  <td></td>
                  <td>Phase 1</td>
                  <td>Phase 2</td>
                  <td>Funded</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>Trading period</td>
                  <td x-text="currentConfig[0][0]">30 days</td>
                  <td x-text="currentConfig[1][0]">60 days</td>
                  <td x-text="currentConfig[2][0]">indefinite</td>
                  </tr>
                  <tr>
                  <td>Minimum trading days</td>
                  <td x-text="currentConfig[0][1]">5 days</td>
                  <td x-text="currentConfig[1][1]">5 days</td>
                  <td x-text="currentConfig[2][1]">x</td>
                  </tr>
                  <tr>
                  <td>Max Daily Loss</td>
                  <td x-text="currentConfig[0][2]">£7,000</td>
                  <td x-text="currentConfig[1][2]">£7,000</td>
                  <td x-text="currentConfig[2][2]">£7,000</td>
                  </tr>
                  <tr>
                  <td>Max Overall Loss</td>
                  <td x-text="currentConfig[0][3]">£14,000</td>
                  <td x-text="currentConfig[1][3]">£14,000</td>
                  <td x-text="currentConfig[2][3]">£14,000</td>
                  </tr>
                  <tr>
                  <td>Profit Target</td>
                  <td x-text="currentConfig[0][4]">£11,200</td>
                  <td x-text="currentConfig[1][4]">£7,000</td>
                  <td x-text="currentConfig[2][4]">x</td>
                  </tr>
                  <tr>
                  <td>Refundable Fee</td>
                  <td colspan="3">
                    <div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
                      <span>Single payment of: </span>
                      <strong x-text="currentConfig[0][5]">€998</strong>
                    </div>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <div class="bg-box rounded-24p text-white/60 flex-1 p-40p sm:block">
              <table class="account-config">
                <thead>
                  <tr>
                  <td></td>
                  <td>Phase 1</td>
                  <td>Phase 2</td>
                  <td>Funded</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>Trading period</td>
                  <td x-text="currentConfig[0][0]">30 days</td>
                  <td x-text="currentConfig[1][0]">60 days</td>
                  <td x-text="currentConfig[2][0]">indefinite</td>
                  </tr>
                  <tr>
                  <td>Minimum trading days</td>
                  <td x-text="currentConfig[0][1]">5 days</td>
                  <td x-text="currentConfig[1][1]">5 days</td>
                  <td x-text="currentConfig[2][1]">x</td>
                  </tr>
                  <tr>
                  <td>Max Daily Loss</td>
                  <td x-text="currentConfig[0][2]">£7,000</td>
                  <td x-text="currentConfig[1][2]">£7,000</td>
                  <td x-text="currentConfig[2][2]">£7,000</td>
                  </tr>
                  <tr>
                  <td>Max Overall Loss</td>
                  <td x-text="currentConfig[0][3]">£14,000</td>
                  <td x-text="currentConfig[1][3]">£14,000</td>
                  <td x-text="currentConfig[2][3]">£14,000</td>
                  </tr>
                  <tr>
                  <td>Profit Target</td>
                  <td x-text="currentConfig[0][4]">£11,200</td>
                  <td x-text="currentConfig[1][4]">£7,000</td>
                  <td x-text="currentConfig[2][4]">x</td>
                  </tr>
                  <tr>
                  <td>Refundable Fee</td>
                  <td colspan="3">
                    <div class="flex justify-center items-center flex-row px-16p py-8p bg-primary-500/16 border border-primary-500 rounded-full -my-12p h-40p gap-8p">
                    <span>Single payment of: </span>
                    <strong x-text="currentConfig[0][5]">€998</strong>
                    </div>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Pricing -->
</main><!-- End #main -->

<?php
$this->load->view('includes/footer');
?>