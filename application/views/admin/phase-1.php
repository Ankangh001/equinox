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
                <h5 class="modal-title" id="modalCenterTitle">Credentials Updated <i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i></h5>
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
                <div class="mb-3 pb-3 row border-bottom">
                  <label for="acc_id" class="col-md-4 col-form-label">Login</label>                    
                  <input required value="" id="acc_id" name="account_id" type="text" class="col-md-8 form-control w-50" placeholder="Enter Login Id" />
                  <input name="id" id="id" type="hidden"  />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="pass" class="col-md-4 col-form-label d-flex">Password</label>                                
                  <input required value="" id="pass" name="account_password"  type="text" class="col-md-8 form-control w-50" placeholder="Enter Login Password" />
                </div>
                
                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="server-add" class="col-md-4 col-form-label d-flex">Server</label>                                
                  <input required value="" id="server-add" name="server"  type="text" class="col-md-8 form-control w-50" placeholder="Enter Server" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="ip-add" class="col-md-4 col-form-label d-flex">IP</label>                                
                  <input required value="" name="ip"  id="ip-add" type="text" class="col-md-8 form-control w-50" placeholder="Enter Ip"  />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="port-add" class="col-md-4 col-form-label d-flex">Port</label>                                
                  <input required value="" id="port-id" name="port"  type="text" class="col-md-8 form-control w-50" placeholder="Enter Port Number" />
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


    <!-- moda to view credentials  -->
    <div class="modal fade" id="modalView" tabindex="-1" style="display: none;" aria-hidden="true">
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
                <div class="mb-3 pb-3 row border-bottom">
                  <label for="view_acc_id" class="col-md-4 col-form-label">Login</label>                    
                  <input readonly value="" id="view_acc_id" type="text" class="col-md-8 form-control w-50" placeholder="No Values yet" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="view_pass" class="col-md-4 col-form-label d-flex">Password</label>                                
                  <input readonly value="" id="view_pass" type="text" class="col-md-8 form-control w-50" placeholder="No Values yet" />
                </div>
                
                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="view_server_add" class="col-md-4 col-form-label d-flex">Server</label>                                
                  <input readonly value="" id="view_server_add"  type="text" class="col-md-8 form-control w-50" placeholder="No Values yet" />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="view_ip_add" class="col-md-4 col-form-label d-flex">IP</label>                                
                  <input readonly id="view_ip_add" type="text" class="col-md-8 form-control w-50" placeholder="No Values yet"  />
                </div>

                <div class="mb-3 pb-3 row border-bottom justfy-content-evenly">
                  <label for="view_port_id" class="col-md-4 col-form-label d-flex">Port</label>                                
                  <input readonly value="" id="view_port_id" type="text" class="col-md-8 form-control w-50" placeholder="No Values yet" />
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Phase 1</h4>`);

  //global variables for aggressive p-type = 0
  let asIp = "<?= @$servers[0]['sIp']; ?>";
  let asPort = "<?= @$servers[0]['sPort']; ?>";
  let aserverName = "<?= @$servers[0]['serverName']; ?>";
  let ap_type = "<?= @$servers[0]['p_type']; ?>";

  //global variables for normal p-type = 1
  let nsIp = "<?= @$servers[1]['sIp']; ?>";
  let nsPort = "<?= @$servers[1]['sPort']; ?>";
  let nserverName = "<?= @$servers[1]['serverName']; ?>";
  let np_type = "<?= @$servers[1]['p_type']; ?>";

  //global variables for funded p-type = 2
  let fsIp = "<?= @$servers[2]['sIp']; ?>";
  let fsPort = "<?= @$servers[2]['sPort']; ?>";
  let fserverName = "<?= @$servers[2]['serverName']; ?>";
  let fp_type = "<?= @$servers[2]['p_type']; ?>";
  
  
  function viewDetails(id, product_category) {
    let request = {}
    request.id = id;
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/purchase/getCredentials'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data);
          $('#view_acc_id').val(res[0].account_id);
          $('#view_pass').val(res[0].account_password);
          $('#view_server_add').val(res[0].server);
          $('#view_ip_add').val(res[0].ip);
          $('#view_port_id').val(res[0].port);
          $('#modalView').modal('show');
        },
        error:function(params) {
          alert('Server error');
        }
    });
  }

  function addDetails(iD, product_category) {
    let request = {}
    request.id = iD;
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/purchase/getCredentials'); ?>",
        data: request,
        dataType: "html",
        success:function(data){
          let res = JSON.parse(data);
          if(product_category == 'Normal'){
            if(res[0].ip == ''){
              $('#ip-add').val(nsIp);
            }else{
              $('#ip-add').val(res[0].ip);
            }

            if(res[0].port == ''){
              $('#port-id').val(nsPort);
            }else{
              $('#port-id').val(res[0].port);
            }

            if(res[0].server == ''){
              $('#server-add').val(nserverName);
            }else{
              $('#server-add').val(res[0].server);
            }
          }else if(product_category == 'Aggressive'){
            if(res[0].ip == ''){
              $('#ip-add').val(asIp);
            }else{
              $('#ip-add').val(res[0].ip);
            }

            if(res[0].port == ''){
              $('#port-id').val(asPort);
            }else{
              $('#port-id').val(res[0].port);
            }

            if(res[0].server == ''){
              $('#server-add').val(aserverName);
            }else{
              $('#server-add').val(res[0].server);
            }
          }else if(product_category == 'Funded'){
            if(res[0].ip == ''){
              $('#ip-add').val(fsIp);
            }else{
              $('#ip-add').val(res[0].ip);
            }

            if(res[0].port == ''){
              $('#port-id').val(fsPort);
            }else{
              $('#port-id').val(res[0].port);
            }

            if(res[0].server == ''){
              $('#server-add').val(fserverName);
            }else{
              $('#server-add').val(res[0].server);
            }
          }


          $('#id').val(iD);
          $('#acc_id').val(res[0].account_id);
          $('#pass').val(res[0].account_password);

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
        url: "<?php echo base_url('admin/purchase/addCredentials'); ?>",
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
            $('#modalCenterTitle').html('Credentials Updated <i class="mb-1 bx bx-check-circle fw-bold fs-1 text-success"></i>');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }else if(res.status == 401){
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('Wrong Credentials !');
            $('#modalCenter').modal('show');
            $('.table').DataTable().destroy();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 3000);
          }else{
            loadTable();
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenterTitle').html('Server Error !');
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
    $('.table').DataTable().destroy();
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/purchase/getPhase1Pending'); ?>",
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
            {
              data: null,
              render: function (data, type, row) {
                  return '$'+row.product_price;
              }
            },
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
                      <a onclick="viewDetails('${row.id}','${row.product_category}')" class="btn btn-info btn-sm" href="javascript:void(0);"><i class="bx bx-key me-1"></i></a>&nbsp;&nbsp;
                      <a onclick="addDetails('${row.id}','${row.product_category}')" data-bs-toggle="modal" data-bs-target="#modalCred"  class="btn btn-primary btn-sm" href="javascript:void(0);"><i class="bx bx-edit me-1"></i></a>
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