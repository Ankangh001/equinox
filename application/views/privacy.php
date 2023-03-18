
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
<div class='content-layout' style="margin: 0;width: 100%;padding: 0;">
    <div class='row row-cols-1 row-cols-md-3 g-4' style=" width: inherit; margin: 0; ">
        
        <div class='col' style="margin:auto;padding: 0;width:100%;">
            <div style="height:100vh;"  class='my-cards card'>
                        <div style=" width:80%; max-width:1920px; margin:auto">
                        <h4 style="font-weight: 700;margin-top: 2rem;background: #bebebe;padding: 0.8rem 0 0.8rem 0.8rem;width: 34%; text-align:center">Learn More</h4>
                            <div class="triangle-bottom2"></div>


                            <h2 class="learn-heading">Register/Signup</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span>Register Yourself from the <a href="signup.php">register page.</a>
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> If you are already registered then login yourself by <a href="login.php">clicking here.</a>
                            </p>

                            <h2 class="learn-heading">Profile Creation</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span> After login <a href="signup.php">click here</a> to create your profile
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> After entering your details review your profile information.
                                <span style="margin-right: 0.8rem;">3.</span> You can upload your profile picture on your <a href="">dashboard page</a>
                            </p>


                            <h2 class="learn-heading">Wallet Address</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span> You can upload your wallet address from the <a href="">Address page.</a>
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> After uploading wallet addresses you can view it on the same page(if it not appears then refresh the same page once or twice)</a>
                            </p>


                            
                            
                        </div>
            </div>
    </div>
</div>