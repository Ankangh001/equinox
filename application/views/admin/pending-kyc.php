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
                        <th>ID Proof</th>
                        <th>Bank Statememnt</th>
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
      </div>
    </div>
    
<?php $this->load->view('admin/includes/footer'); ?>
<script>
  
  let requestData = {};
  
  function approveKyc(id){
      requestData.user_id = id;
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/user/approveKyc'); ?>",
          data: requestData,
          beforeSend: function(){
            $('body').prepend(`<div id="loading" class="demo-inline-spacing">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>`
            );
          },
          success: function(data){
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            loadTable();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 8000);
          },
          error: function() { alert("Error posting feed."); }
      });
    };
  
    function rejectKyc(id){
      requestData.user_id = id;
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/user/rejectKyc'); ?>",
          data: requestData,
          beforeSend: function(){
            $('body').prepend(`<div id="loading" class="demo-inline-spacing">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>`
            );
          },
          success: function(data){
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            loadTable();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 8000);
          },
          error: function() { alert("Error posting feed."); }
      });
    };
  $(document).ready(function () {
    // $('.table').DataTable();
    // $('.paginate_button').addClass('btn btn-primary');
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Pending KYC</h4>`);
  });

  function loadTable(){
    $('.table').DataTable().destroy();
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/user/getpendingKyc'); ?>",
          deferRender: true,
          "pageLength": 100,
          columns:[
            {
              data: null,
              width: '20%',
              render: function (data, type, row) {
                  return `${row.first_name + ' ' + row.last_name}` ;
              }
            },
            {
              data: null,
              width: '20%',
              render: function (data, type, row) {
                  return `<a class="btn btn-primary" target="_blank" href="<?= base_url() ?>${row.kyc_doc}">View ID Proof&nbsp;&nbsp;<i class="bx bx-link-external me-1"></i></a>`;
              }
            },
            {
              data: null,
              width: '20%',
              render: function (data, type, row) {
                  return `<a class="btn btn-primary" target="_blank" href="<?= base_url() ?>${row.kyc_adhar}">View ID Proof&nbsp;&nbsp;<i class="bx bx-link-external me-1"></i></a>`;
              }
            },
            {
              data: null,
              width: '20%',
              render: function (data, type, row) {
                  return `<div class="d-flex justify-content-start">
                            <button class=" btn btn-success" onclick="approveKyc(${row.user_id})"><i class="bx bx-check-circle me-1"></i>&nbsp; Approve</button>&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-danger" onclick="rejectKyc(${row.user_id})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>&nbsp; Reject</a>
                          </div>`
              }
            }
          ]
      });
    }

  loadTable();
  $('.paginate_button').addClass('btn btn-primary');
</script>
</body>
</html>