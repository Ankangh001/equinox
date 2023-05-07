<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Payout / Withdraw</h4>

    <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="menu-icon tf-icons bx bx-receipt"></i>Withdraw your earnings</h5>
              <!-- <small class="text-muted float-end">Username</small> -->
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Payout Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Payout Type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Account Number</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Account Number</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Payment Modey</label>
                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected="">Select Payment Modey</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">User Address</label>
                      <input type="text" id="basic-default-zip" class="form-control phone-mask" placeholder="Enter your address">
                    </div>
                  </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
        <h3 class="my-3"></h3>
        <div class="col-xl">
          <!-- Bootstrap Table with Header - Light -->
          <div class="card">
            <h5 class="card-header">Withdrawl History</h5>
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
          <!-- Bootstrap Table with Header - Light -->
        </div>
      </div>
    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>