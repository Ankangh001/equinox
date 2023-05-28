<?php
$this->load->view('user/includes/header');
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
            <th>Time</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <!-- <tr>
            <td><strong>Evaluation $100,000</strong></td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Aggressive</td>
            <td>
              <span class="badge bg-label-success me-1">Paid</span>
              <span class="badge bg-label-danger me-1">Cancelled</span>
            </td>
          </tr> -->

          <?php foreach ($history as $key => $value) {?>
            <tr>
              <td><strong>Evaluation $100,000</strong></td>
              <td><?php echo substr($value['purchase_date'], 0, 10) ?></td>
              <td><?php echo substr($value['purchase_date'], 10) ?></td>
              <td>$<?= @$value['amount'] ?></td>
              <td><?= @$value['product_category'] ?></td>
              <td>
                <span class="badge bg-label-success me-1">Paid</span>
                <!-- <span class="badge bg-label-danger me-1">Cancelled</span> -->
              </td>
            </tr>              
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Purchase History</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>