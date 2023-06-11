<?php
$this->load->view('admin/includes/header');
?>

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

<!-- Content wrapper -->
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
                <h5 class="modal-title" id="modalCenterTitle">Payout Approved <i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
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
          <h5 class="modal-title" id="modalCenterTitle">User payout details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="add-credential">
          <div class="modal-body">
            <div class="col-xl">
              <div class="card-body">
                <div class="mb-3 pb-3 row border-bottom">
                  <label for="payout-id" class="col-md-4 col-form-label">Account Number</label>                    
                  <input required value="" id="acc_id" name="account_id" type="text" class="col-md-8 form-control w-50"/>
                  <input name="payout_id" id="payout-id" type="hidden"  />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="payout-amount" class="col-md-4 col-form-label d-flex">Payout Amount</label>                                
                  <input required value="" id="payout-amount" name="payout_amount"  type="text" class="col-md-8 form-control w-50" />
                </div>
                
                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="payout-type" class="col-md-4 col-form-label d-flex">Payout Type</label>                                
                  <input required value="" id="payout-type" name="payout-type"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="payment-mode" class="col-md-4 col-form-label d-flex">Payment Mode</label>                                
                  <input required value="" name="payment-mode"  id="payment-mode" type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="address" class="col-md-4 col-form-label d-flex">Email / Wallet Address</label>                                
                  <input required value="" id="address" name="address"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <!-- bank details  -->
                <div class="mb-3 pb-3 row border-bottom">
                  <label for="receipant_name" class="col-md-4 col-form-label">Receipant Name</label>                    
                  <input required value="" id="receipant_name" name="account_id" type="text" class="col-md-8 form-control w-50"/>
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="receipant_address" class="col-md-4 col-form-label d-flex">Receipant Address</label>                                
                  <input required value="" id="receipant_address" name="payout_amount"  type="text" class="col-md-8 form-control w-50" />
                </div>
                
                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="receipant_acount_number" class="col-md-4 col-form-label d-flex">Receipant Account Number</label>                                
                  <input required value="" id="receipant_acount_number" name="receipant_acount_number"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="sort_code" class="col-md-4 col-form-label d-flex">Sort Code</label>                                
                  <input required value="" name="sort_code"  id="sort_code" type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="swift_code" class="col-md-4 col-form-label d-flex">Swift Code</label>                                
                  <input required value="" id="swift_code" name="swift_code"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="bank-name" class="col-md-4 col-form-label d-flex">Bank Name</label>                                
                  <input required value="" id="bank-name" name="bank_name"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="branch_address" class="col-md-4 col-form-label d-flex">Branch Address</label>                                
                  <input required value="" id="branch_address" name="branch_address"  type="text" class="col-md-8 form-control w-50" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly" id="payout-status">
                  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>

    <div class="nav-align-top mb-4">
      <div class="col-xl">
          <div class="card">
            <h5 class="card-header">
              Accounts 
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Status</th>
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Pending Payouts</h4>`);
  
  function viewPayout(pcid) {
    let request = {}
    request.payout_id = pcid;
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/payout/getPayout'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data);
          $('#acc_id').val(res[0].mt5_accountNum);
          $('#payout-id').val(res[0].payout_id);
          $('#payout-amount').val(res[0].amount);
          $('#payout-type').val(res[0].payout_type);
          $('#payment-mode').val(res[0].payment_mode);
          $('#address').val(res[0].wallet_address);

          //bank details
          $('#receipant_name').val(res[0].receipant_name);
          $('#receipant_address').val(res[0].receipant_address);
          $('#receipant_acount_number').val(res[0].account_iban);
          $('#sort_code').val(res[0].sort_code);
          $('#swift_code').val(res[0].swift_code);
          $('#bank-name').val(res[0].bank_name);
          $('#branch_address').val(res[0].branch_address);


          $('#payout-status').html(`
            <label for="flexSwitchCheckChecked" class="col-md-4 col-form-label d-flex">Payout Action</label>                                
            <button type="button" onclick="approvePayout(${res[0].payout_id})" class="col-md-3 btn btn-sm btn-primary">Approve Payout</button>&nbsp;
          `);
          $('#modalCred').modal('show');
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }
  function approvePayout(pId){
    let request ={};
    request.payout_id= pId;
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/payout/approvePayout'); ?>",
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
            $('#modalCenterTitle').html('Payout approved successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-3 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
              // location.reload(true);
            }, 1000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  };

  function rejectPayout(pId){
    let request ={};
    request.payout_id= pId;
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/payout/rejectPayout'); ?>",
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
            $('#modalCenterTitle').html('Payout rejected successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-3 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
              // location.reload(true);
            }, 1000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  };

  function deletePayout(pId){
    let request ={};
    request.payout_id= pId;
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/payout/deletetPayout'); ?>",
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
            $('#modalCenterTitle').html('Payout deleted successfully &nbsp;&nbsp;&nbsp;&nbsp;<i class="mb-3 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            setTimeout(() => {
              $('#modalCenter').modal('hide');
              // location.reload(true);
            }, 1000);
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  };

  function loadTable(){
    $('.table').DataTable({
        ajax: "<?php echo base_url('admin/payout/getDeclinedPayouts'); ?>",
        deferRender: true,
        "pageLength": 100,
        columns:[
          {
            data: null,
            render: function (data, type, row) {
                return `${row.first_name + ' ' + row.last_name}` ;
            }
          },
          {data:'product_name'},
          {
            data: null,
            render: function (data, type, row) {
                return '$'+row.amount;
            }
          },
          {data:'product_category'},
          {
            data: null,
            render: function (data, type, row) {
                return row.payout_date.slice(0,10);
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `${
                  row.payout_status == 0 ? '<span class="badge bg-label-warning">Pending</span>' : 
                  (row.payout_status == 1 ? '<span class="badge bg-label-success">Approved</span>' : 
                    (row.payout_status == 2 ? '<span class="badge bg-label-danger">Rejected</span>':'')
                  )
                }`;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `<div class="d-flex justify-content-space-between">
                          <button class="btn-sm btn btn-primary" onclick="viewPayout('${row.payout_id}')"><i class="bx bx-link-external me-1"></i></button>&nbsp;&nbsp;&nbsp;
                          <button class="btn btn-sm btn-danger" onclick="deletePayout('${row.payout_id}')" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></button>
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