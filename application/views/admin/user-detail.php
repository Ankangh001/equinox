<?php 
// echo "<pre>";
// print_r($user);
// print_r($confirmation);
// print_r($blocked);
// print_r($sended);
// print_r($received);
// print_r($address);
//  exit;
//echo $confirmation;
?>
<style>
    p.card-text.user-no-edit {
    background: #e4e0e0;
    padding: 1rem;
    font-weight: 500;
    border-radius: 12px;
}
.nav-tabs .nav-link:focus{
    border:none;
}
.nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: 0.25rem;
    background: transparent;
    border-top-right-radius: 0.25rem;
}
</style>
    <!--address-->
    <section class="content">
      <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Verify User Addresses</h3>
              </div>
              <div class="card-body table-responsive">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#name" type="button" role="tab" aria-controls="uname" aria-selected="true">User Details</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="uemail" aria-selected="false">Security</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="upassword" aria-selected="false">Addresses</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="uprofile" aria-selected="false">Confirmation</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="ugeneral" aria-selected="false">Verification</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#blocked" type="button" role="tab" aria-controls="ublocked" aria-selected="false">Blocked Associates</button>
                  </li>
                  
                </ul>
                
                <div class="tab-content" id="myTabContent">
                  <!--user details -->
                  <div class="tab-pane fade show active" id="name" role="tabpanel" aria-labelledby="uname">
                      <?php $this->load->view('partials/messages') ?>
                      <form action="<?=base_url('admin/user/edit_user/'.$user['user_id'])?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-sm-6" style="margin: 1rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Profile Image </h5>
                                <p class="card-text">Click to view user profile image</p>
                                <a style="margin-top:1.5rem" href="<?= base_url()."/".$user['profile_picture']?>" class="btn btn-primary">
                                    <img src="<?= base_url()."/".$user['profile_picture']?>" width="50%">
                                    <input type="hidden" value="<?=@$user['profile_picture']?>" name="profile_picture">
                                </a>
                              </div>
                            </div>
                          </div>
                      </div>   

                      <div class="row">
                          <div class="col-sm-6" style="margin: 0 auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">User Name: </h5>
                                <p class="card-text">Type in new name for the user to edit</p>
                                <input type="text" name="name" class="form-control" value="<?=$user['name'] ?>">
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-sm-6" style="margin: 0rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">User Email: </h5>
                                <p class="card-text">Type in new email for the user to edit</p>
                                <input type="email" class="form-control" value="<?=$user['email'] ?>" readonly>
                              </div>
                            </div>
                          </div>
                    </div>
                    
                    <div class="row">
                          <div class="col-sm-6" style="margin:0 auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">User Phone Number: </h5>
                                <p class="card-text">Type in new number for the user to edit</p>
                                <input type= "number" name="phone" class="form-control" value="<?=$user['phone'] ?>">
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-sm-6" style="margin:0  auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">User Date of Birth: </h5>
                                <p class="card-text">Type in new date of birth for the user to edit</p>
                                <input type="date" class="form-control" name="dob" value="<?=$user['dob'] ?>">
                              </div>
                            </div>
                          </div>
                    </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                  </div>
                  
                  <!--security -->
                  <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="uemail">
                    <form action="<?=base_url('admin/user/edit_user_password/'.$user['user_id'])?>" method="POST">
                        <div class="row">
                          <div class="col-sm-6" style="margin: 3rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">New Password: </h5>
                                <p class="card-text">User password are in encrypted form.<br/>Type in new passowrd to change</p>
                                <input type="password" name="password" class="form-control">
                                
                                <h5 style="margin-top:1.5rem"class="card-title">Confirm Password: </h5>
                                <input type="password" name="conf_password" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                  </div>
                  <!--Addresses -->
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="upassword">
                      <div class="row">
                          <div class="col-sm-6" style="margin: 3rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Name: </h5>
                                <p class="card-text"></p>
                                <input class="form-control" type="text" readonly value="<?= @$user['name']?>">
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-sm-6" style="margin: 3rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Wallet Address: </h5>
                                <p class="card-text">User primary wallet address</p>
                                <p><?php if(!@$user['wallet']){
                                        echo "<span style='color:tomato'>user have no primary wallet address yet</span>";
                                    }else{
                                        echo '<input type="text" class="form-control" readonly value="'.$user['wallet'].'">';
                                    }?>
                                </p>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card-body table-responsive">
                              <h5>User Wallet Address List</h5>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                
                                <th>Wallet Name</th>
                                <th>Wallet Address</th>
                                <th>Date</th>
                                <th>Sendings</th>
                                <th>Status</th>
                                <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach($address as $row): ?>
                              <tr>
                                 
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
                  
                  <!--Confirmations -->
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="uprofile">
                          <?php if(! $user['share_confirmation']){
                              echo '
                              
                                    <div class="row">
                                      <div class="col-sm-6" style="margin: 3rem auto;">
                                        <div class="card">
                                          <div class="card-body">
                                            <h5 class="card-title">Confirmation</h5>
                                            <p class="card-text user-no-edit">The user have no confirmation yet</p>
                                            
                                          </div>
                                        </div>
                                      </div>
                                     </div>
                              
                              ';
                          }else{
                            
                            echo '
                                <div class="row">
                                      <div class="col-sm-6" style="margin: 3rem auto;">
                                        <div class="card">
                                          <div class="card-body">
                                            <h5 class="card-title">User Confirmations: </h5>
                                            <p class="card-text user-no-edit">The user have '.$confirmation.'&nbsp Confirmed transaction </p>
                                            
                                          </div>
                                        </div>
                                      </div>
                                     
                                    
                                </div>
                            
                            ';
                          
                          }?>
                    
                  </div>
                  
                  <!--Verification-->
                  <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="ugeneral">
                   
                    
                    <div class="row">
                          <div class="col-sm-6" style="margin: 3rem auto;">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">User verification status: </h5>
                                <p class="card-text user-no-edit"><?php if($user['verified']==0){
                                        echo "<span style='color:tomato'>The user is not verified<span>";
                                
                                }else{
                                    echo "<span style='color:green'>The user is verified</span>";
                                
                                }?></p>
                                
                              </div>
                            </div>
                          </div>
                         
                        
                    </div>
                  </div>
                  
                  <!--Blocked -->
                  <div class="tab-pane fade" id="blocked" role="tabpanel" aria-labelledby="ublocked">
                          <div class="card-body table-responsive">
                             
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                
                                <th>Blocked User Name</th>
                                <th>Blocked User Email</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach($blocked as $row): ?>
                              <tr>
                                 
                                <td>
                                  <b><?= $row->blocked_name?></b><br/>
                                </td>
                                <td>
                                <?= $row->blocked_email ?><br/>
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
        </div>
      </div>
    </section>
  <?php $this->load->view('admin/partials/footer') ?>