<?php
$this->load->view('user/includes/header');
?>
<style>
  @import url(https://fonts.googleapis.com/css?family=Montserrat);

body {
  
  overflow:hidden;
  
}
.modal-content{
  height:90vh;
}

div.wheel,
.inner-wheel,
.button-wrap,
.button,
.button:before,
.center-line{
  
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  margin:auto;
  border-radius:50%;
  
}

.wheel {
  
  border-radius:50%;
  overflow:hidden;
  height:500px;
  width:500px;
  position:relative;
  border:14px solid #fff;
  box-shadow:0px 0px 20px rgba(0,0,0,0.35);
  transition:all 500ms ease-in-out;
  
}

.wheel.spin {
  
  -webkit-animation:spin 5s ease-in-out infinite;
  
}

.section{
  
	position: absolute;
	width: 0;
	height: 0;
	border-style: solid;
	opacity:1;
  left:0px;
  right:0;
  top:-5px;
  margin:0 auto;
  
}

.inner-wheel {
  
  height:500px;
  width:500px;
  border-radius:50%;
  z-index:-1;
  
}

.button-wrap {
  
  height:105px;
  width:105px;
  background:#ededed;
  display:block;
  z-index:1;
  box-shadow:0px 0px 18px rgba(0,0,0,0.8);
  cursor:pointer;
  //overflow:hidden;
}

.button {
  
  border-radius:50%;
  height:90px;
  width:90px;
  background:darken(#ededed,6%);
  position:absolute;
  display:block;
  z-index:2;
  
}

.button:before {
  
  content:'';
  border-top:3px solid rgba(255,255,255,1);
  border-bottom:4px solid rgba(0,0,0,0.1);
  border-radius:50%;
  height:85px;
  width:85px;
  
}

.button-wrap:after {
  
  content:'';
  position:absolute;
  top:-18px;
  right:0;
  left:0;
  margin:0 auto;
  height:0px;
  width:0px;
  border-style: solid;
	border-width:0 10px 20px;
	border-color: #ededed transparent;
  
}

.button-wrap:before {
  
  content:'';
  position:absolute;
  width:90px;
  height:90px;
  top:16px;
  left:7px;
  background:rgba(0,0,0,0.1);
  border-bottom-left-radius:50%;
  border-bottom-right-radius:50%;
  border-top-left-radius:50%;
  border-top-right-radius:50%;
  
}

.button h4 {
  
  text-align:center;
  margin-top:28px;
  font-family: 'Montserrat', sans-serif;
  font-size:28px;
  color:rgba(0,0,0,0.1);
  letter-spacing:1px;
  text-shadow: 0px 3px 6px #def, 0 0 0 rgba(0,0,0,0.3), 5px 8px 50px #def,0px 1px 0px rgba(0,0,0,0.5);
  //text-shadow:0px 0px 10px rgba(0,0,0,0.4), 0px 0px 1px #000;
  
}

.center-line {
  
  height:5px;
  width:1px;
  z-index:99;
  margin-top:26%;
  
}

.tick {
  
  -webkit-animation:tick 500ms ease-in-out infinite;
  
}

@-webkit-keyframes tick {
  
  0%{transform:rotate(10deg);}
  100%{transform:rotate(0deg);}
  
}
</style>


<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Fortune Wheel</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?= base_url('assets/img/') ?>spin_wheel.png" 
                      alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button"  data-bs-toggle="modal" data-bs-target="#modalCenter"  class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
        <!-- modl for spin_wheel -->
          <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Your Login Credentials</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="wheel">
                    <div class="inner-wheel"></div>
                  </div>
                  <div class="button-wrap">
                    <div class="button">
                      <h4>SPIN</h4>
                    </div>
                  </div>
                  <p></p>
                  <div class="center-line"></div> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
        <!-- modal end -->


      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Scratch Card</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?= base_url('assets/img/') ?>card.png"  height="200" width="200" alt="user-avatar" class="d-block rounded"  id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button" class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Give Away</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?= base_url('assets/img/') ?>giveaway.png" 
                      alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button" class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Table with Header - Light -->
  <div class="card mb-5">
    <h5 class="card-header">My rewards and wins</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Reward Type</th>
            <th>Reward</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card mb-5">
    <h5 class="card-header">My rewards and wins</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Reward Type</th>
            <th>Reward</th>
            <th>User</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td>Joh**</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>

          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td>XXX XXX</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Games & Rewards</h4>`)


  var number =6;
		wheel = $('.wheel');
		radius = 250;
		area = 2*(Math.PI*radius);
		sectionNum = area / number;
		angleToFit = Math.ceil(360/number)*.57;
		width = (2*250*Math.sin(((angleToFit)*Math.PI)/360));

for(x = 0; x < number; x++) {
  
  rotate = Math.ceil(360/number)*x;
  
  section = '<div class="section" style="';
  
  section += 'transform:rotate('+rotate+'deg);';
  
  section += 'border-color:#'+ Math.random().toString(16).slice(2, 8)+' transparent;';
  
  section += 'border-width:255px '+width+'px 0;';
  
  section += 'transform-origin:'+parseInt(width-1)+'px 254px;';
  
  section += '"></div>';
  
  wheel.append(section);
  
  // $('p').text('width:'+width+' rotate:'+rotate+ ' Area:'+area);
  
}

///////////////////////////////////////////////////////////////
var sectionAngle = (angleToFit*.33)+angleToFit;
		
		currRot = sectionAngle;

$('.button-wrap').click(function(){
  
 var count = 0;
  
 var rng = Math.floor((Math.random() * 30) + 50);
  
 setTimeout(function(){
     
     $('.button-wrap').addClass('tick');
     
   },425)
  
 var interval = setInterval(function(){
   
   currRot = currRot + (sectionAngle/2);
   
   wheel.css('transform','rotate('+currRot+'deg)');
   
   count++;
   
   if(count == rng) {
     
     clearInterval(interval);
     setTimeout(function(){
       
       $('.button-wrap').removeClass('tick');
       
     },150);
     
   }
   
 },100);
  
});
</script>
<?php $this->load->view('user/includes/footer'); ?>