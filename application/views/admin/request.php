  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Wallet Address Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">User Address request</li>
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
                <h3 class="card-title">Verify User Addresses</h3>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Wallet Name</th>
                    <th>Wallet Address</th>
                    <th>Date</th>
                    <th>Sendings</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=0; foreach($result as $row): $i++;?>
                  <tr>
                      <td><?=$i?></td>
                     <td>
                      <b><?= $row->name ?></b><br/>
                    </td>
                    <td>
                      <b><?= $row->add_name ?></b><br/>
                    </td>
                    <td>
                    <?= $row->add_wallet ?><br/>
                    </td>
                    <td><?= $row->add_date?></td>
                    <td><button class="btn btn-info" onclick="window.open('<?=base_url()?>uploads/<?= $row->add_file ?>','_blank');">File</button></td>
                    <td>
                        <?php if(@$row->status == '0'){
                            echo 'Pending';
                        }else{
                            echo 'Approved';
                        } ?>
                    </td>
                    <td> 
                        <a href="<?=base_url()?>admin/change-request-status/<?= $row->add_id?>" class="btn btn-sm btn-outline-success mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Click to Accept or Decline address request">
                          <i class="fa fa-exchange-alt"></i>
                        </a>
                        <a href="<?=base_url()?>admin/delete-request/<?= $row->add_id?>" class="btn btn-sm btn-outline-danger mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Delete Request">
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