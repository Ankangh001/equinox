<?php
// echo "<pre>";
// print_r($res);
// exit;
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
    <div class="nav-align-top mb-4">
      <div class="col-xl">
        <div class="card">
          <h5 class="card-header">
            Contacts Enquiries 
          </h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th>Ticket ID</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Ticket Type</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php 
                  foreach ($res as $key => $value) { 
                    if ($value['type'] == 'contact'){
                ?>
                <tr>
                  <td><?= @$value['id']?></td>
                  <td><?= @$value['name']?></td>
                  <td><?= @$value['email']?></td>
                  <td><?= @$value['complaintType']?></td>
                  <td><?= @$value['subject']?></td>
                  <td><?= @$value['message']?></td>
                  <td>
                    <div class="d-flex justify-content-start">
                    <a class="text-success" target="_blank" href="mailto:<?= @$value['email']?>"><i class="bx bx-reply me-1"></i></a>&nbsp;&nbsp;&nbsp;
                    <!-- <a class="text-primary" href="#"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp; -->
                    <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                    </div>
                </td>
                </tr>
                <?php }}; ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>  
    </div>

<?php $this->load->view('admin/includes/footer'); ?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Enquiries</h4>`);

//   function viewDetails(id) {
//     let request = {}
//     request.id = id;
    
//     $.ajax({
//         type: "POST",
//         url: "<?php echo base_url('admin/purchase/getCredentials'); ?>",
//         data: request,
//         dataType: "html",
//         success:function(data){
//           let res = JSON.parse(data);
//           $('#view_acc_id').val(res[0].account_id);
//           $('#view_pass').val(res[0].account_password);
//           $('#view_server_add').val(res[0].server);
//           $('#view_ip_add').val(res[0].ip);
//           $('#view_port_id').val(res[0].port);
//           $('#modalView').modal('show');
//         },
//         error:function(params) {
//           alert('Server error');
//         }
//     });
//   }

//   function loadTable(){
//     $('.table').DataTable({
//         ajax: "<?php echo base_url('admin/purchase/getPhase1Pending'); ?>",
//         deferRender: true,
//         "pageLength": 100,
//         columns:[
//           {data:'product_name'},
//           {
//             data: null,
//             render: function (data, type, row) {
//                 return `${row.first_name + ' ' + row.last_name}` ;
//             }
//           },
//           {
//             data: null,
//             render: function (data, type, row) {
//                 return '$'+row.account_size;
//             }
//           },
//           {data:'product_category'},
//           {data:'product_price'},
//           {
//             data: null,
//             render: function (data, type, row) {
//                 return `${
//                   row.product_status == 0 ? '<span class="badge bg-label-warning">Pending</span>' : 
//                   (row.product_status == 1 ? '<span class="badge bg-label-success">Active</span>' : 
//                     (row.product_status == 2 ? '<span class="badge bg-label-primary">Passed</span>' : 
//                       row.product_status == 3 ? '<span class="badge bg-label-danger">Failed</span>' :''
//                     )
//                   )
//                 }`;
//             }
//           },
//           {
//             data: null,
//             render: function (data, type, row) {
//                 return `<div class="d-flex justify-content-space-between">
//                     <a onclick="viewDetails('${row.id}')" class="btn btn-info btn-sm" href="javascript:void(0);"><i class="bx bx-key me-1"></i></a>&nbsp;&nbsp;
//                     <a onclick="addDetails('${row.id}')" data-bs-toggle="modal" data-bs-target="#modalCred"  class="btn btn-primary btn-sm" href="javascript:void(0);"><i class="bx bx-edit me-1"></i></a>
//                   </div>`;
//             }
//           },
//         ]
//     });
//   }

    // $('.paginate_button').addClass('btn btn-primary');

</script>
</body>
</html> 