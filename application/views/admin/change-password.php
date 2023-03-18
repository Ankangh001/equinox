<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Pasword</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Change Pasword</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <div class="container mt-3">
                  <?php if (!empty(validation_errors())) { ?>
                  <div class="alert alert-danger">
                      <?= validation_errors(); ?>
                  </div>
                  <?php  } ?>
                </div>
                <?=form_open('admin/change-password-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?= form_label('Password'); ?>
                      <?php 
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Your Password',
                        ];
                        echo form_password('password', '', $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?= form_label('Confirm Password'); ?>
                      <?php 
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Re-Enter Your Password',
                        ];
                        echo form_password('conf_password', '', $attributes); ?>
                    </div>
                  </div>
                  <div class="card-footer float-right">
                    <?=form_submit('submit', 'Change Password', ['class' => 'btn btn-primary']);?>
                  </div>
                <?=form_close()?>
              </div>
          </div>
        </div>
      </div>
    </section>
  <?php $this->load->view('admin/partials/footer') ?>