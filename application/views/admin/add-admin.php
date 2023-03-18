
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <?php if ($this->uri->segment(3) == 'success') { ?>
              <div class="alert alert-success">
                  User has been successfully created.
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Add A User</h3>
                </div>
                
                <?=form_open('admin/add-admin-form');?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('Email');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Email',
                        ];
                        echo form_input('email', @$email, $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?= form_label('Password'); ?>
                      <?php 
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Enter Your Password',
                        ];
                        echo form_password('password', '', $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Name');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Enter Name',
                        ];
                        echo form_input('name', @$name, $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Role');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Select User Role',
                        ];
                        $options = [
                          'admin' => 'Admin',
                          'user' => 'User',
                        ];
                        echo form_dropdown('role', $options, 'user', $attributes);?>
                    </div>
                  </div>

                  <div class="card-footer float-right">
                    <?=form_submit('submit', 'Create User', ['class' => 'btn btn-primary']);?>
                  </div>
                <?=form_close()?>
              </div>
          </div>
        </div>
      </div>
    </section>
  <?php $this->load->view('admin/partials/footer') ?>