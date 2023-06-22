<?php
// echo "<pre>";
// print_r($res);
// echo "</pre>";
// die;
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
                <h5 class="modal-title" id="modalCenterTitle">Account Status Changed<i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="nav-align-top mb-4">
      <div class="col-xl">
          <div class="card">
            <h5 class="card-header">
              All Accounts 
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>User Name</th>
                    <th>Account Number</th>
                    <th>Account Size</th>
                    <th>Type</th>
                    <th>Phase</th>
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Pending Pass Accounts</h4>`);

  function toggleAccount(id, admin_account_status) {
    let request = {}
    request.id = id;
    request.admin_account_status = admin_account_status;
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/account/toggleAccount'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            $('#modalCenter').modal('show');
            loadTable();
          }
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }

  function loadTable(){
    $('.table').DataTable().destroy();
    $('.table').DataTable({
        ajax: "<?php echo base_url('admin/account/getApprovedFailedAccounts'); ?>",
        deferRender: true,
        "pageLength": 100,
        columns:[
          {
            data: null,
            render: function (data, type, row) {
                return `${row.first_name + ' ' + row.last_name}` ;
            }
          },
          {
            width: '20%',
            data: null,
            render: function (data, type, row) {
                return `${row.account_id}` ;
            }
          },
          {
            width: '15%',
            data: null,
            render: function (data, type, row) {
                return '$'+row.account_size;
            }
          },
          {data:'product_category'},
          {
            data: null,
            render: function (data, type, row) {
                return `${
                  row.phase == 0 ? '<span class="badge bg-label-primary">NA</span>' : 
                  (row.phase == 1 ? '<span class="badge bg-label-primary">Evaluation Phase 1</span>' : 
                    (row.phase == 2 ? '<span class="badge bg-label-primary">Evaluation Phase 2</span>' : 
                      row.phase == 3 ? '<span class="badge bg-label-primary">Evaluation Funded</span>' :''
                    )
                  )
                }`;
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