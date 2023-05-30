<?php
$this->load->view('admin/includes/header');
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Product Added Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product : <b style="text-transform:uppercase"><?= @$res[0]['product_name']?></b></h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="mb-3">
                  <label for="product-type" class="form-label">Product Type</label>
                  <input readonly required type="text" readonly id="account-size" name="account-size" class="form-control phone-mask" value="<?= @$res[0]['product_category']?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="account-size">Account Size</label>
                    <input readonly required type="text"readonly id="account-size" name="account-size" class="form-control phone-mask" value= "<?= @$res[0]['account_size']?>" placeholder="Enter Account Size">
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="product-price">Product Price</label>
                    <input readonly required type="text" id="product-price" name="product-price" class="form-control phone-mask" value="<?= @$res[0]['product_price']?>" placeholder="Enter Prodcut Price">
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="maximum-drawdown">Maximum Drawdown</label>
                    <input readonly required type="text" id="maximum-drawdown" name="maximum-drawdown" class="form-control phone-mask" value="<?= @$res[0]['max_drawdown']?>" placeholder="Enter Maximum Drawdown">
                  </div>
              </div>
              <div class="col-lg-4" id="daily-drawdown">
                <div class="mb-3">
                    <label class="form-label" for="daily-drawdown">Daily Drawdown</label>
                    <input readonly required type="text" id="daily-drawdown" name="daily-drawdown" class="form-control phone-mask" value="<?= @$res[0]['daily_drawdown']?>" placeholder="Enter Daily Drawdown">
                  </div>
              </div>
              <div class="col-lg-4" id="p1">
                <div class="mb-3">
                    <label class="form-label" for="phase-1-target">Phase 1 Target</label>
                    <input readonly required type="text" id="phase-1-target" name="phase-1-target" class="form-control phone-mask"  value="<?= @$res[0]['p1_target']?>"placeholder="Enter Phase 1 Target">
                  </div>
              </div>
              <div class="col-lg-6" id="p2">
                <div class="mb-3">
                    <label class="form-label" for="phase-2-target">Phase 2 Target</label>
                    <input readonly required type="text" id="phase-2-target" name="phase-2-target" class="form-control phone-mask" value="<?= @$res[0]['p2_target']?>" placeholder="Enter Phase 2 Target">
                  </div>
              </div>
              <div class="col-lg-6" id="p3">
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">Product Status</label>
                  <input readonly required type="text" id="phase-2-target" name="phase-2-target" class="form-control phone-mask" value="<?= @$res[0]['status'] ? 'Active' : 'Inactive'?>" placeholder="Enter Phase 2 Target">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('user/includes/footer'); ?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Challenge</h4>`);
</script>
</body>
</html>