<?php
//  echo "<pre>";print_r($res);die; 
$this->load->view('admin/includes/header'); ?>
<style>
  .table-responsive{
    padding: 1rem;
  }
  a.paginate_button.current {
    border: none !important;
    background: transparent !important;
    color: blue !important;
}
</style>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
  <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      User Deleted Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <div class="col-xl">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table hover" style="padding: 2rem 0 0 0;">
                    <thead class="table-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>KYC Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($res as $data){ ?>
                      <tr>
                        <td><a href="<?= base_url('admin/user/view/')?><?php echo $data['user_id'] ?>"><?php echo $data['first_name'].' '.$data['last_name'] ?></a></td>
                        <td><?= @$data['email'] ?></td>
                        <td><?= @$data['number'] ?></td>
                        <td><span class="badge bg-label-<?php 
                        if($data['kyc_status'] =='0'){ 
                          echo 'warning';
                        }elseif($data['kyc_status'] =='1') {
                          echo 'success';
                        }elseif($data['kyc_status'] =='2') {
                          echo 'danger'; 
                        }
                      ?>"><?php 
                        if($data['kyc_status'] =='0'){ 
                          echo 'PENDING';
                        }elseif($data['kyc_status'] =='1') {
                          echo 'SUCCESS';
                        }elseif($data['kyc_status'] =='2') {
                          echo 'REJECTED'; 
                        }
                      ?></span></td>
                        <td>
                          <div class="d-flex justify-content-start">
                            <!-- <a class="text-success" href="<?= base_url('admin/user/edit/')?><?php echo $data['user_id'] ?>"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp; -->
                            <a class="btn-sm btn btn-primary" href="<?= base_url('admin/user/view/')?><?php echo $data['user_id'] ?>"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-danger" 
                              onclick="delete_user(<?php echo $data['user_id'] ?>)">
                              <i class="bx bx-trash me-1"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php }; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
<?php $this->load->view('admin/includes/footer'); ?>
<script>
  
  let requestData = {};
  
  function delete_user(id){
      let requestData = {};
      requestData.user_id = id;

      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/user/deleteUser'); ?>",
          data: requestData,
          beforeSend: function(){
            $('body').prepend(`<div id="loading" class="demo-inline-spacing">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>`
            );
          },
          success: function(data){
            console.log(JSON.parse(data));
            $('#loading').remove();
            $('#alert').removeClass('d-none');
            setTimeout(() => {
              $('#alert').fadeOut();
              $('#alert').addClass('d-none');
            }, 8000);
            location.reload();
          },
          error: function() { alert("Error posting feed."); }
      });
    };
  
  $(document).ready(function () {
    $('.table').DataTable();
    $('.paginate_button').addClass('btn btn-primary');
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Challenge</h4>`);
  });
</script>
</body>
</html>