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
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
             <!--User details-->
          <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">User Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('Full Name');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Full Name',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
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
                      <?php echo form_label('Phone Number');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Enter Phone Number',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php echo form_label('Date of Birth');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Date of Birth',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    
                   
                  </div>

                  <div class="card-footer float-right">
                    <?=form_submit('submit', 'Update Info', ['class' => 'btn btn-primary']);?>
                  </div>
                <?=form_close()?>
              </div>
          </div>
          
          <!--SECURITY-->
          <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">SECURITY</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('Previous password');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Previous Password',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Current Password');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Enter Current Password',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php echo form_label('Active sessions');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Active sessions',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php echo form_label('Blocked users');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Blocked users',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                  </div>
                   
                  <div class="card-footer float-right">
                    <?=form_submit('submit', 'Update Info', ['class' => 'btn btn-primary']);?>
                  </div>
                <?=form_close()?>
              </div>
          </div>
         
            <!--address-->
          <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">ADDRESS</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
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
                      <?php echo form_label('Wallet Address');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Wallet Address',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('Date Added');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Date Added',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('Status');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Status',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                      <div class="card-footer float-right">
                        <?=form_submit('submit', 'Update Info', ['class' => 'btn btn-primary']);?>
                      </div>
                <?=form_close()?>
              </div>
          </div>
        </div>
         <!--Confirmation-->
        <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">CONFIRMATIONS</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('Transaction ID');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Transaction ID',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('Wallet Address');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Wallet Address',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('Date Initiated');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Date Initiated',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php echo form_label('Date Completed');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Date Completed',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('Status');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Status',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
                    </div>
                      <div class="card-footer float-right">
                        <?=form_submit('submit', 'Update Info', ['class' => 'btn btn-primary']);?>
                      </div>
                <?=form_close()?>
              </div>
          </div>
        </div>
        
        <!--VERIFICATION-->
        <div class="col-md-12">              
              <?php if (!empty(validation_errors())) { ?>
              <div class="alert alert-danger">
                  <?= validation_errors(); ?>
              </div>
              <?php  } ?>
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">VERIFICATION</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open('admin/update-admin-form/'.$this->uri->segment(3));?>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo form_label('verified');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'placeholder' => 'Transaction ID',
                        ];
                        echo form_input('name', $result[0]->name, $attributes); ?>
                    </div>
                    
                    
                    <div class="form-group">
                      <?php echo form_label('pending');
                        $attributes = [
                          'class' => 'form-control',
                          'required' => '',
                          'autofocus' => '',
                          'placeholder' => 'Enter Wallet Address',
                        ];
                        echo form_input('email', $result[0]->email, $attributes); ?>
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