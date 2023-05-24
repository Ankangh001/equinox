<?php
$this->load->view('admin/includes/header');
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
          <div class="col-xl">
          <div class="card">
            <h5 class="card-header">
              <a href="<?=base_url('admin/')?>add-challenge" class="btn btn-primary">Add Product&nbsp;&nbsp;<i class="bx bx-plus"></i></a>
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php foreach($res as $data){ ?>
                  <tr>
                    <td><?php echo $data['product_name'] ?></td>
                    <td><?php echo $data['product_desc'] ?></td>
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
                          echo 'Pending'; 
                        }elseif($data['status'] == 1){ 
                          echo 'Paid'; 
                        }elseif($data['status'] == 2){ 
                          echo 'Denied'; 
                        }   ?>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a class="text-success" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-primary" href="javascript:void(0);"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php }; ?>
                  <!-- <tr>
                    <td>Free trial</td>
                    <td>One Time Fund</td>
                    <td><p class="text-primary">Free Trial</p></td>
                    <td><i class='bx bx-dollar'></i>999</td>
                    <td>
                      <span class="badge bg-label-success me-1">Paid</span>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a class="text-success" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-primary" href="javascript:void(0);"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Evaluation Phase 1</td>
                    <td>One Time Fund</td>
                    <td><p class="text-success">Normal</p></td>
                    <td><i class='bx bx-dollar'></i>367</td>
                    <td>
                      <span class="badge bg-label-danger me-1">Denied</span>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a class="text-success" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-primary" href="javascript:void(0);"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
<?php $this->load->view('user/includes/footer'); ?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Challenge</h4>`);

  $.ajax({
        type: "GET",
        url: "<?php echo base_url('admin/challenge/view'); ?>",
        dataType: "html",
        success: function(data){
          console.log(data);
        },
        error: function() { alert("Error posting feed."); }
    });
</script>