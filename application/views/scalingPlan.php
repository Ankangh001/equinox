<?php
$this->load->view('includes/header');
?>
<style>
    .bg-box{
        background:#fff;
        box-shadow:0 0 5px #00000070;
        
    }
    table.account-config td {
        padding: 1rem;
        position: relative;
        color: #000000;
        border-bottom: 2px solid #dddddd;
        border-right: 2px solid #dddddd;
        text-align: center;
    }
    .faq {
        background: linear-gradient(360deg, #ffffff 50%, #eee 80%);
    }
    thead tr td{
        font-weight:bold;
    }
</style>
  <main id="main">
    <section id="faq" class="faq" style="padding-bottom:1rem">
        <div class="container" data-aos="fade-up">
            <div class="section-title  text-center">
                <h2>Scaling Plan</h2>
            </div>
            <p class="text-dark my-5 mx-3" style="font-size:16px">Obtaining an Equinox Trading Capital Account does not mean that cooperation between the trader and our project will not develop any further. Quite the contrary, on this page, you will see what the increment principles are. A higher account balance provides the trader with the opportunity to scale up the positions accordingly, while not taking higher risks. Remember, our project has the same goal as you. However, it needs to be understood that traders might face periods when they don’t earn any profits. In general, trading is a risky endeavour and Equinox Trading Capital does not promise high returns. Equinox Trading Capital Account is a fully simulated demo account with real market quotes from liquidity providers. We copy the trades at our own discretion using aggregated orders thanks to our proprietary risk management algorithm. This solution is administratively easier and gives our company the freedom to actively manage risk in markets.</p>
            <div class="container bg-box rounded-24p text-white/60 flex-1 p-40p sm:block" data-aos="fade-up">
                <table class="account-config">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Account Size</td>
                            <td>Profit Target</td>
                            <td style="border-right:0;">Maximum Loss</td>
                            <!-- <td style="border-right:0;">Profit Share</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td x-text="currentConfig[0][0]">500,000</td>
                            <td x-text="currentConfig[1][0]">50,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">50,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">80%</td> -->
                        </tr>
                        <tr>
                            <td>2</td>
                            <td x-text="currentConfig[0][0]">750,000</td>
                            <td x-text="currentConfig[1][0]">75,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">75,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">90%</td> -->
                        </tr>
                        <tr>
                            <td>3</td>
                            <td x-text="currentConfig[0][0]">1,000,000</td>
                            <td x-text="currentConfig[1][0]">100,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">100,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">90%</td> -->
                        </tr>
                        <tr>
                            <td>4</td>
                            <td x-text="currentConfig[0][0]">1,250,000</td>
                            <td x-text="currentConfig[1][0]">125,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">125,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">90%</td> -->
                        </tr>
                        <tr>
                            <td>5</td>
                            <td x-text="currentConfig[0][0]">1,500,000</td>
                            <td x-text="currentConfig[1][0]">150,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">150,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">90%</td> -->
                        </tr>
                        <tr>
                            <td>6</td>
                            <td x-text="currentConfig[0][0]">1,750,000</td>
                            <td x-text="currentConfig[1][0]">175,000 (10%)</td>
                            <td style="border-right:0;" x-text="currentConfig[1][0]">175,000 (10%)</td>
                            <!-- <td style="border-right:0;" x-text="currentConfig[2][0]">90%</td> -->
                        </tr>
                        <tr>
                            <td style="border-bottom:0;">7</td>
                            <td style="border-bottom:0;" x-text="currentConfig[0][0]">2,000,000</td>
                            <td style="border-bottom:0;" x-text="currentConfig[0][0]"></td>
                            <td style="border-bottom:0; border-right:0;"  x-text="currentConfig[1][0]">200,000 (10%)</td>
                            <!-- <td style="border-right:0; border-bottom:0;" x-text="currentConfig[2][0]">90%</td>s -->
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