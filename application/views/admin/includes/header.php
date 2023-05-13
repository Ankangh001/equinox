<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/user/assets/') ?>"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Equinox User Dashboard</title>

    <meta name="description" content="" />

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>

    <!-- Helpers -->
    <script src="<?= base_url('assets/user/assets/') ?>vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/user/assets/') ?>js/config.js"></script>
  </head>
  <body>
  <div id="loading" class="demo-inline-spacing">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <!-- Favicons -->
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" width="80%">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-3 border-top">
            <!-- Challenge -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'challenge') { echo 'active';} ?>">
              <a href="<?=base_url('admin/')?>challenge" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div>Challenges</div>
              </a>
            </li>

            <!-- Purchase History  -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'free-trial'|| $this->uri->segment(2) == 'completed' || $this->uri->segment(2) == 'phase-3'  || $this->uri->segment(2) == 'phase-1'||$this->uri->segment(2) == 'phase-2' ) { echo 'active open';} ?>">
              <a href="<?=base_url('admin/')?>purchase-history" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div>Purchase History</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php if ($this->uri->segment(2) == 'free-trial') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/')?>free-trial" class="menu-link">
                    <div>Free Trial</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'phase-1') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/')?>phase-1" class="menu-link">
                    <div>Phase 1</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'phase-2') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/')?>phase-2" class="menu-link">
                    <div>Phase 2</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'phase-3') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/')?>phase-3" class="menu-link">
                    <div>Phase 3</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'completed') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/')?>completed" class="menu-link">
                    <div>Completed</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Payouts  -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'payout' ) { echo 'active open';} ?>">
              <a href="<?=base_url('admin/')?>purchase-history" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div>Payout</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php if ($this->uri->segment(2) == 'free-trial') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/payout/')?>pending" class="menu-link">
                    <div>Pending</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'phase-1') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/payout/')?>approved" class="menu-link">
                    <div>Approved</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'phase-2') { echo 'active';} ?>">
                  <a href="<?=base_url('admin/payout/')?>declined" class="menu-link">
                    <div>Declined</div>
                  </a>
                </li>
              </ul>
            </li>


            <!-- Payouts -->
            <!-- <li class="menu-item <?php if ($this->uri->segment(2) == 'payout') { echo 'active';} ?>">
              <a href="<?=base_url('admin/')?>payout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div>Payout</div>
              </a>
            </li> -->


            <!-- Announcements -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'announcements') { echo 'active';} ?>">
              <a href="<?=base_url('admin/')?>announcements" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                <div>Announcements</div>
              </a>
            </li>


            <!-- Promotions -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'promotions') { echo 'active';} ?>">
              <a href="<?=base_url('admin/')?>promotions" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-offer"></i>
                <div>Promotions</div>
              </a>
            </li>

            
            <!-- faq -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'faq') { echo 'active';} ?>">
              <a href="<?=base_url('admin/')?>faq" class="menu-link">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div>Help</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-transparent" id="layout-navbar" >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- <li class="nav-item lh-1 me-3">
                  <button class="btn btn-secondary">Language</button>
                </li> -->

                <li class="nav-item lh-1 me-3">
                  <p class="text mt-3">User Name</p>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('assets/user/assets/') ?>img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url('assets/user/assets/') ?>img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url('admin/')?>profile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->