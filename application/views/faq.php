<?php
$this->load->view('includes/header');
?>
<style>
    
    .why-us {
        background: linear-gradient(0deg, #ffffff 50%, #eee 100%) !important;
    }

    #myFilter input {
        border-radius: 30px;
    }
    #myFilter {
        width: 85%;
        display: inline-block;
        margin: 2rem 10rem !important;
    }
    button.btn.search {
        position: relative;
        right: 3rem;
    }
    ul {
        list-style: disc;
        margin-left: 5rem;
    }
    @media (max-width: 768px){
        .why-us {
            padding: 5rem 0 0 0;
            margin-top: 0;
        }
    }
</style>
<!-- ======= Evaluation ======= -->
<section id="evaluation" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Get yourself clarified</h2>
        </div>
        <div class="d-flex m-5" id="myFilter">
            <input type="text" style="width:inherit"  class="col-lg-3 form-control" id="accordion_search_bar" placeholder="Search for Faq">
            <button class="btn search">
                <i class="fas fa-search text-dark"></i>
            </button>
        </div>
		<ul class="nav nav-tabs justify-content-center mb-5 border-none" role="tablist">

			<li class="nav-item m-2 pointer">
				<div href="#profile" role="tab" data-toggle="tab" class="flex justify-center active items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>New here</strong>
				</div>
			</li>
			<li class="nav-item m-2 pointer">
				<div href="#buzz" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>Evaluation Process</strong>
				</div>
			</li>  
            
            <li class="nav-item m-2 pointer">
				<div href="#funded" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>Funded Account</strong>
				</div>
			</li>
            
            <li class="nav-item m-2 pointer">
				<div href="#platforms" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>Platforms</strong>
				</div>
			</li>

            <li class="nav-item m-2 pointer">
				<div href="#orders" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>Orders & Billing</strong>
				</div>
			</li>

            <li class="nav-item m-2 pointer">
				<div href="#services" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
						bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
					<strong>Others</strong>
				</div>
			</li>
                    
		</ul>
		<div class="tab-content">
            <!-- normal  -->
			<div role="tabpanel" class="tab-pane fade text-dark show in active" id="profile">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item" id="one">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">What is Equinox Trading Capital?</button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Equinox Trading Capital is a project which is looking for experienced traders. To ascertain if a trader has all the qualities we seek, we developed a 2-step evaluation course.
                                These two steps consist of the evaluation <strong style= "color:#0d6efd">Phase 1 & Phase 2</strong>. The course is specifically tailored to discover talent within a trader. 
                                The path of a trader is challenging, and our user tools, account analysis and applications are here to guide our traders.
                                Upon successful completion, traders are offered a placement in the firm, where they can remotely manage up to <strong style= "color:#0d6efd">500,000 USD</strong> and continuously grow the account according to our Scaling Plan.
                                As an ETC Trader, you are eligible to keep up to <strong style= "color:#0d6efd">90%</strong> of the profits you generate. Our company covers all losses, if any. More about the profit-sharing programme can be found here.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="two">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Who can join Equinox Trading Capital?</button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">We accept traders from all around the world. There is no special qualification required. All clients must be at least <strong style= "color:#0d6efd">18</strong> years old. If you know how to trade profitably and with proper risk management, that is all we care about.
                            Please note that Equinox Trading Capital does not provide services to persons listed on sanction lists, persons with criminal records related to financial crime or terrorism, and to persons previously banned because of breach of contract.</div>
                        </div>
                    </div>
                    <div class="accordion-item" id="three">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">Why should you join Equinox Trading Capital?</button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Trading is difficult. As a trader, you will face many common problems such as:
                                    <br>
                                    <br>
                                    <ul>
                                        <li>Trading an account that is too small (undercapitalization)</li>
                                        <li>Fear of losing your own money</li>
                                        <li>Psychological pressures</li>
                                        <li>Lack of discipline</li>
                                        <li>Growth limitations</li>
                                        <li>Insufficient support from other people</li>
                                    </ul>
                                    <br><br>
                                It is difficult to make a living as a trader. With Equinox Trading Capital, you can manage the live account with an initial balance of up to <strong style= "color:#0d6efd">$500,000</strong>. 
                                If you generate profits on the live account, Equinox Trading Capital will keep from <strong style= "color:#0d6efd">10%</strong> to <strong style= "color:#0d6efd">25%</strong> as the profit split, and you will be rewarded with up to <strong style= "color:#0d6efd">90%</strong> of achieved profits. 
                                However, it needs to be understood that this is the best-case scenario and similarly, traders might face periods when they don’t earn any profits. 
                                In general, trading is a risky business. Another benefit of trading for Equinox Trading Capital is that you won’t be responsible for any losses if any. 
                                In case things go wrong, all losses on the live account are covered by Equinox Trading Capital. You don’t need to fear losing if you literally have nothing to lose.
                                <br><br> At Equinox Trading Capital, we are also traders and we understand that to be a great trader, it is not just about having enough capital to trade with. 
                                The performance of our traders directly reflects the performance of the company. Therefore, it is in our interest that our traders trade under the best conditions. 
                                Traders at Equinox Trading Capital will receive wide access to our <strong style= "color:#0d6efd">innovative Trading Applications</strong> which can enhance their trading edge and we will also evaluate your trading accounts with detailed feedback from our company.
                                Then there is trading discipline. You cannot be all loosey-goosey with the live account. 
                                We will carefully observe your trading results and you will be trading under much easier rules. 
                                We believe that our rules are not very restrictive but at the same time, they would prevent a disaster if you decided to go on tilt. 
                                <br><br> No more over-trading, revenge trading, over-leveraging etc. That is why you will learn to manage risk much better once you start trading with us.
                                Another issue traders face is the so-called ‘keep and grow or withdraw and go‘. Do you prefer compounding your account or rather enjoy your hard-earned profit? 
                                At Equinox Trading Capital, you can do both. Equinox Trading Capital will pay out up to <strong style= "color:#0d6efd">90%</strong> profit share on a bi-weekly basis. 
                                Periodically, we will allocate more balance into your <strong style= "color:#0d6efd">live account</strong> if you consistently profit. <strong style= "color:#0d6efd">Get paid</strong> and grow at the same time according to our scaling plan.
                                Last but not least, the initial fee that you’ve paid will be refunded to you with the first <strong style= "color:#0d6efd">Profit Split</strong> from the live account.
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- normal  -->

            <!-- evaluation -->
			<div role="tabpanel" class="tab-pane fade text-dark show" id="buzz">
                <div class="accordion accordion-flush" id="accordionFlushExample2eee">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1">
                            How do i become an Equinox Trading Capital trader?
                        </button>
                        </h2>
                        <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2eee">
                            <div class="accordion-body">
                                In order to become an Equinox Trading Capital trader, you will have to pass our <strong style= "color:#0d6efd">2-step Evaluation</strong> Process.<br/><br/>
                                <ul>
                                    <li>
                                        <strong style= "color:#000">Step 1: The Evaluation Phase 1</strong><br/>
                                        A demo account where you will have to trade according to our rules. 
                                        You will have superior account conditions, very <strong style= "color:#0d6efd">low commissions</strong> and <strong style= "color:#0d6efd">raw spreads</strong>.
                                        If you manage to pass all requirements, you will proceed to the second and final step of the evaluation.
                                        <br/><br/>
                                    </li>
                                    <li>
                                        <strong style= "color:#000">Step 2: The Evaluation Phase 2</strong><br/>
                                        A demo account whereby you verify your performance and consistency one last time. 
                                        The rules in the Verification stage are <strong style= "color:#0d6efd">significantly easier</strong>.
                                        For a detailed explanation of the rules, please visit the rules page.
                                        After you successfully <strong style= "color:#0d6efd">pass the phase 2</strong>, 
                                        you are to <strong style= "color:#0d6efd">become an Equinox Trading Capital trader</strong> after passing our review of your trading.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo1" aria-expanded="false" aria-controls="flush-collapseTwo1">
                            How long does it take to become an Equinox Trading Capital trader?
                        </button>
                        </h2>
                        <div id="flush-collapseTwo1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2eee">
                        <div class="accordion-body">There is no minimum requirement to pass the evaluation stage. You don’t need to wait for the entire duration of the Evaluation Process. All in all, you can be managing your live account on the same day.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1" aria-expanded="false" aria-controls="flush-collapseThree1">
                            I have successfully passed the phase 1, now what?
                        </button>
                        </h2>
                        <div id="flush-collapseThree1" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2eee">
                            <div class="accordion-body">
                                After you have passed all the trading objectives in the <strong style= "color:#0d6efd">phase 1</strong>, 
                                you will see a notification in your <strong style= "color:#0d6efd">Account Metrics</strong> informing you about your success, 
                                and you don’t need to trade the account any more once your trading objectives are marked as passed. 
                                You will be automatically alerted that you have passed your phase and within a few hours, we will then send you the new account <strong style= "color:#0d6efd">login credentials</strong> for the phase 2 stage.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour1" aria-expanded="false" aria-controls="flush-collapseFour1">
                            If i breach the rules, do i get a second chance?
                        </button>
                        </h2>
                        <div id="flush-collapseFour1" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample2eee">
                            <div class="accordion-body">
                            If you happen to breach any of the trading objectives, that particular account will be automatically invalidated and loses eligibility to continue in the <strong style= "color:#0d6efd">Evaluation Course</strong>.
                            <br/>If the breach happens on your live account, the corresponding live account agreement will be terminated. You can always try again from scratch and order a <strong style= "color:#0d6efd">brand new evaluation</strong> if you wish to become our funded trader. 
                            <br/>If you violate the trading objectives, your initial fee paid for the evaluation is forfeited so be sure to stay safe and respect the rules.
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- evaluation -->

            <!-- funded -->
			<div role="tabpanel" class="tab-pane fade text-dark show" id="funded">
                <div class="accordion accordion-flush" id="accordionFunudedhExample2">
                    <div class="accordion-item" id="four">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            What is the legal relationship between a trader and Equinox Trading Capital during the account management?
                        </button>
                        </h2>
                        <div id="funded-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFunudedhExample2">
                            <div class="accordion-body">
                                The relationship between trader and <strong style= "color:#0d6efd">Equinox Trading Capital</strong> is based on the <strong style= "color:#0d6efd">Contract Agreement</strong> that we will sign with you after you pass the evaluation process. <br>
                                The live account agreement is a legally binding document defining both our and your duties and rights. If you are interested in a sample of the contract, please contact us at <strong style= "color:#0d6efd">support@equinoxtradingcapital.com</strong>.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="five">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            How much capital will i work with?
                        </button>
                        </h2>
                        <div id="funded-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFunudedhExample2">
                        <div class="accordion-body">
                            Traders will have the same account balance size as chosen for their preceding Evaluation.
                            <br/>
                            To avoid any confusion, after a client becomes a <strong style= "color:#0d6efd">funded trader</strong>, he/she will be provided with a demo account with virtual funds. 
                            
                            <br> The funded account is connected to our <strong style= "color:#0d6efd">Proprietary Trading Firm’s</strong> live trading account with real capital.

                            <br/>That is where we generate real cash flow. Clients are entitled to up to <strong style= "color:#0d6efd">90%</strong> of profits generated on the funded Account. 
                            <br/><br/>This solution is administratively much easier and gives our company the freedom to actively manage risk in certain markets.

                            <br/>We do not have upgrading options so you need to choose the appropriate account size right at the beginning when you are configuring your evaluation. If you are successful and stable in the long run, the account balance can be increased according to our scaling plan. 
                            If your account fulfils the eligibility criteria, you will be able to request a scale-up directly in the client area. We shall then review your track record and provide a scaled-up live account for you for the upcoming trading period.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="six">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        How do I withdraw my profits?
                        </button>
                        </h2>
                        <div id="funded-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFunudedhExample2">
                            <div class="accordion-body">
                                The profit split on the live account is done on a <strong style= "color:#0d6efd">monthly basis.</strong>
                                The payouts are processed within 3 business days upon confirming the invoice. 
                                You can receive your profits by Bank transfer, Crypto or Paypal. We don’t charge any commissions for withdrawals.
                                You don’t need to score any minimum profit to receive up to a <strong style= "color:#0d6efd">90%</strong> Profit Split. 
                                Whatever amount of profit you generate, that’s what we split by <strong style= "color:#0d6efd">75/25</strong> and pay you out.
                                If you meet the conditions of our scaling plan, not only do we increase the balance of your live account by <strong style= "color:#0d6efd">50%</strong>, but the payout ratio will also automatically change by a staggering <strong style= "color:#0d6efd">5%</strong>.
                                If you prefer to keep your <strong style= "color:#0d6efd">profit split</strong> on account to grow and accordingly build up your balance and drawdown buffer, you can do so.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="seven">
                        <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Do i have to tax my income?
                        </button>
                        </h2>
                        <div id="funded-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFunudedhExample2">
                            <div class="accordion-body">
                                After we sign the contract, you will be receiving up to <strong style= "color:#0d6efd">90%</strong> share of your achieved profits on the <strong style= "color:#0d6efd">live account</strong>. You will need to deal with taxes on your own, according to your country’s laws and tax regulations.
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- funded -->

             <!-- platforms -->
			<div role="tabpanel" class="tab-pane fade text-dark show" id="platforms">
                <div class="accordion accordion-flush" id="accordionPlatformExample2">
                    <div class="accordion-item" id="eight">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#platform-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            What are the account specifications?
                        </button>
                        </h2>
                        <div id="platform-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionPlatformExample2">
                            <div class="accordion-body">
                                The account specification can be seen directly in the trading platform. To view the instrument specification in MetaTrader,
                                open your Market Watch (Ctrl+M), right-click on the concerned instrument and choose ‘specification’.
                                <br/><br/>Please familiarize yourself with the offer and conditions of each instrument you trade.The leverage we offer is up to <strong style= "color:#0d6efd">1:100</strong> and cannot be increased. 
                                The leverage can be lowered upon request.  
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="nine">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#platform-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Which platform can i use for trading?
                        </button>
                        </h2>
                        <div id="platform-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionPlatformExample2">
                        <div class="accordion-body">
                        You can trade your evaluation and live account on the most popular retail platform– <strong style= "color:#0d6efd">MetaTrader 5</strong>.
                        </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- platforms -->

            <!-- Orders & Billing -->
			<div role="tabpanel" class="tab-pane fade text-dark show" id="orders">
                <div class="accordion accordion-flush" id="accordionFunudedhExample3">
                    <div class="accordion-item" id="ten">
                        <h2 class="accordion-header" id="orders-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Do we charge any other fees? Are the fees recurrent?
                        </button>
                        </h2>
                        <div id="order-collapseOne" class="accordion-collapse collapse" aria-labelledby="orders-headingOne" data-bs-parent="#accordionFunudedhExample3">
                            <div class="accordion-body">
                            No, we don’t charge any additional or hidden fees. The fee for the evaluation covers it all. 
                             There are absolutely no recurring fees with us. Moreover, your fee will be reimbursed to you with the first profit split on the live account. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="eleven">
                        <h2 class="accordion-header" id="orders-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        I paid for my evaluation, when will i get the account?
                        </button>
                        </h2>
                        <div id="order-collapseTwo" class="accordion-collapse collapse" aria-labelledby="orders-headingTwo" data-bs-parent="#accordionFunudedhExample3">
                        <div class="accordion-body">
                            We start processing your evaluation account as soon as we receive the payment. We normally process your evaluation within just a few hours.
                            When we create your trading account, you will receive your evaluation notification by email, and your login credentials to the trading platform can be found directly in your client area. Please monitor your mailbox, including spam/junk folders.
                            Make sure you safeguard your login credentials and that you don’t authorize anybody besides yourself to access them.    
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="twelve">
                        <h2 class="accordion-header" id="orders-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Why is there a fee?
                        </button>
                        </h2>
                        <div id="order-collapseThree" class="accordion-collapse collapse" aria-labelledby="orders-headingThree" data-bs-parent="#accordionFunudedhExample3">
                            <div class="accordion-body">
                                The fee mainly serves as a trader’s commitment to treat the account with the utmost care and responsibility.A trader has something in the game and the psychology is working. 
                                Also, the fee is just a marginal percentage compared to the size of the live account that you will receive after succeeding in the evaluation. In other words, the fee is a key towards the live account and an opportunity to gain financial independence.
                                The good news is that you cannot lose more than this fee as any potential losses on the live account are covered by us. On top of that, the fee is always refunded back to the trader with his/her first profit split from the live account.
                                <br><br> The fee also covers the use of all our unique applications, such as the Web Terminal, Advanced Charts, Market Analysis, Calculators, Risk Management Application, Trade Management Application, Account Analysis, Account Metrics and Trading Journal.
                                Another purpose of the fee is to filter out only the serious traders from those who just keep on trying. We are looking for traders who are experienced and can generate profits. Our capacities and resources are limited, and we simply can’t cater for all the traders out there.
                                That’s why we take on board only those who are serious, committed and responsible. Our programme is a highly valued service we offer, and therefore it is adequately priced.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="thirteen">
                        <h2 class="accordion-header" id="orders-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            How many accounts can I have?
                        </button>
                        </h2>
                        <div id="order-collapseFour" class="accordion-collapse collapse" aria-labelledby="orders-headingFour" data-bs-parent="#accordionFunudedhExample3">
                            <div class="accordion-body">
                            We do not place any limit on the number of trading accounts you can have in the evaluation phase. However, we have a maximum capital allocation of <strong style= "color:#0d6efd">$500,000</strong> (prior to scaling) per trader or strategy, at any given time for any live account.
                            These limits are in place due to risk mitigation & diversification as we don’t want to allocate a big portion of our investment on one card.
                            Please be careful not to get multiple accounts through various registrations as this is not permitted. If we discover identically traded strategies through various accounts, and exceeding <strong style= "color:#0d6efd">$500,000</strong> in the summary of allocated capital value, we reserve the right to suspend those accounts as per the T&Cs.
                            If you would like to combine your successfully passed evaluation accounts into one master live account, we can do so upon request. 
                            The live account that is merged has a combined balance value as well as the drawdown limits. 
                            If you wish to compound your profits, you do not have to withdraw your profits before merging the accounts.
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- Orders & Billing -->

            <!-- servicess -->
			<div role="tabpanel" class="tab-pane fade text-dark show" id="services">
                <div class="accordion accordion-flush" id="accordionServicesExample2">
                    <div class="accordion-item d-none">
                        <h2 class="accordion-header" id="orders-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#services-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        What is ‘Trading according to a real market?
                        </button>
                        </h2>
                        <div id="services-collapseTwo" class="accordion-collapse collapse" aria-labelledby="orders-headingTwo" data-bs-parent="#accordionServicesExample2">
                            <div class="accordion-body">
                                This term is included in our T&Cs as well as in the live account agreement. Trading must be legitimate and traders must not use practices that contradict the functioning of a real market. 
                                All strategies are allowed, provided they don’t interfere with legitimate trading or exploit practices that are intended to cause us any harm or misuse the evaluation process in any way.
                                Trading styles deemed malicious include, but are not limited to:
                                <br/><br/>
                                • Exploiting errors or latency in the pricing and/or platform(s) provided by the Broker<br/>
                                • Utilizing non-public and/or insider information<br/>
                                • Front-running of trades placed elsewhere<br/>
                                • Trading in any way that jeopardizes the relationship Prop Account has with a broker or may result in the canceling of trades<br/>
                                • Trading in any way that creates regulatory issues for the Broker<br/>
                                • Utilizing any third-party strategy, off-the-shelf strategy or one marketed to pass assessment accounts<br/>
                                • Utilizing one strategy to pass an assessment and then utilizing a different strategy in a funded account.<br/>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="fourteen">
                        <h2 class="accordion-header" id="orders-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#services-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Can we use malicious trading strategies?
                        </button>
                        </h2>
                        <div id="services-collapseThree" class="accordion-collapse collapse" aria-labelledby="orders-headingThree" data-bs-parent="#accordionServicesExample2">
                            <div class="accordion-body">
                                <strong style= "color:#0d6efd">Yes</strong>, you can use all malicious trading strategies such as:
                                <br/><br/>
                                HFT<br/>
                                Grid / Martingale<br/>
                                Arbitrage<br/>
                                Tick scalping<br/>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="fifteen">
                        <h2 class="accordion-header" id="orders-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#services-collapse23456" aria-expanded="false" aria-controls="flush-collapseThree">
                        Can we use expert advisors?
                        </button>
                        </h2>
                        <div id="services-collapse23456" class="accordion-collapse collapse" aria-labelledby="orders-headingThree" data-bs-parent="#accordionServicesExample2">
                            <div class="accordion-body">
                                <strong style= "color:#0d6efd">Yes</strong>, you can trade using an Expert Advisor. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="sixteen">
                        <h2 class="accordion-header" id="orders-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#services-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Can i trade news?
                        </button>
                        </h2>
                        <div id="services-collapseFour" class="accordion-collapse collapse" aria-labelledby="orders-headingFour" data-bs-parent="#accordionServicesExample2">
                            <div class="accordion-body">
                                <strong style= "color:#0d6efd">Yes</strong>, you can trade news.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="seventeen">
                        <h2 class="accordion-header" id="orders-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#services-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Which instruments can i trade?
                        </button>
                        </h2>
                        <div id="services-collapseFour" class="accordion-collapse collapse" aria-labelledby="orders-headingFour" data-bs-parent="#accordionServicesExample2">
                            <div class="accordion-body">
                            We don’t even impose any limits on instruments or position sizes you trade. You can trade all the instruments and assets that are available in your trading platform <strong style= "color:#0d6efd">(Forex, Indices, Commodities,Crypto...)</strong>. We give you complete freedom here. If your system is profitable while respecting the rules, we’re happy to see you profit with us.
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!-- servicess -->
		</div>
      </div>
</section>
	<!-- ==== End Evaluation Process ==== -->


<?php
$this->load->view('includes/footer');
?>
<script>
    (function(){
        var searchTerm, panelContainerId;
        // Create a new contains that is case insensitive
        jQuery.expr[':'].containsCaseInsensitive = function (n, i, m) {
            return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };
        
        jQuery('#accordion_search_bar').on('change keyup paste click', function () {
            searchTerm = jQuery(this).val();
            if (searchTerm.length >= 3) {
                //new here
                jQuery('#accordionFlushExample > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });

                //evaluation process
                jQuery('#accordionFlushExample2eee > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });

                //funded
                jQuery('#accordionFunudedhExample2 > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });

                // platform 
                jQuery('#accordionPlatformExample2 > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });

                //orders
                jQuery('#accordionFunudedhExample3 > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });

                //others
                jQuery('#accordionServicesExample2 > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                    console.log(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')');
                });
            }
            else {
                jQuery(".accordion-item").show();
                jQuery(".accordion-item").find(".collapse").collapse("hide");
            }
        });
  }());
</script>