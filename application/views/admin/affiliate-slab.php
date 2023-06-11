<?php
$this->load->view('admin/includes/header');
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Affilate Slab Updated Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-8 mx-auto mt-5">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="menu-icon tf-icons bx bxs-offer"></i>Affiliate Slab</h5>
            <small class="text-muted float-end">Fill Required Detail</small>
          </div>
          <div class="card-body">
            <form id="add-challenge">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="desc">Slabs</label>
                    <input required type="text" id="desc" class="form-control phone-mask" readonly name="slab" value="0-250">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="percentage">Percentage</label>
                    <input type="number" id="percentage_<?=@$slab['0']['auto_id']?>" name="percentage_<?=@$slab['0']['auto_id']?>" class="form-control phone-mask" value="<?=@$slab['0']['percentage']?>" placeholder="Enter percentage">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input required type="text" id="desc" class="form-control phone-mask" readonly name="slab" value="251-500">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input type="number" id="percentage_<?=@$slab['1']['auto_id']?>" name="percentage_<?=@$slab['1']['auto_id']?>" class="form-control phone-mask" value="<?=@$slab['1']['percentage']?>" placeholder="Enter percentage">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input required type="text" id="desc" class="form-control phone-mask" readonly name="slab" value="501-1000">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input type="number" id="percentage_<?=@$slab['2']['auto_id']?>" name="percentage_<?=@$slab['2']['auto_id']?>" class="form-control phone-mask" value="<?=@$slab['2']['percentage']?>" placeholder="Enter percentage">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input required type="text" id="desc" class="form-control phone-mask" readonly name="slab" value="1001-Above">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <input type="number" id="percentage_<?=@$slab[3]['auto_id']?>" name="percentage_<?=@$slab[3]['auto_id']?>" class="form-control phone-mask" value="<?=@$slab[3]['percentage']?>" placeholder="Enter percentage">
                  </div>
                </div>
              </div>
              <button type="submit" class="w-100 btn btn-primary">EDIT SLAB</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('admin/includes/footer'); ?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Affiliate Slab</h4>`);
  $('#add-challenge').on('submit',(e)=>{
    e.preventDefault();
    var ajaxData = {
      1:$("#percentage_1").val(),
      2:$("#percentage_2").val(),
      3:$("#percentage_3").val(),
      4:$("#percentage_4").val(),
    };
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/affiliate_slab/save'); ?>",
        data: ajaxData,
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
          $('#alert').removeClass('d-none');
          setTimeout(() => {
            $('#alert').fadeOut();
          }, 3000);
        },
        error: function() { alert("Error posting feed."); }
    });
  });
</script>