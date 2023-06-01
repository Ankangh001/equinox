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
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bxs-megaphone"></i>Add New Announcement </h5>
              <small class="text-muted float-end">Fill Required Detail</small>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-product-name">Title</label>
                      <input type="text" class="form-control" id="basic-default-product-name" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Heading</label>
                      <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter prodcut description">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Description</label>
                        <input type="number" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter prodcut price">
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