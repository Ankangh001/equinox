<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Announcements</h4>
    <div class="row">
      <div class="col-md-12">
        <!-- <div class="card mb-4">
          <h5 class="card-header">Add New Announcement</h5>
          <div class="row">
            <div class="col-lg-8">
              <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                  <div class="row">
                    <div class="mb-3 col-md-12">
                      <label for="title" class="form-label">Title</label>
                      <input class="form-control" type="text" id="title" name="title" placeholder="John" autofocus="">
                    </div>
                    <div class="mb-3 col-md-12">
                      <label for="content" class="form-label">Announcement Content</label>
                      <textarea class="form-control" id="content" name="content" placeholder="Enter your content here"></textarea>
                    </div>
                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save Announcement</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?=base_url('assets/user/assets/img/')?>avatars/1.png" alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload Thumbnail</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <p class="text-muted mb-0 text-center">Allowed JPG, GIF or PNG. <br> Max size of 800K</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->


        
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3">Announcement Title</h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3">Announcement content</h6>
                <p class="mb-0">
                  your content hereyour content here your content here your content here your content here your content here <br>
                  your content hereyour content hereyour content here
                </p>
            </div>
            <!-- <div class="col-lg-4">
              <div class="card-body">
                <div class="d-flex flex-column align-items-start align-items-sm-center gap-4">
                  <img src="<?=base_url('assets/user/assets/img/')?>avatars/1.png" alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
                </div>
              </div>
            </div> -->
          </div>
        </div>

      </div>


      <div class="col-md-4 my-5 mx-auto">
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3">Announcement Title</h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3 text-center">Announcement content</h6>
                <p class="mb-0">
                  your content hereyour content here your content here your content here your content here your content here <br>
                  your content hereyour content hereyour content here
                </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 my-5 mx-auto">
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3">Announcement Title</h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3 text-center">Announcement content</h6>
                <p class="mb-0">
                  your content hereyour content here your content here your content here your content here your content here <br>
                  your content hereyour content hereyour content here
                </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 my-5 mx-auto">
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3">Announcement Title</h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3 text-center">Announcement content</h6>
                <p class="mb-0">
                  your content hereyour content here your content here your content here your content here your content here <br>
                  your content hereyour content hereyour content here
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- / Content -->

<?php $this->load->view('user/includes/footer');?>