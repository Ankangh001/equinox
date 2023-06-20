<?php
// echo "<pre>";
// print_r($products);die;
$this->load->view('admin/includes/header');
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <!-- update alert modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-xl">
              <div class="card-body">
                <h5 class="modal-title" id="modalCenterTitle">Product Added Successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- moda to add credentials  -->
    <div class="modal fade" id="modalCred" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Choose product to assign</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="add-product">
          <div class="modal-body">
            <div class="col-xl">
              <div class="card-body">
                <div class="mb-3 pb-3 row border-bottom">
                  <input type="hidden" name="user_id" id="userId">
                  <label for="acc_id" class="col-md-4 col-form-label fw-bold">Products</label> 
                  <select required id="products" name="product_id" class="col-md-12 form-control w-100" >
                    <option>Select Product</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">User : <b style="text-transform:uppercase"><?= @$res[0]['first_name'].' '.@$res[0]['last_name']?></b></h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="mb-3">
                  <label for="user-email" class="form-label">User Email</label>
                  <input readonly required type="text" readonly id="user-email" name="email" class="form-control phone-mask" value="<?= @$res[0]['email']?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="country">Country</label>
                    <input readonly required type="text" id="country" name="country" class="form-control phone-mask" value= "<?= @$res[0]['country']?>">
                  </div>
              </div>
              <!-- <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="price">State</label>
                    <input readonly required type="text" id="price" name="price" class="form-control phone-mask" value="<?= @$res[0]['state']?>">
                  </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="city">City</label>
                    <input readonly required type="text" id="city" name="city" class="form-control phone-mask" value="<?= @$res[0]['city']?>" >
                  </div>
              </div> -->
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="number">Number</label>
                    <input readonly required type="text" id="number" name="number" class="form-control phone-mask" value="<?= @$res[0]['number']?>" >
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="affiliate-code">Affiliate Code</label>
                    <input readonly required type="text" id="affiliate-code" name="affiliate-code" class="form-control phone-mask"  value="<?= @$res[0]['affiliate_code']?>" >
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="reffered-by">Reffered By</label>
                    <input readonly required type="text" id="reffered-by" name="reffered-by" class="form-control phone-mask" value="<?= @$res[0]['reffered_by']?>" >
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="reffered-by">KYC Status</label>
                    <input readonly required type="text" id="kyc-status" name="kyc-status" 
                      class="form-control phone-mask text-<?php 
                        if($res[0]['kyc_status'] =='1'){ 
                          echo 'warning';
                        }elseif($res[0]['kyc_status'] =='2') {
                          echo 'success';
                        }elseif($res[0]['kyc_status'] =='3') {
                          echo 'danger'; 
                        }
                      ?>" 
                      value="<?php 
                        if($res[0]['kyc_status'] =='1'){ 
                          echo 'PENDING';
                        }elseif($res[0]['kyc_status'] =='2') {
                          echo 'SUCCESS';
                        }elseif($res[0]['kyc_status'] =='3') {
                          echo 'REJECTED'; 
                        }
                      ?>">
                  </div>
              </div>
              <!-- <div class="col-lg-3 d-flex align-items-center">
                <a target="_blank" href="<?= base_url('kyc/').@$res[0]['kyc_doc'] ?>" id="kyc-btn" class="btn btn-<?= @$res[0]['kyc_status'] == '0' ? 'warning':'success'?> w-100">View KYC Document</a>
              </div>
              <div class="col-lg-4 d-flex align-items-center justify-content-between">
                <button id="approve-kyc-btn" class="btn btn-primary">Approve KYC</button>
                <button id="reject-kyc-btn" class="btn btn-danger">Reject KYC</button>
              </div> -->
            </div>
          </div>
        </div>
        <div class="card">
          <h5 class="card-header d-flex justify-content-between w-100">
            <p>User Products &nbsp;&nbsp;&nbsp;&nbsp;</p>
            <button onclick="addDetails()" class="btn btn-primary btn-sm">Assign product &nbsp;<i class="bx bx-plus"></i></button>
          </h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Product Name</th>
                    <th>Account Size</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Metrics Status</th>
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

<?php $this->load->view('admin/includes/footer'); ?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> View User</h4>`);

  let uId = window.location.pathname.split("/").pop();

  function addDetails() {
    let request ={};
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/user/getAllProducts'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data).data;
          $('#userId').val(uId);
          res.forEach(element => {
            $('#products').append(`
              <option value="${element.product_id}">${element.product_name}    |     $${element.product_price}   |    Size:${element.account_size}    |    ${element.product_category}</option>
            `);
          });
          $('#modalCred').modal('show');
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }

  $('#approve-kyc-btn').click(()=>{
    let request ={};
    request.user_id= uId;
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/user/approveKyc'); ?>",
        data: request,
        dataType: "html",
        beforeSend: function(){
          $('.container').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success:function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('.table').DataTable().destroy();
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('');
            $('#modalCenterTitle').html('KYC status changed successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-3 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
              location.reload(true);
            }, 8000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  });

  $('#reject-kyc-btn').click(()=>{
    let request ={};
    request.user_id= uId;
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/user/rejectKyc'); ?>",
        data: request,
        dataType: "html",
        beforeSend: function(){
          $('.container').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success:function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('.table').DataTable().destroy();
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('');
            $('#modalCenterTitle').html('KYC status changed successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-3 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
              location.reload(true);
            }, 8000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  });

  function deleteProduct(rId) {
    let request ={};
    request.id = rId;

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/user/deleteProduct'); ?>",
        data: request,
        dataType: "html",
        beforeSend: function(){
          $('.container').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success:function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('.table').DataTable().destroy();
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('');
            $('#modalCenterTitle').html('Product Deleted Successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }

  $('#add-product').on('submit',(e)=>{
    e.preventDefault();
    var form = $('#add-product').serializeArray();
    form.user_id = uId;

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/user/adduserProduct'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('#add-product').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('.table').DataTable().destroy();
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('Product Added Successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }
        },
        error: function() { alert("Error posting feed."); }
    });
  });


  function loadTable(){
    $('.table').DataTable({
        ajax: "<?php echo base_url('admin/user/getUserProducts/'); ?>"+uId,
        deferRender: true,
        "pageLength": 100,
        columns:[
          {data:'product_name'},
          {
            data: null,
            render: function (data, type, row) {
                return '$'+row.account_size;
            }
          },
          {data:'product_category'},
          {data:'product_price'},
          {data:'created_date'},
          {
            data: null,
            render: function (data, type, row) {
                return `${
                  row.product_status == 0 ? '<span class="badge bg-label-warning">Pending</span>' : 
                  (row.product_status == 1 ? '<span class="badge bg-label-success">Active</span>' : 
                    (row.product_status == 2 ? '<span class="badge bg-label-primary">Passed</span>' : 
                      row.product_status == 3 ? '<span class="badge bg-label-danger">Failed</span>' :''
                    )
                  )
                }`;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `<div class="d-flex justify-content-space-between">
                          <a onclick="deleteProduct('${row.id}')" class="btn btn-danger btn-sm" href="javascript:void(0);">
                            <i class="bx bx-trash me-1"></i>Delete
                          </a>
                        </div>`;
            }
          },
        ]
    });
  }
  loadTable();
  $('.paginate_button').addClass('btn btn-primary');

</script>
</body>
</html>