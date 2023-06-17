<?php
// echo "<pre>";
// print_r($coupons);
// exit;
$this->load->view('admin/includes/header');
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Coupon Added Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6 mx-auto my-5">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-dollar"></i>Add New Coupon</h5>
            <small class="text-muted float-end">Fill Required Detail</small>
          </div>
          <div class="card-body">
            <form id="add-coupon-code">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="coupon-code">Coupon CODE</label>
                    <input required type="text" class="form-control" id="coupon-code" name="coupon-code" placeholder="Enter Cupon CODE">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label" for="coupon-percentage">Coupon Percentage</label>
                      <input required type="number" id="coupon-percentage" name="coupon-percentage" class="form-control phone-mask" placeholder="Enter Coupon Percentage">
                    </div>
                </div>
              </div>
              <button type="submit" name="submit" class="w-100 btn btn-primary">Add Coupon</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="nav-align-top mb-4">
      <div class="col-xl">
          <div class="card">
            <h5 class="card-header">
              ALL COUPONS 
            </h5>
            <div class="table-responsive text-nowrap p-3">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>  
    </div>
<?php $this->load->view('user/includes/footer'); ?>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Coupon</h4>`);


  function loadTable(){
    $('.table').DataTable().destroy();
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/coupon/getAllCoupons'); ?>",
          deferRender: true,
          "pageLength": 100,
          columns:[
            {data:'code'},
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.percentage}` ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.created_at;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `<div class="d-flex justify-content-space-between">
                      <a onclick="deleteCoupon('${row.id}')" class="btn btn-danger btn-sm" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>&nbsp;&nbsp;
                      <a onclick="editCoupon('${row.id}')" data-bs-toggle="modal" data-bs-target="#modalCred"  class="btn btn-primary btn-sm" href="javascript:void(0);"><i class="bx bx-edit me-1"></i></a>
                    </div>`;
              }
            },
          ]
      });
    }

    loadTable();
  $('#add-coupon-code').on('submit',(e)=>{
    e.preventDefault();

    // var form = $(this);
    var form = $('#add-coupon-code').serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/coupon/save'); ?>",
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
          loadTable();
          $('#add-coupon-code')[0].reset();
          $('#loading').remove();
          $('#alert').removeClass('d-none');
          setTimeout(() => {
            $('#alert').fadeOut();
            // $('#alert').addClass('d-none');
          }, 8000);
        },
        error: function() { alert("Error posting feed."); }
    });

  })
</script>