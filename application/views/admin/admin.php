    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">admin List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach($result as $user): $i++ ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$user->name?></td>
                      <td><?=$user->email?></td>
                      <td>
                        <a href="update-admin/<?=($user->id)?>" class="mr-2 mb-2">
                          <span class="badge bg-info"><i class="fas fa-edit"></i> Edit Admin</span>
                        </a>
                        <a href="change-password/<?=($user->id)?>" class="mr-2 mb-2">
                          <span class="badge bg-primary"><i class="fas fa-key"></i> Change Password</span>
                        </a>
                        <a href="delete-admin/<?=($user->id)?>" class="mr-2 mb-2">
                          <span class="badge bg-danger"><i class="fas fa-trash"></i> Delete Admin</span>
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
      </div>
    </section>
  <?php $this->load->view('admin/partials/footer') ?>