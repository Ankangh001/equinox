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
    <script src="<?= base_url('assets/user/assets/') ?>js/config.js">
    </script>
    <script>
      // let PANEL_URL = "<?= base_url()?>";
    </script>
    <style>
      @media (max-width: 500px){
        #uname {
            display: none;
        }
    }
    </style>
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
            <a href="<?= base_url() ?>" class="app-brand-link">
                <!-- Favicons -->
                <img src="<?= base_url('assets/') ?>img/equinoxLogoBlack.png" width="80%">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-3 border-top">
            
            <!-- Start New Challenge -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'start-new-challenge' || $this->uri->segment(2) == 'payment') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>start-new-challenge" class="menu-link">
                <button class="btn btn-primary m-1">Start New Challenge</button>
              </a>
            </li>

            <!-- Dashboard -->
            <li class="menu-item <?php if ($this->uri->segment(2) == '') { echo 'active';} ?>">
              <a href="<?=base_url()?>user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
              </a>
            </li>

            <!-- Account -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'account-overview') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>account-overview" class="menu-link">
                <i class="menu-icon tf-icons bx bx-credit-card-alt"></i>
                <div>Account Overview</div>
              </a>
            </li>

            <!-- Profile -->
            <!-- <li class="menu-item <?php if ($this->uri->segment(2) == 'profile' || $this->uri->segment(2) == 'account-info') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>profile" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div>Profile</div>
              </a>
            </li> -->

            <!--<li class="menu-item <?php if ($this->uri->segment(2) == 'profile') { echo 'active';} ?>" style="">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Account Settings">Profile</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php if ($this->uri->segment(2) == 'profile') { echo 'active';} ?>">
                  <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="profile">User Profile</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'account-info') { echo 'active';} ?>">
                  <a href="account-info" class="menu-link">
                    <div data-i18n="account-info">Account Information</div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == 'account-security') { echo 'active';} ?>"">
                  <a href="account-security" class="menu-link">
                    <div data-i18n="Connections">Account Security</div>
                  </a>
                </li>
              </ul>
            </li> -->

            <!-- Purchase History -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'purchase-history') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>purchase-history" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div>Purchase History</div>
              </a>
            </li>

            <!-- Payouts -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'payout') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>payout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div>Payout</div>
              </a>
            </li>


            <!-- Announcements -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'announcements') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>announcements" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                <div>Announcements</div>
              </a>
            </li>


            <!-- Promotions -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'promotions') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>promotions" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-offer"></i>
                <div>Promotions</div>
              </a>
            </li>

            <!-- Games -->
            <!-- <li class="menu-item <?php if ($this->uri->segment(2) == 'games-rewards') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>games-rewards" class="menu-link">
                <i class="menu-icon tf-icons bx bx-joystick"></i>
                <div>Games & Rewards</div>
              </a>
            </li> -->

            <!-- Affiliate -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'affiliate') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>affiliate" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                <div>Affiliate</div>
              </a>
            </li>


            <!-- Platform -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'platform') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>platform" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-analyse"></i>
                <div>Platforms</div>
              </a>
            </li>

             <!-- MT5 Web termnals -->
             <li class="menu-item <?php if ($this->uri->segment(2) == 'mt5-webterminal') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>mt5-webterminal" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-window-alt"></i>
                <div>MT5 Web Terminal</div>
              </a>
            </li>

            <!-- Advance Chart -->
             <li class="menu-item <?php if ($this->uri->segment(2) == 'advanced-chart') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>advanced-chart" class="menu-link">
                <i class="menu-icon tf-icons bx bx-network-chart"></i>
                <div>Advanced Chart</div>
              </a>
            </li>


            <!-- Advance Chart -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'economic-calendar') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>economic-calendar" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div>Economic Calendar</div>
              </a>
            </li>


            <!-- Market Data -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'market-data-analysis') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>market-data-analysis" class="menu-link">
                <i class="menu-icon tf-icons bx bx-trending-down"></i>
                <div>Market Analysis</div>
              </a>
            </li>


            <!-- Calculators  -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'clculators') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>clculators" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calculator"></i>
                <div>Calculators</div>
              </a>
            </li>


            <!-- Tools -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'tools') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>tools" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crosshair"></i>
                <div>User Tools</div>
              </a>
            </li>

            
            

             <!-- Community Chat -->
             <li class="menu-item <?php if ($this->uri->segment(2) == 'community-chat') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>community-chat" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div>Community Chat</div>
              </a>
            </li>

            <!-- COmpettitions -->
            <!-- <li class="menu-item <?php if ($this->uri->segment(2) == 'Compettitions-chat') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>community-chat" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-award"></i>
                <div>Compettitions</div>
              </a>
            </li> -->

            <!-- Community Chat -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'certificates') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>certificates" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-award"></i>
                <div>Certificates</div>
              </a>
            </li>

            <!-- Help -->
            <li class="menu-item <?php if ($this->uri->segment(2) == 'faq') { echo 'active';} ?>">
              <a href="<?=base_url('user/')?>faq" class="menu-link">
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

                <li class="nav-item lh-1 me-3" id="uname">
                  <p class="text mt-3"><?=$_SESSION['user_name']?></p>
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
                            <span class="fw-semibold d-block"><?=$_SESSION['user_name']?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url('user/')?>profile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url('auth/logout')?>">
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