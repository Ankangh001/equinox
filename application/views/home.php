
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
    table {
      width:100%;
    }
    .btn-light:hover {
    color: #000 !important;
    background-color: #616467 !important;
    border-color: #616467 !important;
}
    tr {
      border:none;
    }
    
    thead tr {
      border:none;
    }
    
    th {
        text-align: left !important;
        font-weight: 900;
        font-family:  'Montserrat', sans-serif;
        letter-spacing: 1px;
        font-size: 1.25rem;
    }
    th, td {
        padding: 1em;
        text-align: left !important;
        border: none;
        padding: 0 0 17px 0;
        border-bottom: none !important;
        background: transparent;
    }
    .ellipsis {
        position: relative;
    }
    .ellipsis:before {
        content: '&nbsp;';
        visibility: hidden;
    }
    .ellipsis span {
        color: #1e78e8;
        position: absolute;
        font-weight: 500;
        font-size: 1.09rem;
        left: 0;
        right: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .p-left{
        padding-left:1.23rem;
    }
    td{
        font-weight: 500;
        font-size: 1.09rem;
    }
    .t-txt{
        text-align: left;
        padding-left: 6rem;
    }
    .t-prp {
        padding-left: 6rem;
        width: 100%;
        font-size: 1.2rem !important;
        margin-bottom: 3rem;
        text-align: left !important;
    }
    .m-hov:hover{
        text-decoration:underline !important;
    }
    
    .home-wallet{
        color: #111e31;
        font-size: 2rem !important;
        margin-right: 1rem;
    }
    .home-txt{
        text-align:center !important;
    }
    .home-dollar{
        color: #fff;
        font-size: 1.5rem !important;
        margin-right: 1rem;
        border-radius:50%;
        background-color: #111e31;
        padding:10px;
        text-align:center;
        width :45px;
    }
    
    .home-contact {
        color: #fff;
        font-size: 4.5rem !important;
        margin-right: 1rem;
        border-radius: 50%;
        background-color: #111e31;
        padding: 20px;
        margin-bottom: 2rem;
        text-align: center;
    }
    .home-c-txt  a{
        color: #bbb !important;
        font-size: 1.12rem !important;
        font-weight: 400 !important;
        line-height: 12px !important;
        text-decoration:none;
    }
    .home-c-txt  a:hover{
        color: #676d73 !important;
    }
    .home-h5-txt {
        text-align: left !important;
        margin-bottom: 2.2rem !important;
        color: #fff !important;
        font-size: 1.4rem !important;
        font-weight: 600 !important;
        text-decoration: underline !important;
    }
    .c-home-btn {
        background-color: #fffffffc !important;
        font-size: 1.3rem;
        border: 1px solid #0048b1;
        padding: 4px 12px;
        box-shadow: 5px 5px #111e31;
        border-radius: 50%;
        color:#1a53a7 !important;
        font-weight:600;
        margin-bottom:1.75rem;
        margin-right:1.5rem;
    }
    .c-home-btn:hover{
        background-color: #1a53a7 !important;
        color: #fff !important;
         border:none !important;
    }
    .footer-icon{
        color: #111e31;
        font-size: 1.15rem !important;
        text-align: center;
    }
    .fa-facebook-f:hover{
        color: #fff !important;
    }
    .fa-twitter:hover{
        color: #fff !important;
    }
    .fa-instagram:hover{
        color: #fff !important;
    }
    
    .c-btn-c:hover {
        background-color: #0048b1 !important;
        border: 1px solid #0048b1;
        color: #fff !important;
         border:none !important;
        /* box-shadow: 0 0 6px #0048b1; */
    }
    .insta:hover {
        background-color: #ff2828 !important;
        border:none !important;
    }
    .c-btn-c {
        background-color: #fff !important;
        font-size: 1.3rem;
        color: #0048b1 !important;
        border: 1px solid #0048b1;
        padding: 0.4rem 2rem;
        box-shadow: 5px 5px #111e31;
    }
    .home-input{
         border-top-right-radius: 0 !important;
         border-bottom-right-radius: 0 !important; 
    }
     .get-started{
            display:flex;
        }
        .btn-start{
            text-align:left;
        }
        
    .form-home{
        padding-bottom: 0.5rem;
        width: 45%;
        padding: 0;
        margin:0 3rem;
    }
    
    @media screen and (max-width: 992px){
       
        .get-started{
            display:block !important;
            
        }
        .btn-start{
            text-align:center !important;
        }
        
        .form-home{
        
        width: 70%;
       
        margin: 1.8rem auto !important;
    }
    }
</style>

<div class='row row-cols-1 row-cols-md-3 g-4 home-page'>
        <div class='col home-page'>
            <div class='my-cards card'>
                <div style="height: 100%; padding:0;" class='custom-card card-body'>
                    <!--banner section -->
                    <div class="row banner-row">
                        <div  class="col-sm-6 p-0"  >
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body left" style="width: 100%; " data-aos="fade-right">
                                    <h2 class="card-title banner-h2" >Addressme</h2>
                                    <p style="width: 90%;" class="card-text" >Address me for Bitcoin (BTC) including historical prices,
                                        the most recently mined blocks, the mempool size of unconfirmed transactions, and data for the latest transactions.</p>
                                    
                                    <div class="get-started" style=" text-align: center; margin-top: 3rem; margin-left: 3rem; ">
                                        <div style="  margin:0" class="btn-start">
                                            <a href="<?= base_url() ?>signup" class="c-btn btn btn-primary" >Get Started</a>
                                        </div>
                                        <form method="POST" action="<?=base_url()?>search"  class='custom-pad form-group form-home c-flex'>
                                            <input style="border-top-right-radius: 0;border-bottom-right-radius: 0;" type='text' id='transaction' name='search_query' class='form-control home-input' placeholder='Enter Wallet Address to search...' required>
                                            <button style="border-top-left-radius:0 !important; border-bottom-left-radius:0 !important;" type="submit" class="btn btn-light"><i class='fa fa-search'></i></button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding: 0 3.5rem;height: 100%;margin: auto;" data-aos="fade-up">
                            <div class="card custom-card " style="padding: 0;background: transparent;">
                                <div>
                                    <img src="<?= base_url('assets') ?>/images/trade.png" style="width: 100%;float: right;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--price section -->
                    <div class="row m-c-row">
                        <div data-aos="fade-in" class="col-sm-6 col-md-2">
                            <div class="card custom-card2 ">
                                <div class="card-body my-c-body">
                                    <h4 class="card-title home-head" id="crprice"></h4>
                                    <a target="blank" href="https://www.blockchain.com/prices">
                                        <p class="card-text home-para">Price<i class="fas fa-chevron-right c-arrow"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="col-sm-6 col-md-2">
                            <div class="card custom-card2 ">
                                <div class="card-body my-c-body">
                                    <h4 class="card-title home-head" id="crhash"></h4>
                                    <a target="blank" href="https://www.blockchain.com/charts/hash-rate">
                                        <p class="card-text home-para">Estimate hash rate<i class="fas fa-chevron-right c-arrow"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="col-sm-6 col-md-2">
                            <div class="card custom-card2 ">
                                <div class="card-body my-c-body">
                                    <h4 class="card-title home-head" id="crtxn"></h4>
                                    <a target="blank" href="https://www.blockchain.com/charts/n-transactions">
                                        <p class="card-text home-para">Transaction (24 hrs)<i class="fas fa-chevron-right c-arrow"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="col-sm-6 col-md-2">
                            <div class="card custom-card2 ">
                                <div class="card-body my-c-body">
                                    <h4 class="card-title home-head"  id="crtxnvol"></h4>
                                    <a target="blank" href="https://www.blockchain.com/charts/output-volume">
                                        <p class="card-text home-para">Transaction Volume<i class="fas fa-chevron-right c-arrow"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="col-sm-6 col-md-2 last-price">
                            <div class="card" style="border: none; background:transparent">
                                <div class="card-body my-c-body">
                                    <h4 class="card-title home-head" id="crtxnest"></h4>
                                    <a target="blank" href="https://www.blockchain.com/charts/estimated-transaction-volume">
                                        <p class="card-text home-para" >Transaction Volume (Est)<i class="fas fa-chevron-right c-arrow"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                    
                    <!--latest transaction -->
                    <div class="row home-row" style="overflow:hidden;">
                        <div class="col-sm-6" style="padding: 0;height: 100%;margin: auto;" data-aos="fade-right">
                            <div class="card custom-card " style="padding: 0;background: transparent;">
                                <div>
                                    <img src="<?= base_url('assets') ?>/images/trade2.png" style="width: 90%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" data-aos="fade-up">
                            <div class="card custom-card " style=" margin:1rem auto;">
                                <div class="card-body left" style="width: 90%; padding-top:0;">
                                    <h2 class="card-title t-txt">Latest Transaction</h2>
                                    <p class="card-text f-right r-text-home t-prp">The most recently published unconfirmed transactions.</p>
                                   <div  style="margin:1rem;padding: 0.3rem 0;">
                                     
                                     <table  class="lates-transaction-table">
                                      <thead>
                                        <tr>
                                          <th class="home-th"style="width:40%">Hash</th>
                                          <th class="home-th p-left">Inputs</th>
                                          <th class="home-th p-left">Output</th>
                                        </tr>
                                      </thead>
                                      <tbody id="latestTransaction">
                                     
                                      
                                      </tbody>
                                    </table>
                                    
                                    
                                </div>
                                    
                                    <div style="width:100%" class="btn-start f-right">
                                        <a target="blank" class="m-hov" style="text-decoration:none" href="https://www.blockchain.com/btc/unconfirmed-transactions">
                                            <p data-aos="fade-in" style="color: #0048b1; font-size: 1.32rem; font-weight: 500; text-align:center;" class="card-text home-para">
                                            View All Transaction<i class="fas fa-chevron-right c-arrow"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--latest blocks -->
                    <div class="row home-row" style="background-color: #f3f3f3;overflow:hidden;">
                        <div  class="col-sm-6 p-0" data-aos="fade-up">
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body left" style="width: 100%; padding-top:0;">
                                   <h2 class="card-title t-txt" style="padding-left: 1rem !important;">Latest Blocks</h2>
                                    <p class="card-text f-right r-text-home t-prp"  style="padding-left: 1rem !important;">Latest Mined Blocks</p>
                                   <div id="latestBlocks" style="margin:1rem;padding: 0.3rem 0;">
                                     
                                </div>
                                    
                                    <div style="width:100%" class="btn-start f-right">
                                        <a target="blank" class="m-hov" style="text-decoration:none" href="https://www.blockchain.com/btc/blocks?page=1">
                                            <p data-aos="fade-in" style="color: #0048b1; font-size: 1.32rem; font-weight: 500; text-align:center;" class="card-text home-para">
                                            View All Blocks<i class="fas fa-chevron-right c-arrow"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding: 0 3.5rem;height: 100%;margin: auto;" data-aos="fade-left">
                            <div class="card custom-card " style="padding: 0; background-color: transparent;">
                                <div>
                                    <img src="<?= base_url('assets') ?>/images/trade5.png" style="width: 100%;float: right;">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                     <!--wallets -->
                    <div class="row home-row" style="background-color: #fff;overflow:hidden;padding: 8% 5%;">
                        <div  class="col-sm-6 br-r" data-aos="fade-right">
                            <div class="card custom-card " style="background-color: transparent; padding:0 2rem">
                                <div class="card-body left" style="width: 100%; padding:0">
                                   <h2 class="card-title home-txt t-txt" style="padding-left: 0 !important; margin-bottom:1.5rem;"><i class="fas fa-wallet home-wallet"></i>Solution for a digital future</h2>
                                    <p class="card-text f-right r-text-home t-prp"  style="padding-left: 1rem !important;">A full-stack crypto service 
                                        platform prepared to engage with crypto-negative businesses for institutional scale custody, execution, lending, options, 
                                        derivatives, and structured solutions.
                                    </p>
                                    
                                    <div class="btn-start" data-aos="fade-up">
                                        <a href="https://www.blockchain.com/institutional" target="blank" class="c-btn btn btn-primary">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div  class="col-sm-6 " data-aos="fade-left">
                            <div class="card custom-card " style="background-color: transparent; padding:0 2rem">
                                <div class="card-body left" style="width: 100%; padding:0">
                                   <h2 class="card-title home-txt t-txt" style="padding-left: 1rem !important; margin-bottom:1.5rem;"><i class="fas fa-dollar-sign home-dollar"></i>Trade crypto at the exchange</h2>
                                    <p class="card-text f-right r-text-home t-prp"  style="padding-left: 1rem !important;">Integrated with the blockchain wallet, our exchange is a one-stop 
                                        shop where you can deposit funds and place trades seamlessly in minutes
                                    </p>
                                    
                                    <div class="btn-start" data-aos="fade-up">
                                        <a href="https://exchange.blockchain.com/" target="blank" class="c-btn btn btn-primary">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                    <!--You've thought-->
                    <div class="row home-row" style="background-color: #f3f3f3; padding:0 5% !important;margin:2rem 0">
                        
                        <div class="col-sm-6" style="padding: 0 3.5rem;height: 100%;margin: auto;" data-aos="fade-right">
                            <div class="card custom-card " style="padding: 0; background-color: transparent;">
                                <div>
                                    <img src="<?= base_url('assets') ?>/images/trade4.png" style="width: 100%;float: right;">
                                </div>
                            </div>
                        </div>
                        
                        <div  class="col-sm-6 p-0" data-aos="fade-up">
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body left" style="width: 100%; padding-top:5rem;">
                                   <h2 class="card-title t-txt" style="padding-left: 1rem !important; margin-bottom:2rem">You've thought about it, now it's time.</h2>
                                    <p class="card-text f-right r-text-home t-prp"  style="padding-left: 1rem !important;">Share your verified wallet address with your Business Associate to confirm your transaction</p>
                                    
                                    
                                    <div class="btn-start">
                                        <a href="<?= base_url() ?>signup" class="c-btn-c btn btn-primary">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <!--support-->
                    <div class="row home-row" style="background-color: #fff;">
                        
                        <div class="col-sm-6" style="padding: 0 3.5rem;height: 100%;margin: auto;">
                            <div class="card custom-card " style="padding: 0; background-color: transparent; align-items:center">
                               
                                    <i class="fas fa-headset home-contact" data-aos="fade-up"></i>
                                    <p data-aos="fade-up" class="card-text f-right r-text-home t-prp" style="font-weight:600;padding-left: 1rem !important;">Need help? <a href="">Contact our Support Team Now</a></p>

                               
                            </div>
                        </div>
                        
                       
                        
                        
                    </div>
                    
                     <!--Footer-->
                    <div class="row home-row" style="max-width: 100%;margin-left: -1px;margin-bottom: -1px;background-color: #212529;padding:2% 5% !important;">
                        <div  class="col-sm-3 p-0">
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body " style="width: 100%; padding-top:2rem; text-align:right">
                                    <h2 data-aos="fade-up" style="font-size: 2.5rem; text-align:left; color:#fff; font-family:cursive; margin: 2rem auto;" class="card-title banner-h2">Addressme</h2>
                                    <div class="d-flex">
                                        <div class="btn-start ">
                                            <a data-aos="fade-up" href="#" style="padding:4px 14px" class="c-home-btn btn btn-primary"><i class="footer-icon fab fa-facebook-f" style="color:#111e31"></i></a>
                                        </div>
                                        <div class="btn-start ">
                                            <a data-aos="fade-up" href="#" class="c-home-btn btn btn-primary"><i class="footer-icon fab fa-twitter" style="color:#111e31"></i></a>
                                        </div>
                                        <div class="btn-start ">
                                            <a data-aos="fade-up" href="#" class="c-home-btn btn btn-primary insta"><i class="footer-icon fab fa-instagram" style="color:#111e31"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-3 p-0">
                            <div class="card custom-card " style="background-color: transparent; ">
                                <div class="card-body left" style="width: 100%;  padding-top:0 !important ">
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div  class="col-sm-3 p-0">
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body left" style="width: 100%; padding-top:0 !important">
                                    <h5 data-aos="fade-down" class="card-title home-h5-txt">Products</h5>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://www.blockchain.com/wallet" target="blank">Wallet</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://exchange.blockchain.com/" target="blank">Exchange</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://www.blockchain.com/explorer" target="blank">Explorer</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://www.blockchain.com/institutional" target="blank">Institutional</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>learn">Learn</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://www.blockchain.com/prices" target="blank">Prices</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="https://www.blockchain.com/charts" target="blank">Charts</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 p-0">
                            <div class="card custom-card " style="background-color: transparent; ">
                                <div class="card-body left" style="width: 100%;  padding-top:0 !important ">
                                    <h5 data-aos="fade-down" class="card-title home-h5-txt">Resources</h5>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>api">APIs</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>stats">Status</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>opensource">Open Source</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>research">Research</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>privacy">Privacy</a></p>
                                    <p data-aos="fade-in" class="card-text home-c-txt"><a href="<?= base_url() ?>support">Support</a></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        myPrice();
        setInterval(myPrice ,10000);
        function myPrice() {
            $.ajax({
                type:'GET',
                url:'<?=base_url()?>home/price',
                data:{user_id:'me'},
                success:function(data){
                    if(data){
                        //console.log(data);
                        var datas = JSON.parse(data);
                        var hash_rate = (datas.hash_rate)/1000000000;
                        var transaction_volume =Math.round((datas.estimated_btc_sent)/100000000);
                        var trade_volume = (datas.total_btc_sent)/100000000000000;
                        
                        nfObject = new Intl.NumberFormat('en-US');
                        price = nfObject.format(datas.market_price_usd);
                        transaction_vol = nfObject.format(transaction_volume.toFixed(0));
                        tx = nfObject.format(datas.n_tx);
                        
                        $('#crprice').text('$'+price);
                        $('#crhash').text( hash_rate.toFixed(2)+' EH/s');
                        $('#crtxn').text(tx);
                        $('#crtxnvol').text(trade_volume.toFixed(3)+'m BTC');
                        $('#crtxnest').text(transaction_vol+' BTC');
                        
                        
                    } 
                }
            });
        }
    });
    
    
    //latest blocks
     $(document).ready(function(){
        latestBlock();
        setInterval(latestBlock ,10000);
        function latestBlock() {
            $.ajax({
                type:'GET',
                url:'<?=base_url()?>home/latest_block',
                data:{user_id:'me'},
                success:function(data){
                    if(data){
                        $('#latestBlocks').html(data);
                        
                    } 
                }
            });
        }
    });
    
      //latest transaction
     $(document).ready(function(){
        latestTran();
        setInterval(latestTran,10000);
        function latestTran() {
            $.ajax({
                type:'GET',
                url:'<?=base_url()?>home/latestTransaction',
                data:{user_id:'me'},
                success:function(data){
                    if(data){
                       
                        $('#latestTransaction').html(data);
                        
                    } 
                }
            });
        }
    });
     
</script>

   </body>
</html>
    