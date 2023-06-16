<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- update alert modal -->
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
      <div class="col-md-12">
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
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload your National ID / Drivers Liscence/ Passport proof</label>
                  <input class="form-control" type="file" id="idProof" name="idProof">
                  <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id']?>">
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload your Adhar</label>
                  <input class="form-control" type="file" id="adhar" name="adhar">
                </div>
                
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Upload KYC Document</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Account Settings /</span> Account Informaton</h4>`);

  $('#formAccountSettings').on('submit',(e)=>{
    e.preventDefault();

    var file_data = $('#formAccountSettings').prop('files')[0];
    var form_data = new FormData();
    form_data.append('idProof', file_data);
    $.ajax({
        url: "<?php echo base_url('user/kyc/addKyc'); ?>",
        dataType: 'text', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
          console.log(response);
            $('#msg').html(response); // display success response from the server
        },
        error: function (response) {
            $('#msg').html(response); // display error response from the server
        }
    });



    var data = new FormData();

    //Form data 
    var form_data = $('#addLeads').serializeArray();
    $.each(form_data, function (key, input) {
        data.append(input.name, input.value);
    });

    //File data
    var file_data = $('input[name="idProof"]')[0].files;
    data.append("idProof", file_data[0]);
        
    var form = new FormData();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/kyc/addKyc'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('#formAccountSettings').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('Server Error !');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }
        },
        error: function() { alert("Error posting feed."); }
    });
  });
</script>


<?php $this->load->view('user/includes/footer');?>