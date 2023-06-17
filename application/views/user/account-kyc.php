<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- update alert modal -->
    <?php if($res[0]['kyc_status'] == 0 ){?>
      <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-xl">
                <div class="card-body">
                  <h5 class="modal-title" id="modalCenterTitle">KYC Document submitted<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 m-auto">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('user/')?>profile"><i class="bx bx-user me-1"></i> Personal Information</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?=base_url('user/')?>account-info"><i class="bx bx-info-circle me-1"></i> Account Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('user/')?>account-security"><i class="bx bx-cog me-1"></i> Security</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" href="<?=base_url('user/')?>account-kyc"><i class="bx bx-link-alt me-1"></i> KYC</a>
            </li>
          </ul>
          <div class="card mb-4">
            <h5 class="card-header">Upload Your K Y C Details</h5>
            
            <hr class="my-0">
            <div class="card-body">
              <form id="formAccountSettings" method="POST" >
                <div class="row">
                  <div class="mb-3 col-lg-12">
                    <label for="formFile" class="form-label">Upload your National ID / Drivers Liscence/ Passport proof</label>
                    <input required class="form-control" type="file" id="idProof" name="idProof">
                    <!-- <input required class="form-control" type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id']?>"> -->
                  </div>
                  <div class="mb-3 col-lg-12">
                    <label for="formFile" class="form-label">Upload your Adhar</label>
                    <input required class="form-control" type="file" id="adhar" name="adhar">
                  </div>
                  
                <div class="mt-2">
                  <button type="submit" id="submit" class="btn btn-primary me-2">Upload KYC Document</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php }elseif($res[0]['kyc_status'] == 1){?>
      <div class="row">
        <span class="badge bg-label-warning mx-auto my-5 fs-5 col-lg-6" style="text-transform : none">
          You have already applied for KYC.
        </span>
      </div>
    <?php }elseif($res[0]['kyc_status'] == 2){?>
      <div class="row">
        <span class="badge bg-label-success mx-auto my-5 fs-5 col-lg-6" style="text-transform : none">
          Your KYC is already verified by the admin.
        </span>
      </div>
    <?php }elseif($res[0]['kyc_status'] == 3){?>
      <div class="row">
        <span class="badge bg-label-danger mx-auto my-5 fs-5 col-lg-6" style="text-transform : none">
          Your KYC is Rejected
        </span>
      </div>
    <?php } ?>


  </div>
  <?php $this->load->view('user/includes/footer');?>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Account Settings /</span> Account Informaton</h4>`);


  $('#formAccountSettings').on('submit',function(e){
      e.preventDefault();
        var inputFile=$('input[name=idProof]');
        var fileToUpload=inputFile[0].files[0];
        
        
        var inputFile2 = $('input[name=adhar]');
        var adhar = inputFile2[0].files[0];

        var other_data = $('#formAccountSettings').serializeArray();
        var formdata=new FormData();
        formdata.append('proofId',fileToUpload);
        formdata.append('adhar',adhar);
        // formdata.append(other_data);
         //now upload the file using ajax
         $.ajax({
            url:"<?php echo base_url('user/kyc/addkyc') ?>",
            type:"post",
            data:formdata,
            processData:false,
            contentType:false,
            beforeSend: function(){
              $('#add-credential').prepend(`<div id="loading" class="demo-inline-spacing">
                  <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>`
              );
            },
            success: function(data){
              let res = JSON.parse(data);
              if (res.status == 200){   
                $('div#loading').hide(200);
                $('.modal').modal('hide');
                $('#modalCenter').modal('show');
                setTimeout(() => {
                  $('#modalCenter').modal('hide');
                  location.reload();
                }, 8000);
                console.log(res);
              }
              else{
                console.log(res);
              }
            }
         });

        })
</script>

