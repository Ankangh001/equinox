
<?php 
// echo "<pre>";
// print_r($res);
// echo $res['balance'];
// exit;
$this->load->view('user/includes/header'); 
?>

<style>
  .accordion .accordion-item.active {
    box-shadow: none;
  }
  div#eqLoader {
    width: fit-content;
    left: 50%;
    top: 40%;
    z-index: 999;
    position: fixed;
    height: 100vh;
  }
  label{
    white-space: normal;
  }
</style>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="card">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body row align-items-center">
                <div class="mx-auto" >
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card-body row align-items-center">
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Max Drawdown 
                      <!-- <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span> -->
                    </h6>
                    <input readonly class="form-control" value="$<?= @$_GET['max'] ?>" />
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Daily Drawdown
                      <!-- <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span> -->
                    </h6>
                    <input readonly class="form-control" value="$<?= @$_GET['daily'] ?>" />
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Closed Profit
                      <!-- <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" 
                        data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span> -->
                    </h6>
                    <input readonly id="closed_profit" class="form-control" value="0" />
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Floating Profit
                      <!-- <span class="text-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" 
                        data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                        <i class='bx bx-info-circle' ></i>
                      </span> -->
                    </h6>
                    <input readonly id="floating_profit" class="form-control" value="0" />
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
                                  <label class="text-dark fw-bold col-md-12 col-form-label text-white">
                                    Maximum drawdown is the maximum your account
                                    can drawdown before you would hard breach
                                    your account. When you open the account,
                                    your Max Drawdown is set at 10% of
                                    your starting balance. This will be
                                    static for the duration of the account.
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div id="max_dd">
                    </div>
                  </td>
                </tr>

                <?php if($_GET['type'] == 'normal') {?>
                <tr>
                  <td style="width:50%">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne2">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne2" aria-expanded="false" aria-controls="accordionOne2">
                          Maximum Daily Loss
                        </button>
                      </h2>
                      <div id="accordionOne2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">      
                        <div class="accordion-body p-1 bg-secondary">
                          <div class="row">
                            <div class="col-xl">
                              <div class="row px-1">
                                <label class="text-dark fw-bold col-md-12 col-form-label text-white">
                                  Daily Loss Limit is calculated based on the previous day’s end of day 
                                  (5pm EST) equity and balance. Example of daily drawdown: If you have a
                                  $105,000 account balance, and you have $5000 floating profit going into 
                                  the new day this will be your buffer, and you can still go down to $99,750 
                                  before hitting daily loss limit.
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
                    </div>
                  </td>
                </tr>
                <?php }?>

                <tr>
                  <td style="width:50%">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne3">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne3" aria-expanded="false" aria-controls="accordionOne3">
                            Profit Target
                          </button>
                        </h2>
                        <div id="accordionOne3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">      
                          <div class="accordion-body p-1 bg-secondary">
                            <div class="row">
                              <div class="col-xl">
                                <div class="row px-1">
                                  <label class="text-dark fw-bold col-md-12 col-form-label text-white">
                                    Profit target means that a trader reaches a profit
                                    in the sum of closed positions on the assigned trading account.
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div id="pt">
                    </div>
                  </td>
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
              <tbody id="stats" class="table-border-bottom-0">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

     <!-- Orders History -->
     <div class="row mt-5">
      <div class="col-lg-12">
        <h5 class="card-title text-center text-primary">Open Orders</h5>
      </div>
    </div>
    <div class="card">
      <div class="table-responsive text-nowrap" id="openOrdersTable">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Order ID</th>
              <th>Symbol</th>
              <th>Order Type</th>
              <th>Execution Type</th> 
              <th>Lots Size</th>
              <th>Open Price</th>
              <th>Open Time</th>
              <th>Profit</th>
              <th>Swap</th>
              <th>Commission</th>
              <th>Stop Loss</th>
              <th>Take Profit</th>
            </tr>
          </thead>
          <tbody id="openOrders" class="table-border-bottom-0">
             
          </tbody>
        </table>
      </div>
    </div>


    <!-- Orders History -->
    <div class="row mt-5">
      <div class="col-lg-12">
        <h5 class="card-title text-center text-primary">Orders History</h5>
      </div>
    </div>
    <div class="card">
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Order ID</th>
              <th>Symbol</th>
              <th>Order Type</th>
              <th>Execution Type</th> 
              <th>Lots Size</th>
              <th>Open Price</th>
              <th>Closed Price</th>
              <th>Open Time</th>
              <th>Closed Time</th>
              <th>Profit</th>
              <th>Swap</th>
              <th>Commission</th>
              <th>Stop Loss</th>
              <th>Take Profit</th>
            </tr>
          </thead>
          <tbody id="orders" class="table-border-bottom-0">
             
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<?php $this->load->view('user/includes/footer');?>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/2.0.1/chartjs-plugin-zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Metrics</h4>`);

  const ctx = document.getElementById('myChart');

  $('#orders').css('opacity', '0.5');
  $('#orders').html(`Loading Orders...`);

  $('#openOrders').css('opacity', '0.5');
  $('#openOrders').html(`Loading Open Orders...`);

  var accountNum ={};
  accountNum.num = <?php echo $_GET['account']; ?>;
  let accountSize = <?php echo $_GET['size']; ?>;
  let maxDD = <?php echo $_GET['max']; ?>;
  let target = <?php echo $_GET['target']; ?>;
  let checkAmount = accountSize - maxDD;
  let tempChartData = [];
  let chartData = [];
  let chartLabel = [];
  let temp = 0;

  let positiveSum = 0;
  let negativeSum = 0;

  const myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [0, 1],
        datasets: [
          {
            label: 'Balance Curve',
            data: [0, accountSize],
            borderWidth: 3,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }
        ]
      },
      options: {
        plugins: {
          zoom: {
            zoom: {
              wheel: {
                enabled: true,
              },
              pinch: {
                enabled: true
              },
              mode: 'xy',
            }
          }
        }
      }
    });
  
  let loader = "<?=base_url('assets/img/loader.gif')?>";
  $('.container-p-y').css('opacity', '0.2');
  $('.content-wrapper').prepend(`
    <div id="eqLoader">
      <img src="${loader}" alt="loader" />
    </div>
  `);

  function getAccounts(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/accounts'); ?>",
      data: accountNum,
      dataType: "html",
      success: function(data){

        let res = JSON.parse(data);
        $('#closed_profit').val(((res['balance'])-accountSize).toFixed(2));
        $('#floating_profit').val(((res['equity'])-(res['balance'])).toFixed(2));

        //load statistics
        $('#stats').html(`
          <tr>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Balance</p>
                <span class="text-dark fw-bold text-left">$${res['balance']}</span>
              </div>
            </td>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Equity</p>
                <span class="text-dark fw-bold text-left">$${res['equity']}</span>
              </div>
            </td>
          </tr>
        `);


        //max drawdown render
        $('#max_dd').html('');
        if(res['equity'] > checkAmount){
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
        }else{
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        };

        //profit target render
        $('#pt').html('');
        if(((res['balance'])-accountSize).toFixed(2) > target){  
          $('#pt').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
        }else{
          $('#pt').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        }

        $('#orders').html('');

        //EMPTY ARRAY EVERYTIME
        chartData = [];
        chartLabel = [];
        tempChartData = [];

        res['orders'].forEach((element, index) => {

          chartLabel.push(index);
          tempChartData.push(element['profit']);

          $('#orders').append(`
            <tr>
              <td>${element['ticket'] ? element['ticket'] : '-'}</td>
              <td>${element['symbol'] ? element['symbol'] : '-'}</td>
              <td>${element['placedType'] == 'ByDealer' ? '-' : element['orderType']}</td>
              <td>${element['placedType'] ? element['placedType'] : '-'}</td>
              <td>${element['lots'] ? element['lots'] : '-'}</td>
              <td>${element['openPrice'] ? element['openPrice'].toFixed(4) : '-'}</td>
              <td>${element['closePrice'] ? element['closePrice'].toFixed(4) : '-'}</td>
              <td>${element['openTime'] ? element['openTime'] : '-'}</td>
              <td>${element['closeTime'] == '0001-01-01T00:00:00' ? '--' : element['closeTime']}</td>
              <td>${element['profit'] ? element['profit'] : '-'}</td>
              <td>${element['swap'] ? element['swap'] : '-'}</td>
              <td>${element['commission'] ? element['commission'] : '-'}</td>
              <td>${element['stopLoss'] ? element['stopLoss'] : '-'}</td>
              <td>${element['takeProfit'] ? element['takeProfit'] : '-'}</td>
            </tr>
          `);
        });

        chartData[0] = accountSize;

        tempChartData.forEach((element, i) => {
          if(i != 0){
            chartData[i] = (chartData[i-1] + tempChartData[i]);
          }
        });

        myLineChart.data.labels = chartLabel;
        myLineChart.data.datasets[0].data = chartData;
        myLineChart.update();

        $('#openOrders').html('');
        
        if((res['openorders'].length) > 0){
          res['openorders'].forEach((element) => {
            $('#openOrders').append(`
                <tr>
                  <td>${element['ticket'] ? element['ticket'] : '-'}</td>
                  <td>${element['symbol'] ? element['symbol'] : '-'}</td>
                  <td>${element['orderType'] ? element['orderType'] : '-'}</td>
                  <td>${element['placedType'] ? element['placedType'] : '-'}</td>
                  <td>${element['lots'] ? element['lots'] : '-'}</td>
                  <td>${element['openPrice'] ? element['openPrice'] : '-'}</td>
                  <td>${element['openTime'] ? element['openTime'] : '-'}</td>
                  <td>${element['profit'] ? element['profit'] : '-'}</td>
                  <td>${element['swap'] ? element['swap'] : '-'}</td>
                  <td>${element['commission'] ? element['commission'] : '-'}</td>
                  <td>${element['stopLoss'] ? element['stopLoss'] : '-'}</td>
                  <td>${element['takeProfit'] ? element['takeProfit'] : '-'}</td>
                </tr>
              `);
            }
          );
        }else{
          $('#openOrdersTable table').html('');
          $('#openOrdersTable').append(`<p class="d-block text-muted text-center pt-3 w-100">No Open Orders Found</p>`);
        }

        $('#orders').css('opacity', '1');
        $('#openOrders').css('opacity', '1');
        $('#eqLoader').css('display', 'none');
        $('.container-p-y').css('opacity', '1');
        $('.container-p-y').fadeIn();
      },
      error: function() {
        $('.container-p-y').html('');
        $('.container-p-y').html(`
          <div class="row my-5 mx-auto">
            <div class="col-md-6 m-auto">
              <div class="card">
                  <div class="card-body text-center text-muted ">
                    😧 <br/>Oops ! Unable to found metrics related to this account please contact to the support team.
                  </div>
              </div>
            </div>
          </div>
        `);
        $('#eqLoader').css('display', 'none');
        $('.container-p-y').css('opacity', '1');
      }
    });
  }

  getAccounts();
  // setTimeout(() => {
  //   setInterval(() => {
  //     getAccounts();
  //   }, 3500);
  // }, 4000);

</script>