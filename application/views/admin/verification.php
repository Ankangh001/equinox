  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verification Request</h1>
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
                <h3 class="card-title">Verify User</h3>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Verification_code</th>
                    <th>Account Type</th>
                    <th>Selfie</th>
                    <th>Country</th>
                    <th>DOB</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $i=0; foreach($result as $row): $i++; ?>
                      <tr>
                          <td><?=$i?></td>
                        <td>
                          <b><?= $row->name ?></b><br/>
                          <b><?= $row->email ?></b><br/>
                        </td>
                        <td>
                          <b><?= $row->verification_code ?></b><br/>
                        </td>
                        <td>
                          <b><?= $row->account_type ?></b><br/>
                        </td>
                        <td><button class="btn btn-info" onclick="window.open('<?=base_url($row->selfie)?>','_blank');">File</button></td>
                        <td>
                        <?= $row->country ?><br/>
                        </td>
                        <td><?= $row->dob?></td>
                        <td><?= $row->phone?></td>
                        <td>
                            <?= $row->address?><br/>
                            <b>City:</b><?= $row->city?><br/>
                            <b>State:</b><?= $row->state?><br/>
                            <b>Zip-code:</b><?= $row->zipcode?>
                        </td>
                        <td>
                            <?php if(@$row->verified == '1'){
                                echo '<span class="badge badge-pill badge-info ml-2">Verified</span>';
                            }else{
                                echo '<span class="badge badge-pill badge-danger ml-2">Not Verified</span>';
                            } ?>
                        </td>
                        <td><?=$row->created_at?></td>
                        <td> 
                            <a href="<?=base_url()?>admin/change-verified-status/<?= $row->user_id?>" class="btn btn-sm btn-outline-success mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Click to Accept or Decline address request">
                              <i class="fa fa-exchange-alt"></i>
                            </a>
                            <a href="<?=base_url()?>admin/delete-verified-request/<?= $row->id?>" class="btn btn-sm btn-outline-danger mr-2 mb-2" data-toggle="tooltip" data-placement="top" title="Delete Request">
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