<?php
//  echo "<pre>";print_r($res);die; 
$this->load->view('admin/includes/header'); ?>
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
                  <h5 class="modal-title" id="modalCenterTitle">KYC Approved<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Product Deleted Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <div class="col-xl">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table hover" style="padding: 2rem 0 0 0;">
                    <thead class="table-light">
                      <tr>
                        <th>Name</th>
                        <th>Account Size</th>
                        <th>Account Num</th>
                        <th>Account Pass</th>
                        <th>Price</th>
                        <th>Equity</th>
                        <th>Closed Profit</th>
                        <th>Phase</th>
                        <th>Status</th>
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
      </div>
    </div>
    
<?php $this->load->view('admin/includes/footer'); ?>
<script>
 $(document).ready(function () {
    // $('.table').DataTable();
    // $('.paginate_button').addClass('btn btn-primary');
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> All accounts</h4>`);
  });

  function loadTable(){
    $('.table').DataTable().destroy();
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/logs/getAccounts'); ?>",
          deferRender: false,
          "pageLength": 100,
          columns:[
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.first_name + ' ' + row.last_name}` ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.account_size}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_status == 0 ? '<span class="text-warning">No creds Updated</span>':row.account_id}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_status == 0 ? '<span class="text-warning">No creds Updated</span>':row.account_password}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_price}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_status == 0 ? '<span class="text-warning">No creds Updated</span>':
                    (((Number(row.equity)).toFixed(2) < 0) ? 
                    '<span class="text-danger">'+(Number(row.equity)).toFixed(2)+'</span>':
                    '<span class="text-success">'+(Number(row.equity)).toFixed(2)+'</span>'
                    )
                  }`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_status == 0 ? '<span class="text-warning">No creds Updated</span>':
                  (((Number(row.balance)).toFixed(2) < 0) ? 
                    '<span class="text-danger">'+(Number(row.balance)).toFixed(2)+'</span>':
                    '<span class="text-success">'+(Number(row.balance)).toFixed(2)+'</span>'
                  )}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.product_status == 0 ? '<span class="text-warning">No creds Updated</span>':
                    (row.phase == 1 ? '<span class="btn btn-sm btn-info">PHASE 1</span>' : 
                      (row.phase == 2 ? '<span class="btn btn-sm btn-primary">PHASE 2</span>' : 
                        row.phase == 3 ? '<span class="btn btn-sm btn-success">FUNDED</span>' :''
                      )
                    )
                  }`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${
                  row.product_status == 0 ? '<span class="btn btn-sm btn-warning">PENDING</span>' : 
                  (row.product_status == 1 ? '<span class="btn btn-sm btn-primary">ACTIVE</span>' : 
                    (row.product_status == 2 ? '<span class="btn btn-sm btn-success">PASSED</span>' : 
                      row.product_status == 3 ? '<span class="btn btn-sm btn-danger">FAILED</span>' :''
                    )
                  )
                }`;
              }
            },
          ]
      });
    }

  loadTable();
  setInterval(() => {
    loadTable();
    
  }, 80000);
  $('.paginate_button').addClass('btn btn-primary');
</script>
</body>
</html>