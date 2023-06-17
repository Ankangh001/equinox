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
                    if ($value['type'] == 'complaints'){
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
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Complaints</h4>`);
  $('.paginate_button').addClass('btn btn-primary');

</script>
</body>
</html> 