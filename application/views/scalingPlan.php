<?php
$this->load->view('includes/header');
?>

  <main id="main">
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="section-title  text-center">
                <h2>Scaling Plan</h2>
            </div>
            <p class="text-dark my-5 mx-3" style="font-size:16px">Obtaining an FTMO Account does not mean that cooperation between the trader and our project will not develop any further. Quite the contrary, on this page, you will see what the increments principles are. A higher account balance provides the trader with the opportunity to scale up the positions accordingly, while not taking higher risks. Remember, our project has the same goal as you. However, it needs to be understood that traders might face periods when they don’t earn any profits. In general, trading is a risky endeavour and FTMO does not promise high returns. An FTMO Account is a fully simulated demo account with real market quotes from liquidity providers. We copy the trades at our own discretion using aggregated orders thanks to our proprietary risk management algorithm. This solution is much administratively easier and gives our company the freedom to actively manage risk in certain markets.</p>
            <div class="container bg-box rounded-24p text-white/60 flex-1 p-40p sm:block" data-aos="fade-up">
                <table class="account-config">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Growth Stage</td>
                            <td>Account Size</td>
                            <td>Profit Target</td>
                            <td>Maximum Loss</td>
                            <td>Profit Share</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">Evaluation (Demo) Acc</td>
                            <td x-text="currentConfig[1][0]">200,000</td>
                            <td x-text="currentConfig[2][0]">12,000 (6%)</td>
                            <td x-text="currentConfig[2][0]">10,000</td>
                            <td x-text="currentConfig[2][0]">50% Fee Refund</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">Evaluation (Demo) Acc</td>
                            <td x-text="currentConfig[1][0]">200,000</td>
                            <td x-text="currentConfig[2][0]">12,000 (6%)</td>
                            <td x-text="currentConfig[2][0]">10,000</td>
                            <td x-text="currentConfig[2][0]">50% Fee Refund</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">Evaluation (Demo) Acc</td>
                            <td x-text="currentConfig[1][0]">200,000</td>
                            <td x-text="currentConfig[2][0]">12,000 (6%)</td>
                            <td x-text="currentConfig[2][0]">10,000</td>
                            <td x-text="currentConfig[2][0]">50% Fee Refund</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">Evaluation (Demo) Acc</td>
                            <td x-text="currentConfig[1][0]">200,000</td>
                            <td x-text="currentConfig[2][0]">12,000 (6%)</td>
                            <td x-text="currentConfig[2][0]">10,000</td>
                            <td x-text="currentConfig[2][0]">50% Fee Refund</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">Evaluation (Demo) Acc</td>
                            <td x-text="currentConfig[1][0]">200,000</td>
                            <td x-text="currentConfig[2][0]">12,000 (6%)</td>
                            <td x-text="currentConfig[2][0]">10,000</td>
                            <td x-text="currentConfig[2][0]">50% Fee Refund</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
  </main>
<?php
$this->load->view('includes/footer');
?>