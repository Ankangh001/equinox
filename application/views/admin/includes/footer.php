
            <!-- Footer -->
            <!-- <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer> -->
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        $(window).on('load', function () {
          $('#loading').hide();
        }); 
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets/user/assets/') ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/user/assets/') ?>vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/user/assets/') ?>vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/user/assets/') ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('assets/user/assets/') ?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/user/assets/') ?>vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/user/assets/') ?>js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/user/assets/') ?>js/dashboards-analytics.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      function notify(){
        $('body').prepend(`<div id="loading" class="demo-inline-spacing">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>`
        );
        setTimeout(() => {
          $('#alert').fadeOut();
        }, 5000);
      }
      Disable right-click
      document.addEventListener('contextmenu', (e) => e.preventDefault());

      function ctrlShiftKey(e, keyCode) {
        return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
      }

      document.onkeydown = (e) => {
        // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
        if (
          event.keyCode === 123 ||
          ctrlShiftKey(e, 'I') ||
          ctrlShiftKey(e, 'J') ||
          ctrlShiftKey(e, 'C') ||
          (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
        )
          return false;
      };
</script>


