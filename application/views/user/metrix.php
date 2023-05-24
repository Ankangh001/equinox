
<?php $this->load->view('user/includes/header'); ?>

<style>
  .accordion .accordion-item.active {
      box-shadow: none;
  }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Promotions</h4> -->
    <div class="row">
      <div class="col-lg-10">
        <h5 class="card-title">Current Result</h5>
      </div>
      <div class="col-lg-2 pointer">
        &nbsp;&nbsp;&nbsp;<i class="bx bx-refresh"></i>Refresh 
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="card">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-body row align-items-center">
              <iframe src="//www.fxblue.com/fxbluechart.aspx?c=ch_cumulativeprofit&id=51634880" frameborder="0" width="100%" height="250"><a href="//www.fxblue.com">FX Blue - free tools and services for FX and CFD traders</a></iframe>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card-body row align-items-center">
                <div class="mb-3 col-lg-12 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Max Drawdown 
                      <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span>
                    </h6>
                    <input readonly class="form-control" value="$400" />
                </div>

                <div class="mb-3 col-lg-12 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Daily Drawdown
                      <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span>
                    </h6>
                    <input readonly class="form-control" value="$400" />
                </div>

                <div class="mb-3 col-lg-12 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Total Profit
                      <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" 
                        data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span>
                    </h6>
                    <input readonly id="total_profit" class="form-control" value="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Objectives -->
    <div class="row">
      <div class="col-lg-12">
        <h5 class="card-title text-center text-primary">Objectives</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th>Trading Objectives</th>
                  <th>Results</th>
                  <th>Summary</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr>
                  <td style="width:50%">
                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" 
                            data-bs-toggle="collapse" data-bs-target="#accordionOne" 
                            aria-expanded="false" aria-controls="accordionOne">Maximum Drawdown</button>
                        </h2>
                        <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">      
                          <div class="accordion-body p-1 bg-secondary">
                            <div class="row">
                              <div class="col-xl">
                                <div class="row px-1">
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </td>
                  <td><div class="d-flex align-items-center justify-content-start" id="max_drawdown"></div></td>
                  <td><div class="d-flex align-items-center justify-content-start"><i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass</div></td>
                </tr>


                <tr>
                  <td style="width:50%">
                    <div class="accordion" id="accordionExample2">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne2" aria-expanded="false" aria-controls="accordionOne2">
                            Maximum Daily Loss $0.00
                          </button>
                        </h2>

                        <div id="accordionOne2" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">      
                          <div class="accordion-body p-1 bg-secondary">
                            <div class="row">
                              <div class="col-xl">
                                <div class="row px-1">
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </td>
                  <td><div class="d-flex align-items-center justify-content-start" id="max_daily_loss"></div></td>
                  <td><div class="d-flex align-items-center justify-content-start"><i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass</div></td>
                </tr>

                <tr>
                  <td style="width:50%">
                    <div class="accordion" id="accordionExample2">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne3" aria-expanded="false" aria-controls="accordionOne3">
                            Total Profit
                          </button>
                        </h2>

                        <div id="accordionOne3" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">      
                          <div class="accordion-body p-1 bg-secondary">
                            <div class="row">
                              <div class="col-xl">
                                <div class="row px-1">
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Account size: &nbsp;&nbsp;&nbsp;&nbsp; $100,000</label>
                                  <label for="html5-text-input" class="text-dark fw-bold col-md-12 col-lg-6 col-form-label text-white">Start Date: &nbsp;&nbsp;&nbsp;&nbsp; 12/12/2022</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </td>
                  <td><div class="d-flex align-items-center justify-content-start" id="closed_profit"></div></td>
                  <td><div class="d-flex align-items-center justify-content-start text-danger"><i class="bx bx-x-circle"></i>&nbsp;&nbsp;Failed</div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <!-- Statistics -->
    <div class="row mt-5">
      <div class="col-lg-12">
        <h5 class="card-title text-center text-primary">Statistics</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table">
              <!-- <thead class="table-light">
                <tr>
                  <th>Trading Objectives</th>
                  <th>Results</th>
                  <th>Summary</th>
                </tr>
              </thead> -->
              <tbody class="table-border-bottom-0">
                <tr>
                  <td>
                    <div class="hol">
                      <p class="text-dark text-left" style="margin-bottom:-1px">Equity</p>
                      <span class="text-dark fw-bold text-left">$200,000</span>
                    </div>
                  </td>
                  <td>
                    <div class="hol">
                      <p class="text-dark text-left" style="margin-bottom:-1px">Average Profit</p>
                      <span class="text-dark fw-bold text-left">$0.00</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php //header('Access-Control-Allow-Origin: *'); ?>

    <!-- / Content -->
    <?php $this->load->view('user/includes/footer');?>
<script>


var accountNum ={};
accountNum.num = <?php echo $_GET['account']; ?>;
$('.container-xxl').css('opacity','0.4');
$.ajax({
    type: "POST",
    url: "<?php echo base_url('user/metrix/userMetrix'); ?>",
    data: accountNum,
    dataType: "html",
    success: function(data){
      $('.container-xxl').css('opacity','1');
      var res = JSON.parse(data);
      $('#total_profit').val(res.closedProfit);  
      $('#max_drawdown').text(res.peakPercentageLossFromOutset);  
      $('#max_daily_loss').text(res.worstDayPercentage);  
      $('#closed_profit').text(res.closedProfit);  
    },
    error: function() { 
      alert("Error posting feed."); 
    }
});

</script>