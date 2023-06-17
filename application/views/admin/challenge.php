<?php $this->load->view('admin/includes/header'); ?>
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
      Product Deleted Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <div class="col-xl">
              <div class="card">
                <h5 class="card-header">
                  <a class="btn btn-primary" href="<?=base_url('admin/')?>add-challenge" class="btn btn-primary">Add Product&nbsp;&nbsp;<i class="bx bx-plus"></i></a>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table hover" style="padding: 2rem 0 0 0;">
                    <thead class="table-light">
                      <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($res as $data){ ?>
                      <tr>
                        <td><a href="<?= base_url('admin/challenge/view/')?><?php echo $data['product_id'] ?>"><?php echo $data['product_name'] ?></a></td>
                        <td>
                          <p class="text-<?php 
                            if($data['product_category'] == 'Free Trial'){
                              echo "primary";
                            }elseif($data['product_category'] == 'Normal'){
                              echo "success";
                            }else{
                              echo "danger";
                            }
                            ?>">
                            <?php echo $data['product_category'] ?></p></td>
                        <td><i class='bx bx-dollar'></i><?php echo $data['product_price'] ?></td>
                        <td>
                          <span 
                            class="badge bg-label-<?php 
                              if($data['status'] == 0){ 
                                echo 'warning'; 
                              }elseif($data['status'] == 1){ 
                                echo 'success'; 
                              }elseif($data['status'] == 2){ 
                                echo 'danger'; 
                              }; 
                            ?> me-1">
                          <?php 
                            if($data['status'] == 0){ 
                              echo 'Inactive'; 
                            }elseif($data['status'] == 1){ 
                              echo 'Active'; 
                            }
                          ?>
                          </span>
                        </td>
                        <td>
                          <div class="d-flex justify-content-start">
                            <a class="text-success" href="<?= base_url('admin/challenge/edit/')?><?php echo $data['product_id'] ?>"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                            <a class="text-primary" href="<?= base_url('admin/challenge/view/')?><?php echo $data['product_id'] ?>"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                            <a class="text-danger" onclick="delete_product(<?php echo $data['product_id'] ?>)" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
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
  
  function delete_product(id){
      requestData.product_id = id;
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/challenge/delete'); ?>",
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
            $('#loading').remove();
            $('#alert').removeClass('d-none');
            setTimeout(() => {
              $('#alert').fadeOut();
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