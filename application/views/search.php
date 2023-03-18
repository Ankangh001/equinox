<style>
        .table {
        background: #fff;
        padding: 2rem;
        box-shadow: 3px 3px 13px #c5c5c5;
        border-radius: 12px;
    }
        td {
        font-size: 1.18rem;
        margin-bottom: 1rem;
    }tr{
        border:none;
    }
    form{
        padding-bottom: 0.5rem;padding: 0;margin: 1rem auto;
    }.btn-light:hover {
        color: #000 !important;
        background-color: #616467 !important;
        border-color: #616467 !important;
    }
    
   @media screen and (max-width: 992px){
.home-input-div{
    width: 100%;
    float: right !important;
    position: absolute !important;
    right: 0 !important;
}}
</style>
<div style="width:90%; margin:auto">
    
    

    <div style="margin:2rem auto 0 auto" class="row">
        <div class="col-sm-6">
                <h3 class='custom-pad' style='font-size: 2.5rem; color: #111e31; '><span style="font-family:Caveat;">Addressme</span> Wallet Search</h3>

        </div>
        <div class="col-sm-6 ">
            <form method="POST" action="<?=base_url()?>search" class='custom-pad form-group  d-flex'>
                <input style="border-top-right-radius: 0;border-bottom-right-radius: 0;" type='text' id='transaction' name='search_query' class='form-control home-input' placeholder='Enter Wallet Address' required>
                <button style="border-top-left-radius:0 !important; border-bottom-left-radius:0 !important;" type="submit" class="btn btn-light"><i class='fa fa-search'></i></button>
            </form>
        </div>
        
    </div>
    <hr>

