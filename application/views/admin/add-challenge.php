<?php
$this->load->view('admin/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Product Added Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-7">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-dollar"></i>Add New Product</h5>
              <small class="text-muted float-end">Fill Required Detail</small>
            </div>
            <div class="card-body">
              <form id="add-challenge">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product Name</label>
                      <input required type="text" class="form-control" id="basic-default-product-name" name="product-name" placeholder="Enter Product Name">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Product Description</label>
                      <input required type="text" id="basic-default-phone" class="form-control phone-mask" name="description" placeholder="Enter prodcut description">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Type</label>
                      <select class="form-select" name="product-type" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Product Type</option>
                        <option class="text-primary" value="Free Trial">Free Trial</option>
                        <option class="text-danger" value="Aggressive">Aggressive</option>
                        <option class="text-success" value="Normal">Normal</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Product Price</label>
                        <input required type="number" id="basic-default-phone" name="product-price" class="form-control phone-mask" placeholder="Enter prodcut price">
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Status</label>
                      <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Product Type</option>
                        <option class="text-warning" value="1">Active</option>
                        <option class="text-danger" value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <button type="submit" name="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Add Product Steps</h5>
            </div>
            <div class="card-body">
              <form id="add-steps">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Product Type</option>
                        <option class="text-danger" value="Aggressive">Aggressive</option>
                        <option class="text-success" value="Normal">Normal</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product List 1</label>
                      <input required type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="alert alert-primary alert-dismissible" role="alert">
        This is a primary dismissible alert — check it out!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> -->
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Challenge</h4>`);

  $('#add-challenge').on('submit',(e)=>{
    e.preventDefault();

    // var form = $(this);
    var form = $('#add-challenge').serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/Challenge/save'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('body').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          $('#add-challenge')[0].reset();
          $('#loading').remove();
          $('#alert').removeClass('d-none');
          setTimeout(() => {
            $('#alert').fadeOut();
            // $('#alert').addClass('d-none');
          }, 3000);
        },
        error: function() { alert("Error posting feed."); }
    });

  })
</script>
<?php $this->load->view('user/includes/footer'); ?>