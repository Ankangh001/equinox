<?php
$this->load->view('includes/header');
?>
<style>
    #myFilter input {
        border-radius: 30px;
    }
    #myFilter {
        width: 50%;
        display: inline-block;
        margin: 2rem 26rem !important;
    }
    button.btn.search {
        position: relative;
        right: 3rem;
    }
</style>
<main id="main">
	<!-- ======= Why Us Section ======= -->
    <section id="faq" style="margin-top: 8rem">
        <div class="container" data-aos="fade-up">
            <div class="section-title  text-center">
                <h2>Find the Rules</h2>
            </div>
            <div class="d-flex m-5" id="myFilter">
                <input type="text" style="width:inherit" id="accordion_search_bar" class="col-lg-3 form-control" placeholder="Search for Rules">
                <button class="btn search">
                    <i class="fas fa-search text-dark"></i>
                </button>
            </div>
            <ul class="nav nav-tabs justify-content-center mb-5 border-none" role="tablist">
                <li class="nav-item m-2 pointer">
                    <div href="#profile" role="tab" data-toggle="tab" class="flex justify-center active items-center flex-row px-16p py-8p 
                            bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
                        <strong>&nbsp;&nbsp;&nbsp;Normal&nbsp;&nbsp;&nbsp;</strong>
                    </div>
                </li>
                <li class="nav-item m-2 pointer">
                    <div href="#buzz" role="tab" data-toggle="tab" class="flex justify-center items-center flex-row px-16p py-8p 
                            bg-primary-500/16 border-pricing border-primary-500 rounded-full -my-12p h-40p gap-8p">
                        <strong>Aggressive</strong>
                    </div>
                </li>            
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade text-dark show in active" id="profile">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item" id="1">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1">
                            How do you calculate the daily loss limit?
                            </button>
                            </h2>
                            <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                Daily loss limit is calculated as below:
                                <br>
                                <br>
                                Daily Loss Limit is calculated based on the previous day’s end of day (5pm EST) equity and balance. 
                                Example of daily drawdown: If you have a <strong style= "color:#0d6efd">$105,000</strong> account balance, and you have <strong style= "color:#0d6efd">$5000</strong> floating profit going into the new day this will be your buffer, and you can still go down to <strong style= "color:#0d6efd">$99,750</strong> before hitting daily loss limit.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="2">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo1" aria-expanded="false" aria-controls="flush-collapseTwo1">
                                    How do you calculate the overall max drawdown?  
                                </button>
                            </h2>
                            <div id="flush-collapseTwo1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Maximum drawdown is the maximum your account can drawdown before you would hard breach your account.  When you open the account, your Max Drawdown is set at <strong style= "color:#0d6efd">10%</strong> of your starting balance. This will be static for the duration of the account.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="3">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1" aria-expanded="false" aria-controls="flush-collapseThree1">
                                    Can i hold position over the weekend?
                                </button>
                            </h2>
                            <div id="flush-collapseThree1" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <strong style= "color:#0d6efd">Yes</strong>, you are allowed to hold over the weekend.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="4">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour1" aria-expanded="false" aria-controls="flush-collapseFour1">
                                    Do i have to place a stop loss?
                                </button>
                            </h2>
                            <div id="flush-collapseFour1" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <strong style= "color:#0d6efd">No</strong>, you do not have to use a stop loss.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="5">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    Is there any consistency rule?
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <strong style= "color:#0d6efd">No</strong>, there is no consistency rule
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div role="tabpanel" class="tab-pane fade text-dark show" id="buzz">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <div class="accordion-item" id="6">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneeee" aria-expanded="false" aria-controls="flush-collapseOneeee">
                                    How do you calculate the overall max drawdown?                                                        
                                </button>
                            </h2>
                            <div id="flush-collapseOneeee" class="accordion-collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                Maximum drawdown is the maximum your account can drawdown before you would hard breach your account. 
                                When you open the account, your Max Drawdown is set at <strong style= "color:#0d6efd">10%</strong> of your starting balance. This will be static for the duration of the account.   
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="7">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwoeee" aria-expanded="false" aria-controls="flush-collapseTwoeee">
                                    Can i hold position over the weekend?
                                </button>
                            </h2>
                            <div id="flush-collapseTwoeee" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <strong style= "color:#0d6efd">Yes</strong>, you are allowed to hold over the weekend.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="8">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThreeeee" aria-expanded="false" aria-controls="flush-collapseThreeeee">
                                    Is there any consistency rule?
                                </button>
                            </h2>
                            <div id="flush-collapseThreeeee" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <strong style= "color:#0d6efd">No</strong>, there is no consistency rule
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Pricing -->
	
  </main><!-- End #main -->






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
                });

                //evaluation process
                jQuery('#accordionFlushExample2 > .accordion-item').each(function () {
                    panelContainerId = '#' + jQuery(this).attr('id');
                    jQuery(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                    jQuery(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show().find(".collapse").collapse("show");
                });
            }
            else {
                jQuery(".accordion-item").show();
                jQuery(".accordion-item").find(".collapse").collapse("hide");
            }
        });
  }());
</script>