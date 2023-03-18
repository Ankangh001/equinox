
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Send Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Notification</li>
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
                  <h3 class="card-title">Notification Message</h3>
                </div>
                <form action="<?=base_url('admin/user/notification')?>" method="POST" style="margin:22px">
                    <div class="form-group">
                        <?php echo form_label("Choose User"); ?>
                        <select class="form-control" name="user">
                            <option value='0'>To All Users</option>
                        <?php foreach($result as $row): ?>
                            <option value="<?=$row->user_id?>"> <?=$row->email?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php echo form_label("Enter Message"); ?>
                        <textarea class="form-control" name="message"></textarea>
                    </div>
                    <input type="submit" value="Send" name="submit" class="btn btn-primary">
                  </div>
                </form>
              </div>
          </div>
          <div class="col-md-12">
              <div class="card" style=" padding: 22px; ">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach($notification as $row): ?>
                      <tr>
                        <td>
                          <b><?= $row->name ?></b>
                        <?php
                            if(!@$row->name){
                             echo '<b>ALL</b>';
                            }
                        ?>
                        </td>
                        <td>
                          <b><?= $row->email ?></b>
                        <?php
                            if(!@$row->email){
                             echo '<b>ALL</b>';
                            }
                        ?>
                        </td>
                        <td>
                          <b><?= $row->message ?></b><br/>
                        </td>
                        <td><?=$row->date ?></td>
                        <td> 
                            <a href="<?=base_url()?>admin/user/delete_notification/<?= $row->id?>" class="btn btn-sm btn-outline-danger mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Delete Notification">
                              <i class="fas fa-trash"></i>
                            </a>
                         </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </section>

  <?php $this->load->view('admin/partials/footer') ?>