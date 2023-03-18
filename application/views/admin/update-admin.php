    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Update Admin</li>
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
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('Email');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Email',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Name');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Enter Name',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
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
                        if ($result[0]->role == 'admin') {
                          $role = 'admin';
                        } else {
                          $role = 'user';
                        }
                        echo form_dropdown('role', $options, $role, $attributes);?>
                    </div>
                  </div>

                  <div class="card-footer float-right">
                    <?=form_submit('submit', 'Update Info', ['class' => 'btn btn-primary']);?>
                  </div>
                <?=form_close()?>
              </div>
          </div>
        </div>
      </div>
    </section>
  <?php $this->load->view('admin/partials/footer') ?>