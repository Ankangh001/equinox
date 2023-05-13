<?php
$this->load->view('admin/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">User Billings</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Account</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td><strong>Evaluation $100,000</strong></td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td>
              <span class="badge bg-label-success me-1">Paid</span>
            </td>
          </tr>
          <tr>
            <td><strong>Evaluation $3000</strong></td>
            <td>05/04/2023</td>
            <td>$699</td>
            <td>Free Trial</td>
            <td>
              <span class="badge bg-label-danger me-1">Cancelled</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Free Trial</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>