<?php 
// echo "<pre>"; print_r($history); die;
$this->load->view('user/includes/header'); ?>

<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
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
          <?php foreach ($history as $key => $value) {?>
            <tr>
              <td><strong><?= @$value['product_name'] ?></strong></td>
              <td><?php echo substr($value['purchase_date'], 0, 10) ?></td>
              <td>$<?= @$value['amount'] ?></td>
              <td><?= @$value['product_category'] ?></td>
              <td>
                <span class="badge bg-label-success me-1">Paid</span>
              </td>
            </tr>              
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php $this->load->view('user/includes/footer');?>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Purchase History</h4>`)
</script>