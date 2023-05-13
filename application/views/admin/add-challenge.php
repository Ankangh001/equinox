<?php
$this->load->view('admin/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-7">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-dollar"></i>Add New Product</h5>
              <small class="text-muted float-end">Fill Required Detail</small>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product Name</label>
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Product Description</label>
                      <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter prodcut description">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
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
                        <input type="number" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter prodcut price">
                      </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Product Type</option>
                        <option class="text-primary" value="Free Trial">Free Trial</option>
                        <option class="text-danger" value="Aggressive">Aggressive</option>
                        <option class="text-success" value="Normal">Normal</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Product Status</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Product Type</option>
                        <option class="text-warning" value="Pending">Pending</option>
                        <option class="text-success" value="Paid">Paid</option>
                        <option class="text-danger" value="Denied">Denied</option>
                      </select>
                    </div>
                  </div>


                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
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
              <form>
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
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product List 2</label>
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product List 3</label>
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Product List 4</label>
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- / Content -->
    <script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Challenge</h4>`)
</script>
<?php $this->load->view('user/includes/footer'); ?>