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
    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="col-xl">
              <div class="card-body">
                  Updated
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
            Accounts 
          </h5>
          <div class="table-responsive text-nowrap">
            <table class="table" id="example">
              <thead class="table-light">
                <tr>
                  <th>Product Name</th>
                  <th>User Name</th>
                  <th>Account Size</th>
                  <th>Type</th>
                  <th>Price</th>
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
  $(document).ready(function () {

    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Phase 1</h4>`);

    function loadTable(){
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/purchase/getPhase1'); ?>",
          deferRender: true,
          "pageLength": 100,
          columns:[
            {data:'product_name'},
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.first_name + ' ' + row.last_name}` ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return '$'+row.account_size;
              }
            },
            {data:'product_category'},
            {data:'product_price'},
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
                  return `<div class="d-flex justify-content-start">
                      <a id="open" data-bs-toggle="modal" data-bs-target="#modalCenter_${row.id}"  class="btn btn-primary btn-sm" href="javascript:void(0);"><i class="bx bx-key me-1"></i></a>
                    </div>`;
              }
            },
          ]
      });
    }

    $('.paginate_button').addClass('btn btn-primary');

    loadTable();

    function add(e){
      e.preventDefault();
      alert();
      // var form = $('form').serializeArray();
      // $.ajax({
      //     type: "POST",
      //     url: "<?php echo base_url('admin/purchase/addCredentials'); ?>",
      //     data: form,
      //     dataType: "html",
      //     beforeSend: function(){
      //       $('form').prepend(`<div id="loading" class="demo-inline-spacing">
      //           <div class="spinner-border" role="status">
      //             <span class="visually-hidden">Loading...</span>
      //           </div>
      //         </div>`
      //       );
      //     },
      //     success: function(data){
      //       let res = JSON.parse(data);
      //       console.log(res.status);
      //       if(res['status'] == 200){
      //         $('form')[0].reset();
      //         $('#loading').css('display','none');
      //         $('.modal').modal('hide');
      //         $('#modalCenter').modal('show');
      //         setTimeout(() => {
      //           $('#modalCenter').modal('hide');
      //         }, 3000);
      //       }
      //     },
      //     error: function() { alert("Error posting feed."); }
      // });
    }


  });
</script>
</body>
</html> 