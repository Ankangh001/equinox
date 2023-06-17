<?php
$this->load->view('user/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body d-flex justify-content-center align-items-center">
            <h5 class="card-title pt-3 me-3">Your Unique Affiliate Link-</h5>
            <a href="javascript:void(0)" id="aflcode" class="text-primary"><?=base_url('client-signup/').$_SESSION['affiliate_code']?></a>&nbsp;&nbsp;&nbsp;
            <button onclick="copyToClipboard('#aflcode')" class="btn btn-sm btn-primary"><i class="bx bx-copy"></i>&nbsp;&nbsp;&nbsp;Copy</button>&nbsp;&nbsp;
            <span id="copied" class="text-dark text-sm text-muted ">Copied</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-3">
        <div class="card mb-3" style="background: linear-gradient(60deg, #fcfc, #ea1cea);">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-user text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Referred Users</h5>
                <p class="card-text fs-1 text-white"><?=$userData['count']??0?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3 bg-warning">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-dollar text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Comission Earned</h5>
                <p class="card-text fs-1 text-white"><?=@$transaction['credit']?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3 bg-danger">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-dollar text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Comission Withdrawn</h5>
                <p class="card-text fs-1 text-white"><?=@$transaction['debit']?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3 bg-info">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-dollar text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Comission Available</h5>
                <p class="card-text fs-1 text-white"><?= (int) (@$transaction['credit'] -  @$transaction['debit'])?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="card">
    <h5 class="card-header">Reffered Users List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>User</th>
            <th>Date</th>
            <th>Amount</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php 
          if(isset($userData['count']) && $userData['count']>0){
            foreach($userData['referredUser'] as $row): ?>
          <tr>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                  <?=$row['first_name'].' '.$row['last_name']?></b>
                </li>
              </ul>
            </td>
            <td><?= @$row['created_date']?></td>
            <td><?= @$row['amount']?></td>
          </tr>
          <?php endforeach; 
        }?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
    <!-- / Content -->

    <?php $this->load->view('user/includes/footer');?>
<script>
  $('#copied').hide(1);
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Affiliate</h4>`);
  function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $('#copied').show(200);
    setTimeout(() => {
      $('#copied').hide(500);
    }, 8000);

  }
</script>