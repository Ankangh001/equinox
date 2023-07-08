  <?php
// echo "<pre>";
// print_r($res);
// echo "</pre>";
// die;
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
                <h5 class="modal-title" id="modalCenterTitle">Manager Credentials Updated <i class="bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
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
              <h5 class="modal-title" id="modalCenterTitle">Your Login Credentials</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-credential">
              <div class="modal-body">
                <div class="col-xl">
                  <div class="card-body">
                    <input name="id" id="rid" type="hidden"  />
                    <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                      <label for="userId" class="col-md-4 col-form-label d-flex">User Id</label>                                
                      <input required value="" id="userId" name="user_id"  type="text" class="col-md-8 form-control w-50" />
                    </div>

                    <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                      <label for="mt-pass" class="col-md-4 col-form-label d-flex">Password</label>                                
                      <input required value="" id="mt-pass" name="pass"  type="text" class="col-md-8 form-control w-50" />
                    </div>

                    <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                      <label for="ip-add" class="col-md-4 col-form-label d-flex">IP</label>                                
                      <input required value="" name="ip"  id="ip-add" type="text" class="col-md-8 form-control w-50"  />
                    </div>

                    <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                      <label for="port-add" class="col-md-4 col-form-label d-flex">Port</label>                                
                      <input required value="" id="port-id" name="port"  type="text" class="col-md-8 form-control w-50"  />
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
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <div class="col-xl">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table hover" style="padding: 2rem 0 0 0;">
                    <thead class="table-light">
                      <tr>
                        <th>User Id</th>
                        <th>Pass</th>
                        <th>Ip</th>
                        <th>Port</th>
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
  

  function addDetails(iD) {
    let request = {}
    request.id = iD;
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/purchase/getmtManagerDetails'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data);
          $('#rid').val(iD);
          $('#userId').val(res[0].userID);
          $('#mt-pass').val(res[0].pass);
          $('#ip-add').val(res[0].ip);
          $('#port-id').val(res[0].port);
          $('#modalCred').modal('show');
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }

  $('#add-credential').on('submit',(e)=>{
    e.preventDefault();
    var form = $('#add-credential').serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/purchase/editmtManager'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('#add-credential').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          let res = JSON.parse(data);
          if(res.status == 200){
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 8000);
          }
        },
        error: function() { alert("Error posting feed."); }
    });
  });

  function loadTable(){
    $('.table').DataTable().destroy();
    $('.table').DataTable({
        ajax: "<?php echo base_url('admin/purchase/mtManagerTable'); ?>",
        // deferRender: true,
        columns:[
          {
            data: null,
            render: function (data, type, row) {
                return row.userID;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return row.pass;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return row.ip;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return row.port;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `<div class="d-flex justify-content-space-between">
                <a onclick="addDetails('${row.id}')" class="btn btn-primary btn-sm" href="javascript:void(0);"><i class="bx bx-edit me-1"></i></a>
                </div>`;
            }
          },
        ]
    });
  }

  $('.paginate_button').addClass('btn btn-primary');
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Servers</h4>`);
  loadTable();
</script>
</body>
</html>