<?php
    if(@$response['error']){
        echo $response['error'];
    }else{
    echo "
    <div style='margin:2rem auto 0 auto; padding: 2rem 0;' class='row'>
        <div class='col-sm-6'>
                 <h3 class='custom-pad' style='font-size: 1.75rem; color: #111e31;'>Account Details</h3>

        </div>
        <div class=' home-input-div col-sm-6'>
            <select style=' width: 30%; margin: 0; float: right;' class='form-control' id='currency' name=''>
            	<option value='BTC' selected='selected'>BTC</option>
            	<option value='USD'>United States Dollars</option>
            	<option value='EUR'>Euro</option>
            	<option value='GBP'>United Kingdom Pounds</option>
            	<option value='DZD'>Algeria Dinars</option>
            	<option value='ARP'>Argentina Pesos</option>
            	<option value='AUD'>Australia Dollars</option>
            	<option value='ATS'>Austria Schillings</option>
            	<option value='BSD'>Bahamas Dollars</option>
            	<option value='BBD'>Barbados Dollars</option>
            	<option value='BEF'>Belgium Francs</option>
            	<option value='BMD'>Bermuda Dollars</option>
            	<option value='BRR'>Brazil Real</option>
            	<option value='BGL'>Bulgaria Lev</option>
            	<option value='CAD'>Canada Dollars</option>
            	<option value='CLP'>Chile Pesos</option>
            	<option value='CNY'>China Yuan Renmimbi</option>
            	<option value='CYP'>Cyprus Pounds</option>
            	<option value='CSK'>Czech Republic Koruna</option>
            	<option value='DKK'>Denmark Kroner</option>
            	<option value='NLG'>Dutch Guilders</option>
            	<option value='XCD'>Eastern Caribbean Dollars</option>
            	<option value='EGP'>Egypt Pounds</option>
            	<option value='FJD'>Fiji Dollars</option>
            	<option value='FIM'>Finland Markka</option>
            	<option value='FRF'>France Francs</option>
            	<option value='DEM'>Germany Deutsche Marks</option>
            	<option value='XAU'>Gold Ounces</option>
            	<option value='GRD'>Greece Drachmas</option>
            	<option value='HKD'>Hong Kong Dollars</option>
            	<option value='HUF'>Hungary Forint</option>
            	<option value='ISK'>Iceland Krona</option>
            	<option value='INR'>India Rupees</option>
            	<option value='IDR'>Indonesia Rupiah</option>
            	<option value='IEP'>Ireland Punt</option>
            	<option value='ILS'>Israel New Shekels</option>
            	<option value='ITL'>Italy Lira</option>
            	<option value='JMD'>Jamaica Dollars</option>
            	<option value='JPY'>Japan Yen</option>
            	<option value='JOD'>Jordan Dinar</option>
            	<option value='KRW'>Korea (South) Won</option>
            	<option value='LBP'>Lebanon Pounds</option>
            	<option value='LUF'>Luxembourg Francs</option>
            	<option value='MYR'>Malaysia Ringgit</option>
            	<option value='MXP'>Mexico Pesos</option>
            	<option value='NLG'>Netherlands Guilders</option>
            	<option value='NZD'>New Zealand Dollars</option>
            	<option value='NOK'>Norway Kroner</option>
            	<option value='PKR'>Pakistan Rupees</option>
            	<option value='XPD'>Palladium Ounces</option>
            	<option value='PHP'>Philippines Pesos</option>
            	<option value='XPT'>Platinum Ounces</option>
            	<option value='PLZ'>Poland Zloty</option>
            	<option value='PTE'>Portugal Escudo</option>
            	<option value='ROL'>Romania Leu</option>
            	<option value='RUR'>Russia Rubles</option>
            	<option value='SAR'>Saudi Arabia Riyal</option>
            	<option value='XAG'>Silver Ounces</option>
            	<option value='SGD'>Singapore Dollars</option>
            	<option value='SKK'>Slovakia Koruna</option>
            	<option value='ZAR'>South Africa Rand</option>
            	<option value='KRW'>South Korea Won</option>
            	<option value='ESP'>Spain Pesetas</option>
            	<option value='XDR'>Special Drawing Right (IMF)</option>
            	<option value='SDD'>Sudan Dinar</option>
            	<option value='SEK'>Sweden Krona</option>
            	<option value='CHF'>Switzerland Francs</option>
            	<option value='TWD'>Taiwan Dollars</option>
            	<option value='THB'>Thailand Baht</option>
            	<option value='TTD'>Trinidad and Tobago Dollars</option>
            	<option value='TRL'>Turkey Lira</option>
            	<option value='VEB'>Venezuela Bolivar</option>
            	<option value='ZMK'>Zambia Kwacha</option>
            	<option value='EUR'>Euro</option>
            	<option value='XCD'>Eastern Caribbean Dollars</option>
            	<option value='XDR'>Special Drawing Right (IMF)</option>
            	<option value='XAG'>Silver Ounces</option>
            	<option value='XAU'>Gold Ounces</option>
            	<option value='XPD'>Palladium Ounces</option>
            	<option value='XPT'>Platinum Ounces</option>
            </select>
        </div>
        
    </div>
        
            <div class='table'>
            <table>
                <tbody>
                    <tr>
                        <td  style='padding: 0 1.2rem 0 0; border: none ; color: #8c8b8b;'>Address</td>
                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;' id='text-long'>".@$response['address'] ."<i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i></td>
                    </tr>
                    <tr>
                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Transactions</td>
                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['n_tx'] ."</td>
                    </tr>
                    <tr>
                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Received</td>
                        <td  id='final2' style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_received'] / 100000000 ."BTC</td>
                    </tr>
                    <tr>
                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Sent</td>
                        <td  id='final3' style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_sent'] / 100000000 ."BTC</td>
                    </tr>
                    <tr>
                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Final Balance</td>
                        <td  id='final'   style='padding: 0 1.2rem 0 0; border: none ; float: right; color: #8c8b8b;'>".@$response['final_balance'] / 100000000 ."BTC</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <h3 class='custom-pad' style='font-size: 1.75rem; color: #111e31; padding-top: 2.2rem; margin-top:3rem'>TRANSACTIONS</h3>";
            foreach ($response['txs'] as $txn) :
            echo"<div class='table'>
                    <table class='custom-pad'>
                      <tbody>
                          <tr>
                              <td style='padding: 0 1.2rem 0 0;border: none;color: #8c8b8b;'>Hash</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right; padding-bottom: 1rem;  color: #8c8b8b;' id='text-long'>". @$txn['hash'] ." <i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i></td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Fees</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right; id='fees'   color: #8c8b8b;'>". @$txn['fees']/ 100000000 ."</td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Confirmed Date</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". substr(@$txn['confirmed'], 0, 10)  ."</td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Confirmed Time</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;'>". substr(@$txn['confirmed'], 11)  ."</td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Received Date</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;'>". substr(@$txn['received'], 0, 10)  ."</td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Received Time</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". substr(@$txn['received'], 11, 18)  ."</td>
                          </tr>
                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Size</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". @$txn['size'] ."</td>
                          </tr>

                          <tr>
                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Included in Block</td>
                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;color: #8c8b8b;'>".@$txn['block_height'] ."</td>
                          </tr>

                      </tbody>
                  </table>
                 </div>
                 ";
              endforeach;
    }
              ?>
              
    
</div>



<script>
  //search Address
        $(document).on('change', '#currency', function() {
            
            var datas = $(this).val();
            
            
            if (datas != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/convert",
                    method: "POST",
                    data: {
                        search_query: datas
                    },
                    
                    success: function(data) {
                        var value = $('#final').text();
                        
                        var btc = Math.round(data);
                        var round = value.slice(0,10);
                        var convert = Math.round(round*btc);
                        
                        
                        const value2 = $('#final3').text();
                        var convert2 = Math.round(round*currency);
                        var round2 = value.slice(0,10);
                        
                        
                        // console.log(value);
                        
                        // console.log(convert);
                        
                        $('#final').text(convert);
                        $('#final2').text(convert);
                        $('#final3').text(convert2);
                         
                        
                    }
                })
            }
        });
</script>


