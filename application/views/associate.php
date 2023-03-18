
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
                    <div class="row banner-row" style="height:100vh">
                        <div  class="col-sm-6 p-0"  >
                            <div class="card custom-card " style="background-color: transparent;">
                                <div class="card-body left" style="width: 100%; " data-aos="fade-right">
                                    <h2 class="card-title banner-h2" style="font-family: sans-serif;font-size: 2.8rem;font-weight: bold;" >Business Associates<br>Connect Accorss the Globe</h2>
                                    <p style="width: 90%;" class="card-text" >A secure and suitable platform for Business Associates to connect, share Wallet Address, Confirm Wallet Transaction and Funds Availability.</p>
                                    
                                    <div class="d-flex" style=" text-align: center; margin-top: 3rem; margin-left: 3rem; ">
                                        <div style=" text-align:left; margin:0"   class="btn-start">
                                            <a href="login" class="c-btn btn btn-primary" >Get Started</a>
                                        </div>
                                        <form method="POST" action="login"  class='custom-pad form-group form-home c-flex'>
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
                                    <img src="<?= base_url('assets') ?>/images/associate.jpg" style="width: 100%;float: right; padding-top: 5rem;">
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
    
    </script>