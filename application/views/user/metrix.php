
<?php 
$this->load->view('user/includes/header'); 
$this->CI = & get_instance();
$encrypted = $_GET['account'];
$myString =  $this->CI->decrypt(str_replace(' ','+', $encrypted), "mm");
$myArray = explode(',', $myString);
// print_r($myArray);
// die;
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
  .bg-light{
    background-color:#eceef1 !important;
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
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Max Drawdown</h6>
                    <input readonly name="maxDrawdown" id="max--Drawdown" class="form-control" value="$<?= @$myArray[4] ?>" />
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Allowed Daily Drawdown</h6>
                    <input readonly name="dailyDrawdown" id="daily--Drawdown" class="form-control" value="$<?= @$myArray[5] ?>" />
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Closed Profit</h6>
                    <div id="closed_profit" ></div>
                </div>
                <div class="mb-3 col-lg-3 col-md-3 mb-0">
                    <h6 class="alert-heading fw-bold mb-3 text-left">Floating Profit</h6>
                    <div id="floating_profit" ></div>
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
                                  <label for="max--Drawdown" class="text-dark fw-bold col-md-12 col-form-label text-white">Maximum drawdown is the maximum your account can drawdown before you would hard breach your account. When you open the account, your Max Drawdown is set at 10% of your starting balance. This will be static for the duration of the account.</label>
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
                      <div class="d-flex align-items-center justify-content-start text-success" >
                        <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
                      </div>
                    </div>
                  </td>
                </tr>

                <?php if($myArray[3] == 'Normal') {?>
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
                                <label class="text-dark fw-bold col-md-12 col-form-label text-white" for="max--Drawdown">
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
                    <div id="dailyDrawdown"></div>
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
                                  <label class="text-dark fw-bold col-md-12 col-form-label text-white" for="max--Drawdown">
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

  let accountNum ={};
  accountNum.ieqd = "<?= $myArray[0] ?>";  accountNum.peqd = "<?= $myArray[1] ?>";  accountNum.aeqe = "<?= $myArray[2] ?>";  accountNum.teqe = "<?= $myArray[3] ?>";
  accountNum.meqx = "<?= $myArray[4] ?>";  accountNum.deqy = "<?= $myArray[5] ?>";  accountNum.peqt = "<?= $myArray[6] ?>";  accountNum.ieqp = "<?= $myArray[7] ?>";
  accountNum.peqt = "<?= $myArray[8] ?>";  accountNum.eqid = "<?= $myArray[9] ?>";

  const r = window.btoa(JSON.stringify(accountNum));
  let saveStartDate ={};

  let accountSize = <?= $myArray[2]; ?>;
  let maxDD = <?= $myArray[4]; ?>;
  let target = <?= $myArray[5]; ?>;
  let checkAmount = accountSize - maxDD;
  let tempChartData = [];
  let chartData = [];
  let chartLabel = [];
  let lots = 0;
  let equity = 0;

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

  function userFailed(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/userFailed'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let maxDDStatus = JSON.parse(data).status;
        if(maxDDStatus == 200){
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        }
      },
      error: function(data){
        return false;
      }
    });
  }
  
  function checkIfFail(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/checkIfFail'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let maxDDStatus = JSON.parse(data).status;
        if(maxDDStatus == 200){
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        }else if(maxDDStatus == 400){
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
        }
      },
      error: function(data){
        return false;
      }
    });
  }
  
  function saveDate(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/saveStartDate'); ?>",
      data: saveStartDate,
      dataType: "html",
      success: function(data){
        let res = JSON.parse(data);
      },
      error: function(data){
        alert(data);
      }
    })
  };

  function checkMaxDailyLoss(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/getEquity'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let res = JSON.parse(data);
        equity = res.equity;
      },
      error: function(data){
        alert(data);
      }
    })
  };

  function makeMaxDailylossFail(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/makeMaxDailylossFail'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let maxDDStatus = JSON.parse(data).status;
        if(maxDDStatus == 200){
          $('#dailyDrawdown').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        }
      },
      error: function(data){
        return false;
      }
    });
  }

  function checkIfMaxDailyLossFail(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/checkIfMaxDailyLossFail'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let maxDDStatus = JSON.parse(data).status;
        if(maxDDStatus == 200){
          $('#dailyDrawdown').html(`
            <div class="d-flex align-items-center justify-content-start text-danger" >
              <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
            </div>
          `);
        }else if(maxDDStatus == 400){
          $('#dailyDrawdown').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
        }
      },
      error: function(data){
        return false;
      }
    });
  }

  function getAccounts(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/accounts'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){

        let res = JSON.parse(data);

        if(((res['balance'])-accountSize) < 0){
          $('#closed_profit').html(`<span class="text-danger readonly bg-light form-control">`+((res['balance'])-accountSize).toFixed(2)+`</span>`);
        }else if(((res['balance'])-accountSize) > 0){
          $('#closed_profit').html(`<span class="text-success readonly bg-light form-control">`+((res['balance'])-accountSize).toFixed(2)+`</span>`);
        }else{
          $('#closed_profit').html(`<span class="text-dark readonly bg-light form-control">`+((res['balance'])-accountSize).toFixed(2)+`</span>`);
        }

        if((res['equity'])-(res['balance']) < 0){
          $('#floating_profit').html(`<span class="text-danger readonly bg-light form-control">`+((res['equity'])-(res['balance'])).toFixed(2)+`</span>`);
        }else if((res['equity'])-(res['balance']) > 0){
          $('#floating_profit').html(`<span class="text-success readonly bg-light form-control">`+((res['equity'])-(res['balance'])).toFixed(2)+`</span>`);
        }else{
          $('#floating_profit').html(`<span class="text-dark readonly bg-light form-control">`+((res['equity'])-(res['balance'])).toFixed(2)+`</span>`);
        }

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
                <span class="text-dark fw-bold text-left">$${res['equity'].toFixed(2)}</span>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Cummulative Return</p>
                ${(((((res['balance']-accountSize))/accountSize)*100).toFixed(2)) < 0 ? 
                  `<span class="text-danger fw-bold text-left">${((((res['balance']-accountSize))/accountSize)*100).toFixed(2)}%</span>`:
                  (
                    (((((res['balance']-accountSize))/accountSize)*100).toFixed(2)) > 0 ?
                    `<span class="text-success fw-bold text-left">${((((res['balance']-accountSize))/accountSize)*100).toFixed(2)}%</span>`:
                    `<span class="text-dark fw-bold text-left">${((((res['balance']-accountSize))/accountSize)*100).toFixed(2)}%</span>`
                  )
                }
                
              </div>
            </td>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Floating Return</p>
                ${((((((res['equity'])-(res['balance'])))/accountSize)*100).toFixed(2)) < 0 ?
                  `<span class="text-danger fw-bold text-left">${(((((res['equity'])-(res['balance'])))/accountSize)*100).toFixed(2)}%</span>`:
                  (
                    ((((((res['equity'])-(res['balance'])))/accountSize)*100).toFixed(2)) > 0 ?
                    `<span class="text-success fw-bold text-left">${(((((res['equity'])-(res['balance'])))/accountSize)*100).toFixed(2)}%</span>`:
                    `<span class="text-dark fw-bold text-left">${(((((res['equity'])-(res['balance'])))/accountSize)*100).toFixed(2)}%</span>`
                  )
                }
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Total Trades</p>
                <span class="text-dark fw-bold text-left">${(res['orders'].length)-1}</span>
              </div>
            </td>
            <td>
              <div class="hol">
                <p class="text-dark text-left" style="margin-bottom:-1px">Lots Traded</p>
                <span class="text-dark fw-bold text-left" id="lots"></span>
              </div>
            </td>
          </tr>
        `);

        //max drawdown render
        if(res['equity'] > checkAmount){
          checkIfFail();
        }else{
          userFailed();
        };

        //max daily loss
        // console.log(equity);

        // console.log('curent equity  ' + res['equity']);
        // console.log('equity ' + equity);
        // console.log('max daily loss ' + maxDD);

        if(res['equity'] > (equity - maxDD)){
          checkIfMaxDailyLossFail();
        }else{
          makeMaxDailylossFail();
        }

        //profit target render
        if(((res['balance'])-accountSize).toFixed(2) >= target){ 
          //check if previously failed or not 
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/metrix/checkFailPt'); ?>",
            data: {r},
            dataType: "html",
            success: function(data){
              let maxDailyStatus = JSON.parse(data).status;
              if(maxDailyStatus == 200){
                $('#pt').html(`
                  <div class="d-flex align-items-center justify-content-start text-danger" >
                    <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
                  </div>
                `);
              }else if(maxDailyStatus == 400){
                $('#pt').html(`
                  <div class="d-flex align-items-center justify-content-start text-success" >
                    <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
                  </div>
                `);
              }
            },
            error: function(data){
              console.log(data);
            }
          });
        }else{
          //make the user fail
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/metrix/userFailedPT'); ?>",
            data: {r},
            dataType: "html",
            success: function(data){
              let pTargetDStatus = JSON.parse(data).status;
              if(pTargetDStatus == 200){
                $('#pt').html(`
                  <div class="d-flex align-items-center justify-content-start text-danger" >
                    <i class="bx bx-x-circle text-danger"></i>&nbsp;&nbsp;Failed
                  </div>
                `);
              }
            },
            error: function(data){
              console.log(data);
            }
          });
        }

        $('#orders').html('');

        //EMPTY ARRAY EVERYTIME
        chartData = [];
        chartLabel = [];
        tempChartData = [];
        lots = 0;

        res['orders'].forEach((element, index) => {
          lots += element['lots'];
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
        $('#lots').text(lots.toFixed(2))
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
          // console.log((res['openorders'][0]['openTime']).slice(0,10));
          saveStartDate.date = (res['openorders'][0]['openTime']).slice(0,10);
          saveDate();
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
          $('#openOrders').html('');
          $('#openOrders').append(`
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <p class="d-block text-muted text-center pt-3 w-100">No Open Orders Found</p>
            </td>
          </tr>
          `);
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
                    😧 <br/>Your Credentials has not been updated yet.
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

  function checkUserStatus(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('user/metrix/checkUserStatus'); ?>",
      data: {r},
      dataType: "html",
      success: function(data){
        let dataRes = JSON.parse(data).status;
        if(dataRes == 200){
          getAccounts();
          $('#max_dd').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
          $('#dailyDrawdown').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
          $('#pt').html(`
            <div class="d-flex align-items-center justify-content-start text-success" >
              <i class="bx bx-check-circle text-success"></i>&nbsp;&nbsp;Pass
            </div>
          `);
        }else if(dataRes == 400){
          getAccounts();
          setTimeout(() => {
            checkUserStatus();
          }, 10000);
        }
      },
      error: function(data){
        return false;
      }
    });
  }

  checkUserStatus();
</script>