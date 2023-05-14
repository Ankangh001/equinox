<?php
$this->load->view('admin/includes/header');
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
          <div class="col-xl">
          <div class="card">
            <h5 class="card-header">Approved Payouts</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>John Doe</td>
                    <td>02/12/2023</td>
                    <td><i class='bx bx-dollar'></i>999</td>
                    <td><p class="text-success">Normal</p></td>
                    <td>
                      <span class="badge bg-label-success me-1">Approved</span>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a class="text-success" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-primary" href="javascript:void(0);"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Payouts</h4>`)
</script>
<?php $this->load->view('user/includes/footer'); ?>