  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=0; foreach($result as $row): $i++; ?>
                  <tr>
                     <td><?=$i?></td>
                     <td>
                        <a href="<?=base_url()?>admin/user-detail/<?= $row->user_id?>"> 
                          <img width="50" src="<?=base_url($row->profile_picture)?>">
                          <b><?= $row->name ?></b>
                        </a>
                    </td>
                    <td>
                      <b><?= $row->email ?></b><br/>
                    </td>
                    <td>
                        <?php if($row->is_active == '0') {
                                echo '<span class="badge badge-pill badge-danger">Inactive</span>';
                            }else{
                                echo '<span class="badge badge-pill badge-primary">Active</span>';
                        }  
                        if(@$row->is_verify == '0'){
                            echo '<span class="badge badge-pill badge-dark ml-2">Email Not Verified</span>';
                        }else{
                            echo '<span class="badge badge-pill badge-success ml-2">Email Verified</span>';
                        }  
                        if(@$row->verified == '1'){
                            echo '<span class="badge badge-pill badge-info ml-2">Verified User</span>';
                        } ?>
                    </td>
                    <td><?= $row->created_at?></td>
                    <td><?= $row->last_login?><br/><b>IP:</b><?= $row->last_ip?></td>
                    <td> 
                        <a href="<?=base_url()?>admin/change-user-status/<?= $row->user_id?>" class="btn btn-sm btn-outline-success mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Approve/Bann User From Addressme">
                          <i class="fa fa-exchange-alt"></i>
                        </a>
                        <!--<a href="<?=base_url()?>admin/change-verified-status/<?= $row->user_id?>" class="btn btn-sm btn-outline-warning mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Change Verified Status to restrict him/her for traansaction">-->
                        <!--  <i class="fa fa-exchange-alt"></i>-->
                        <!--</a>-->
                        <a href="<?=base_url()?>admin/delete-user/<?= $row->user_id?>" class="btn btn-sm btn-outline-danger mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Delete User">
                          <i class="fas fa-trash"></i>
                        </a>
                        <a href="<?=base_url()?>admin/user-detail/<?= $row->user_id?>" class="btn btn-sm btn-outline-success mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Edit User Details">
                          <i class="fas fa-edit"></i>
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