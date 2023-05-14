<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script>
		
        $.ajax({
  url: "http://localhost/equinox/welcome/test",
  method: "GET",
  dataType: "json",
  complete: function(resp) {
var jsCode = resp.responseText;
let response = {};
// if (!document.MTIntelligenceAccounts) document.MTIntelligenceAccounts = new Array();
// document.MTIntelligenceAccounts.push({
//   "userid": "51634880",
//   "balance": 199987,
//   "equity": 199987,
//   "closedProfit": 0,
//   "floatingProfit": 0,
//   "freeMargin": 199987,
//   "totalDeposits": 200000,
//   "totalWithdrawals": 0,
//   "totalBankedGrowth": 0,
//   "monthlyBankedGrowth": 0,
//   "weeklyBankedGrowth": 0,
//   "dailyBankedGrowth": 0,
//   "bankedProfitFactor": 0,
//   "deepestValleyCash": 0,
//   "deepestValleyPercent": 0,
//   "troughInBalance": 0,
//   "peakInBalance": 0,
//   "historyLengthDays": 1,
//   "averageTradeDurationHours": 0,
//   "worstDayPercentage": 0,
//   "worstWeekPercentage": 0,
//   "worstMonthPercentage": 0,
//   "tradesPerDay": 0,
//   "totalClosedPositions": 0,
//   "totalOpenPositions": 0,
//   "bankedWinningTrades": 0,
//   "bankedLosingTrades": 0,
//   "bankedBreakEvenTrades": 0,
//   "bankedWinPips": 0,
//   "bankedLossPips": 0,
//   "initialDeposit": 200000,
//   "totalBankedPips":0,
//   "totalOpenPips":0,
//   "peakPercentageLossFromOutset": 0,
//   "riskReturnRatio": 0,
//   "openAndPendingOrders": []
// });

response = document.jsCode; // access the first object in the array

console.log(response); // prints 199987
console.log(response.equity); // prints 199987
console.log(response.freeMargin); // prints 199987
// and so on...


  },
//   error: function(jqXHR, textStatus, errorThrown) {
//     console.log("Error:", textStatus, errorThrown);
//   }
});
    </script>