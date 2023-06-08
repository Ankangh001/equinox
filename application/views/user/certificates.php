<?php
$this->load->view('user/includes/header');
?>
<style>
     @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
        body {
            font-family: 'Open Sans', sans-serif;
        }
        
        a:hover {
            text-decoration: none;
        }
        
        .np {
            padding: 0px;
        }
        
        .featuredPropBox {}
        
        .featuredPropBox ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style: outside none none;
            padding: 0;
        }
        
        .featuredPropBox ul li {
            background-color: #eeeeee;
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            display: block;
            height: 250px;
            margin: 5px;
            width: 32%;
            position: relative;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .featuredPropBox ul li:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: rgba(22, 22, 22, 0.6);
            transition: all 0.3s;
        }
        
        .featuredPropBox ul li:nth-child(1) {
            background-image: url('https://i.ibb.co/ZmtmLGK/a.jpg');
        }
        
        .featuredPropBox ul li:nth-child(2) {
            background-image: url('https://i.ibb.co/pzGysVS/b.jpg');
        }
        
        .featuredPropBox ul li:nth-child(3) {
            background-image: url('https://i.ibb.co/QMrtWT1/c.jpg');
        }

 .featuredPropBox ul li:nth-child(4) {
            background-image: url('https://i.ibb.co/DL5pvY6/bg-1-2.jpg');
        }

 .featuredPropBox ul li:nth-child(5) {
            background-image: url('https://i.ibb.co/FWV1BJG/bg-1.jpg');
        }
 .featuredPropBox ul li:nth-child(6) {
            background-image: url('https://i.ibb.co/ZXmWmSZ/14.jpg');
        }

 .featuredPropBox ul li:nth-child(7) {
            background-image: url('https://i.ibb.co/hLcmWbT/15646.jpg');
        }

 .featuredPropBox ul li:nth-child(8) {
            background-image: url('https://i.ibb.co/89P5rTs/15678.jpg');
        }

 .featuredPropBox ul li:nth-child(9) {
            background-image: url('https://i.ibb.co/RhZgpSG/20845.jpg');
        }
        
        .featuredPropBox ul li .fplogo {
            left: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            z-index: 1;
            transition: all 0.3s;
        }
        
        .featuredPropBox ul li .fplogo img {
            width: 100%;
        }
        
        .featuredPropBox ul li .fptext {
            display: none;
            font-size: 16px;
            left: 50%;
            position: absolute;
            text-align: center;
            top: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease 0s;
            width: 65%;
            z-index: 1;
        }
        
        .featuredPropBox ul li .fptext p {
            color: #fff;
            margin: 0px;
        }
        
        .featuredPropBox ul li:hover {
            box-shadow: 0 0 0 25px rgba(0, 0, 0, 0.2) inset;
        }
        
        .featuredPropBox ul li:hover:after {
            background-color: rgba(22, 22, 22, 0.3);
        }
        
        .featuredPropBox ul li:hover .fplogo {
            display: none;
        }
        
        .featuredPropBox ul li:hover .fptext {
            display: block;
        }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container">
   <div class="row">
    <div class="col-lg-12">
       <div class="featuredPropBox">
        <ul>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp1"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp2"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp3"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
          
          
             <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp1"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp2"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp3"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
          
          
             <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp1"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp2"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
           <li> <a href="#">
             <div class="fplogo"><img src="https://i.ibb.co/3MZXqZC/logo.png" alt="fp3"></div>
             <div class="fptext">
              <button class="btn btn-info"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
            </div>
             </a> </li>
             
         </ul>
      </div>
     </div>
  </div>
 </div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Certificates</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>