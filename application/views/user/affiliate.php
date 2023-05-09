<?php
$this->load->view('user/includes/header');
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Affiliate</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body d-flex justify-content-center align-items-center">
            <h5 class="card-title pt-3 me-3">Your Unique Affiliate Link</h5>
            <a href="javascript:void(0)" class="btn btn-primary"><i class="bx bx-copy"></i>&nbsp;&nbsp;&nbsp;Copy</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-4">
        <div class="card mb-3 bg-info">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-user text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Reffered Users</h5>
                <p class="card-text fs-1 text-white">44</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-3 bg-info">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-dollar text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Commision Earned</h5>
                <p class="card-text fs-1 text-white">29</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-3 bg-info">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center ">
              <i class="lg-text bx bx-chart text-white"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-white">Total Revenew</h5>
                <p class="card-text fs-1 text-white">19</p>
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
            <th>Account</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Invoice</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Free Trial</td>
            <td class="text-center"><i class='bx bx-download fs-3' ></i></td>
            <td><span class="badge bg-label-primary me-1">Active</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Evaluation Phase 1</td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>7.png" alt="Avatar" class="rounded-circle">
                </li>
              </ul>
            </td>
            <td><span class="badge bg-label-success me-1">Completed</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Trevor Baker</td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>7.png" alt="Avatar" class="rounded-circle">
                </li>
              </ul>
            </td>
            <td><span class="badge bg-label-info me-1">Scheduled</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
            </td>
            <td>05/04/2023</td>
            <td>$999</td>
            <td>Jerry Milton</td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                  <img src="<?=base_url('assets/user/assets/img/avatars/')?>7.png" alt="Avatar" class="rounded-circle">
                </li>
              </ul>
            </td>
            <td><span class="badge bg-label-warning me-1">Pending</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>