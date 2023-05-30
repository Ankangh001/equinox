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
            <h5 class="mb-0">Edit Product <b style="text-transform:uppercase"><?= @$res[0]['product_name']?></b></h5>
            <small class="text-muted float-end">Fill Required Detail</small>
          </div>
          <div class="card-body">
            <form id="add-challenge">
              <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label class="form-label" for="product-name">Product Name</label>
                    <input required type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter Product Name" Value="<?= @$res[0]['product_name']?>">
                    <input required type="hidden" class="form-control" name="product_id" Value="<?= @$res[0]['product_id']?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="product-type" class="form-label">Product Type</label>
                    <select class="form-select" name="product-type" id="product-type" aria-label="Default select example">
                      <option>Select Product Type</option>
                      <option <?php if($res[0]['product_category'] == 'Free Trial'){  echo 'selected';  }?> class="text-primary" value="Free Trial">Free Trial</option>
                      <option <?php if($res[0]['product_category'] == 'Aggressive'){  echo 'selected';  } ?> class="text-danger" value="Aggressive">Aggressive</option>
                      <option <?php if($res[0]['product_category'] == 'Normal'){ echo 'selected'; } ?> class="text-success" value="Normal">Normal</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                      <label class="form-label" for="account-size">Account Size</label>
                      <input required type="number" id="account-size" name="account-size" class="form-control phone-mask" value= "<?= @$res[0]['account_size']?>" placeholder="Enter Account Size">
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                      <label class="form-label" for="product-price">Product Price</label>
                      <input required type="number" id="product-price" name="product-price" class="form-control phone-mask" value="<?= @$res[0]['product_price']?>" placeholder="Enter Prodcut Price">
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                      <label class="form-label" for="maximum-drawdown">Maximum Drawdown</label>
                      <input required type="number" id="maximum-drawdown" name="maximum-drawdown" class="form-control phone-mask" value="<?= @$res[0]['max_drawdown']?>" placeholder="Enter Maximum Drawdown">
                    </div>
                </div>
                <div class="col-lg-4" id="daily-drawdown">
                  <div class="mb-3">
                      <label class="form-label" for="daily-drawdown">Daily Drawdown</label>
                      <input required type="number" id="daily-drawdown" name="daily-drawdown" class="form-control phone-mask" value="<?= @$res[0]['daily_drawdown']?>" placeholder="Enter Daily Drawdown">
                    </div>
                </div>
                <div class="col-lg-4" id="p1">
                  <div class="mb-3">
                      <label class="form-label" for="phase-1-target">Phase 1 Target</label>
                      <input required type="number" id="phase-1-target" name="phase-1-target" class="form-control phone-mask"  value="<?= @$res[0]['p1_target']?>"placeholder="Enter Phase 1 Target">
                    </div>
                </div>
                <div class="col-lg-4" id="p2">
                  <div class="mb-3">
                      <label class="form-label" for="phase-2-target">Phase 2 Target</label>
                      <input required type="number" id="phase-2-target" name="phase-2-target" class="form-control phone-mask" value="<?= @$res[0]['p2_target']?>" placeholder="Enter Phase 2 Target">
                    </div>
                </div>
                <div class="col-lg-4" id="p3">
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Product Status</label>
                    <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option>Select Product Type</option>
                      <option <?php if($res[0]['status'] == '1'){  echo 'selected';  }?> class="text-success" value="1">Active</option>
                      <option <?php if($res[0]['status'] == '0'){  echo 'selected';  }?> class="text-danger" value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" name="submit" class="w-100 btn btn-primary">Update Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('user/includes/footer'); ?>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Challenge</h4>`);


  $('#product-type').change((e)=>{
    if(e.target.value == "Aggressive"){
      $('#daily-drawdown').css('display','none');

      $('#p2').removeClass('col-lg-4');
      $('#p2').addClass('col-lg-6');

      $('#p3').removeClass('col-lg-4');
      $('#p3').addClass('col-lg-6');
    }else{
      $('#daily-drawdown').css('display','block');

      $('#p2').addClass('col-lg-4');
      $('#p2').removeClass('col-lg-6');

      $('#p3').addClass('col-lg-4');
      $('#p3').removeClass('col-lg-6');
    }
  });


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
          $('#loading').remove();
          let res = JSON.parse(data);
          if(res.status == 200){
            window.location.href = "<?= base_url('admin/challenge') ?>";
          }
        },
        error: function() { alert("Error posting feed."); }
    });

  })
</script>
</body>
</html>