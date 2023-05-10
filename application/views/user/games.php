<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Fortune Wheel</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?=base_url('assets/img/')?>spin_wheel.png" 
                      alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button" class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Scratch Card</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?=base_url('assets/img/')?>card.png"  height="200" width="200" alt="user-avatar" class="d-block rounded"  id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button" class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4">
          <h5 class="card-header text-center">Give Away</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?=base_url('assets/img/')?>giveaway.png" 
                      alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Rules</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Prizes</span>
                    </button>
                    <p class="text-muted mb-0 text-center">
                      <button type="button" class="btn btn-primary w-100 account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Play Now</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Table with Header - Light -->
  <div class="card mb-5">
    <h5 class="card-header">My rewards and wins</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Reward Type</th>
            <th>Reward</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card mb-5">
    <h5 class="card-header">My rewards and wins</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Reward Type</th>
            <th>Reward</th>
            <th>User</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td>Joh**</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>

          <tr>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td>XXX XXX</td>
            <!-- <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- / Content -->

<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Games & Rewards</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>