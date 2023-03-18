<style>
h5.user-details {
    text-align: left;
    font-size: 1.15rem;
    color: #696f77 !important;
}
span.details{
    color:#9e9e9e !important;
}
#verification-status{
    display:none;
}.click-btn {
    background: transparent;
    border: none;
    color: #3e69a7;
    text-decoration: underline;
    font-weight: 600;
    font-size: 1rem;
}
.not-verified{
    display:block !important;
    position: absolute;
    margin: auto;
    top: 28%;
    background: #fff;
    font-weight: 500;
    color: #111e31;
    right: 30%;
    z-index: 999;
    padding: 1rem;
    box-shadow: 0 0 11px #00000075;
    font-size: 1.2rem;
    border-radius: 1rem;
}

    .declined{
        border: none;
        background: #f55252;
        font-weight: 500;
        letter-spacing: 0.8px;
    }
    .successful{
        border: none;
        font-weight: 500;
        letter-spacing: 0.8px;
    }
    .review{
       border: 1px solid #142135;
       background: #142135;
       border-radius: 3px;
       padding: 2px 8px;
       color: #fff;
    }
    .review:hover{
        background-color:#264c86;
    }
    #track_txn_id_button::disabled{
        cursor:none;
    }
    .t-details{
        color: #9e9e9e;
        font-weight: 500;
        font-size: 1.12rem;
        text-align: center;
        margin: 2rem 0 0.5rem 0;

    }

</style>

<div class="custom-container"></div>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
<link href="<?=base_url()?>assets/toastr.css" rel="stylesheet"/>
<script src="<?=base_url()?>assets/toastr.js"></script>
<div class='content-layout'>
    <div class='row row-cols-1 row-cols-md-3 g-4'>
        <div class='col c1'>
            <div class='my-cards card'>
                <div class='custom-card card-body'>
                    <h5 class='card-title text-center'>Associates</h5>
                    <hr style=' margin: 0.7rem 0 1rem 0; '>
                    <div class='custom-pad form-group c-flex'>
                         <input style='font-size: 0.9rem;' id="search_associate" type='text' class='form-control' placeholder='Enter Associates name...'>
                    </div>
                    
                    <div style=" background:#fff; height:2rem"></div>
                    
                    <div id="chat_user_area"></div>
                    <div id="user-popup"></div>
                </div>
            </div>
        </div>
        <div class='col c2'>
            <div class='my-cards card'>
                <div style=" padding: 0.5rem 0; " id="middle_portion" class=' custom-card card-body'>
                    <ul style="margin: 0 12px !important;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class=" link-size nav-item" role="presentation">
                                <button class="nav-link active link-size " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#address" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Addresses</button>
                            </li>
                            <li class="link-size nav-item" role="presentation">
                                <button class="nav-link link-size " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#transaction" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Transaction</button>
                            </li>
                            <li class="link-size nav-item" role="presentation">
                                <button class="nav-link link-size " id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#confirmation" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Confirmation</button>
                            </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="nav-link link-size " id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#get-verified" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Get Verified</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="nav-link link-size " id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#learn-more" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Learn More</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent" style=" height: 100vh; overflow: auto; ">
                        <!--address-->
                        
                        <div class="tab-pane fade show active " id="address" role="tabpanel" aria-labelledby="pills-home-tab">
                            <hr style=' margin: 0 0 1rem 0;  '>

                            <div id='container-content'>
                                <ul style=" margin: 1rem auto; width: 80%; border:none" class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link link-size2 active" id="add_address" data-bs-toggle="tab" data-bs-target="#add_address_view" type="button" role="tab" aria-controls="home" aria-selected="true">Add Address</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link link-size2" id="address_list" data-bs-toggle="tab" data-bs-target="#address_list_view" type="button" role="tab" aria-controls="profile" aria-selected="false">Address List</button>
                                    </li>
                                </ul>
                                
                                <div class="tab-content deactivate" id="myTabContent">
                                    <!--Add Address-->
                                     <div  id="verification-status">Get Verified first to access this page</div>
                                    <div class="tab-pane fade show active" id="add_address_view" role="tabpanel" aria-labelledby="add_address">
                                    <?php $this->load->view('partials/messages'); ?>
                                        <form class='c-form-control custom-pad2' action="<?=base_url()?>add-address" method="POST" enctype="multipart/form-data">
                                            <h5>Add Address</h5>
                                            <div class='form-group  c-form-group'>
                                                <label class='custom-label'>Enter Your Name:</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                                    <input type='text' class='form-control' name="add_name" placeholder='Name' required>
                                                </div>
                                            </div>

                                            <div class='form-group c-form-group'>
                                                <label class='custom-label'>Enter Your Wallet Address:</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.4rem;' class='fas fa-wallet  form-u-name'></i>
                                                    <input type='text' class='form-control' name="add_wallet" placeholder='Wallet Address' required>
                                                </div>
                                            </div>


                                            <div class='form-group c-form-group'>
                                                <label class='wallet'>Upload any identity Proof which prove<br /> this wallet belongs to you</label>
                                                <div style=' text-align: center; ' class='file-input'>
                                                    <input type='file' name='add_file' id='file-input' class='file-input__input'  required/>
                                                    <label class='file-input__label' for='file-input'>
                                                        <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='upload' class='svg-inline--fa fa-upload fa-w-16' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                                            <path fill='currentColor' d='M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z'></path>
                                                        </svg>
                                                        <span>Upload file</span></label>
                                                </div>
                                                <p>Proof type: PNG</p>
                                            </div>

                                            <div class='form-group c-form-group'>
                                                <label style='margin-bottom: 0;' class='wallet'>Date Added</label>
                                                <input type='text' class='form-control' name="add_date" value="<?=date('d-m-Y')?>" readonly required>
                                            </div>

                                            <div style='border-bottom: none;' class='form-group c-form-group'>
                                                <button type='submit' class='btn btn-primary'>Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Address list-->
                                    <div class="tab-pane fade" id="address_list_view" role="tabpanel" aria-labelledby="address_list">
                                        <?php foreach($result as $row): ?>
                                        <div id="table<?= $row['add_id']; ?>" style="border-radius:12px;border: 5px solid rgb(175 175 175);margin: auto;padding: 0.3rem 0;overflow: auto;width: 90%;">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Wallet Address</th>
                                                        <th>Date Added</th>
                                                        <!--<th>Confirmation</th>-->
                                                        <th>Status</th>
                                                        <?php if(@$row['status'] == 0){ ?>
                                                        <th>Manage</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="<?= $row['add_id']; ?>">
                                                        <td data-column="First Name"><?=@$row['add_name']?></td>
                                                        <td data-column="Last Name" class="overflow-anywhere"><?=@$row['add_wallet']?></td>
                                                        <td data-column="Job Title"><?=@$row['add_date']?></td>
                                                        <!--<td data-column="Job Title">50</td>-->
                                                        <?php if(@$row['status'] == 0){
                                                            echo '<td data-column="Twitter"><button class="pending">Pending</button></td>
                                                        <td style="padding: 12px;" data-column="Twitter">
                                                            <i style="color:red; cursor:pointer; margin-right:0.5rem; font-size:1rem" class="fas fa-trash-alt remove_address"></i>
                                                            <a data-bs-toggle="modal" href="#exampleModalToggle'.@$row['add_id'].'" role="button"><i style="font-size:1rem; color:green; cursor:pointer" class="fas fa-edit"></i></a>
                                                        </td>';
                                                        }else{
                                                             echo '<td data-column="Twitter"><button class="verified">Verified</button></td>';
                                                        }?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="modal fade" id="exampleModalToggle<?=@$row['add_id']?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalToggleLabel">Edit Address</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                     <form class='c-form-control custom-pad2' action="<?=base_url()?>edit-address" method="POST" enctype="multipart/form-data">
                                                    <div class='form-group  c-form-group'>
                                                        <label class='custom-label'>Enter Your Name:</label>
                                                        <div class='c-flex'>
                                                            <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                                            <input type='text' class='form-control' name="add_name" value="<?=@$row['add_name']?>" placeholder='Name' required>
                                                            <input type='hidden' name="add_id" value="<?=@$row['add_id']?>">
                                                        </div>
                                                    </div> 
        
                                                    <div class='form-group c-form-group'>
                                                        <label class='custom-label'>Enter Your Wallet Address:</label>
                                                        <div class='c-flex'>
                                                            <i style='margin-right: 0.4rem;' class='fas fa-wallet  form-u-name'></i>
                                                            <input required type='text' class='form-control' name="add_wallet" value="<?=@$row['add_wallet']?>" placeholder='Wallet Address'>
                                                        </div>
                                                    </div>
        
        
                                                    <div class='form-group c-form-group'>
                                                        <label class='wallet'>Upload any identity Proof which prove<br /> this wallet belongs to you</label>
                                                        <div style=' text-align: center; ' class='file-input'>
                                                            <input type='file' name='add_file' id='file-input' class='file-input__input' />
                                                            <label class='file-input__label' for='file-input'>
                                                                <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='upload' class='svg-inline--fa fa-upload fa-w-16' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                                                    <path fill='currentColor' d='M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z'></path>
                                                                </svg>
                                                                <span>Upload file</span></label>
                                                        </div>
                                                        <p>Proof type: PNG</p>
                                                        <input type='hidden' name='prev_add_file' value="<?=@$row['add_file']?>" required/>
                                                    </div>
        
                                                    <div class='form-group c-form-group'>
                                                        <label style='margin-bottom: 0;' class='wallet'>Date Added</label>
                                                        <input required type='text' class='form-control' name="add_date" value="<?=date('d-m-Y')?>" placeholder='Choose date' readonly>
                                                    </div>
        
                                                    <div style='border-bottom: none;' class='form-group c-form-group'>
                                                        <button type='submit' class='btn btn-primary'>Submit</button>
                                                    </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--transaction-->
                        <div class="tab-pane fade custom-pad deactivate" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
                             <div  id="verification-status">Get Verified first to access this page</div>
                            <hr style=' margin: 0 0 1rem 0;  '>
                            <div id='container-content'>
                                <ul style=" margin: 1rem auto; width: 80%; border:none" class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link link-size2 active" id="transaction" data-bs-toggle="tab" data-bs-target="#add-transaction" type="button" role="tab" aria-controls="home" aria-selected="true">Add Transaction</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link link-size2" id="t-lists" data-bs-toggle="tab" data-bs-target="#t-list" type="button" role="tab" aria-controls="profile" aria-selected="false">Transaction Request</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link link-size2" id="t-reviews" data-bs-toggle="tab" data-bs-target="#t-review" type="button" role="tab" aria-controls="profile" aria-selected="false">Transaction Review</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!--Transaction-->
                                    <div class="tab-pane fade show active" id="add-transaction" role="tabpanel" aria-labelledby="transaction">
                                        <form class='c-form-control custom-pad2' method="POST" action = "<?=base_url('send-txn-request')?>">
                                            <div class='form-group  c-form-group'>
                                                <label class='custom-label2'>Transaction Id:</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;height: 33px;width: 33px;' class='fas fa-receipt form-u-name'></i>
                                                    <!--<p class='form-control '>TNX001255B4566DFR1515</p>-->
                                                    <input type='text' class='form-control' name="txn_id" value="TNX<?=time().rand(9,99)?>" readonly="readonly" required>
                                                </div>
                                            </div>

                                            <div class='form-group  c-form-group'>
                                                <label class='custom-label2'>Associates Email:</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                                    <input type='email' class='form-control' name="receiver_email" placeholder='Enter email' required>
                                                </div>
                                            </div>

                                            <div class='form-group c-form-group'>
                                                <label class='custom-label2'>Select wallet address from your address list</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.4rem;' class='fas fa-wallet  form-u-name'></i>
                                                    <select name="txn_wallet_address" class="form-control" required>
                                                        <option selected>Select address</option>
                                                        <?php foreach($active_address as $row): ?>
                                                            <option><?=$row['add_wallet']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class='form-group c-form-group'>
                                                <label style='margin-bottom: 0;' class='custom-label2'>Date Initiated</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;' class='fas fa-calendar-week form-u-name'></i>
                                                    <input type='text' name="txn_date" class='form-control' value="<?=date('d-m-Y')?>" readonly required>
                                                </div>
                                            </div>

                                            <div style='border-bottom: none;' class='form-group c-form-group'>
                                                <button type='submit' class='btn btn-primary'>Send Request</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Transaction list-->
                                    <div class="tab-pane fade notification_area" id="t-list" role="tabpanel" aria-labelledby="t-lists" style="text-align:center">
                                    </div>
                                    <!--Transaction review-->
                                    <div class="tab-pane fade" id="t-review" role="tabpanel" aria-labelledby="t-reviews">
                                        <form class='c-form-control custom-pad2' id="transactionRequest">
                                            <div class='form-group  c-form-group'>
                                                <label class='custom-label2'>Track Transaction Id:</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem; text-align: center;font-size: 1rem;' class='fas fa-receipt form-u-name'></i>
                                                    <input type='text' class='form-control' id="track_txn_id" placeholder='Enter Transaction Id ' required>
                                                </div>
                                            </div>

                                            <div style='border-bottom: none;' class='form-group c-form-group'>
                                                <button type='submit' id="track_txn_id_button" class='btn btn-primary'>Search Now</button>
                                            </div>
                                        </form>
                                        <div style=" padding: 0 2rem; " id="track_txn_area"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--confirmation-->
                        <div class="tab-pane fade custom-pad deactivate" id="confirmation" role="tabpanel" aria-labelledby="pills-contact-tab">
                             <div  id="verification-status">Get Verified first to access this page</div>
                            <hr style=' margin: 0 0 2.5rem 0;'>
                            <div id='container-content'>
                                <ul style="margin: 1rem auto; width: 80%; border:none" class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link link-size2 active" id="sended" data-bs-toggle="tab" data-bs-target="#sended-transaction" type="button" role="tab" aria-controls="home" aria-selected="true">Transaction Request Sent </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link link-size2" id="received" data-bs-toggle="tab" data-bs-target="#received-transaction" type="button" role="tab" aria-controls="profile" aria-selected="false">Transaction Request Received</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!--Transaction sent-->
                                    <div class="tab-pane fade show active" id="sended-transaction" role="tabpanel" aria-labelledby="transaction">
                                        <?php foreach($sended as $row): ?>
                                            <div style="border-radius:12px;border: 5px solid rgb(175 175 175);margin:1rem;padding: 0.3rem 0;">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Transaction ID</th>
                                                            <th>Wallet Address</th>
                                                            <th>Date Initiated</th>
                                                            <th>Date Completed</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="overflow-anywhere"><?=@$row['txn_id']?></td>
                                                            <td class="overflow-anywhere"><?=@$row['txn_wallet_address']?></td>
                                                            <td><?=@$row['txn_date']?></td>
                                                            <td><?=@$row['txn_verified_date']?></td>
                                                             <?php if(@$row['status'] == 0){
                                                                    echo '<td><button class="pending">Pending</button></td>';
                                                                }elseif(@$row['status'] == 1){
                                                                     echo '<td><button class="verified successful">Successfull</button></td>';
                                                                }else{
                                                                     echo '<td><button class="verified declined" >Declined</button></td>';
                                                                }?>
                                                            <!--<td><button onclick=reload() class="review" >Review</button></td>-->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                     <div class="tab-pane fade" id="received-transaction" role="tabpanel" aria-labelledby="t-reviews">
                                        <?php foreach($received as $row): ?>
                                            <div style="border-radius:12px;border: 5px solid rgb(175 175 175);margin:1rem;padding: 0.3rem 0;">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Transaction ID</th>
                                                            <th>Wallet Address</th>
                                                            <th>Date Initiated</th>
                                                            <th>Date Completed</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td data-column="First Name" class="overflow-anywhere"><?=@$row['txn_id']?></td>
                                                            <td data-column="Last Name" class="overflow-anywhere"><?=@$row['txn_wallet_address']?></td>
                                                            <td data-column="Job Title"><?=@$row['txn_date']?></td>
                                                            <td data-column="Job Title"><?=@$row['txn_verified_date']?></td>
                                                             <?php if(@$row['status'] == 0){
                                                                    echo '<td data-column="Twitter"><button class="pending">Pending</button></td>';
                                                                }elseif(@$row['status'] == 1){
                                                                     echo '<td data-column="Twitter"><button class="verified successful">Successfull</button></td>';
                                                                }else{
                                                                     echo '<td data-column="Twitter"><button class="verified declined" >Declined</button></td>';
                                                                }?>
                                                            <!--<td data-column="Twitter"><button class="review">Review</button></td>-->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--get-verified-->
                        <div class="tab-pane fade custom-pad after-verified" id="get-verified" role="tabpanel" aria-labelledby="pills-profile-tab">
                             <div  id="after-verification-status">You are already verified.</div>
                            <hr style=' margin: 0 0 1rem 0;  '>
                            <h4 style="font-weight: 700;margin-top: 2rem;background: #bebebe;padding: 0.8rem 0 0.8rem 0.8rem;width: 52%;">Verify Your Provided Details</h4>
                            <div class="triangle-bottom"></div>

                            <p class="getverify-para">It is mandatory that all users should verify their provided details before having full access to the features of his/her account. We protect both Associates of every initiated
                                Transaction by confirming that both Associates are legitimately the real owners of both account. Your Uploaded selfie must correspond with your uploaded Profile photograph.
                                Thereby confirming that the account is legitimately own and managed by the user whose detail are provided on the account.</p>
                            <h4 class="get-verify-heading ">Profile Verification</h4>
                            <div class="statusMsg"></div>
                            <form method="POST" action="<?=base_url('profile-verification')?>" style="padding: 0 2rem; width:100%;" class='c-form-control custom-pad2' id="fupForm"  enctype="multipart/form-data">
                                <h4>Add Your Details:</h4>
                                <div class='form-group c-form-group c-flex'>
                                    <div>
                                        <label class='wallet'>Upload a selfie of yours</label>
                                        <div style=' text-align: center; ' class='file-input'>
                                            <input type='file' name='selfie' class='form-control' />
                                        </div>
                                        <p style="margin-top: 2rem;">Maximum Size 100mb</p>
                                        <h4 class="verification-code">Verification Code:</h4>
                                            <?php $code = rand(99999,999999); ?>
                                        <h4 style=" color: #0aa2d0; "><?=$code?></h4>
                                        <input type="hidden" value="<?=$code?>" name="verification_code" required>
                                        <p style="margin-top: 2rem;">To complete selfie verification, please take a photo of yourself while holding up a paper with Your Name, current date and the verification code clearly written on it.</p>
                                    </div>

                                    <img style="margin-left: 1%;" width="50%" height="50%" src="<?=base_url('assets')?>/images/Selfie verification.png" />
                                </div>
                                <h4 style="margin-top: 2rem;">Account Type</h4>
                                <div class='form-group  c-form-group'>
                                    <div class='c-flex'>
                                        <input required style="margin-top: 0.6rem;" type='radio' name="account_type" value="Individual">
                                        <i style=" color: #244a79; font-size: 1.25rem; padding: 0 3rem 0 1rem;">Individual</i>
                                        <input required style="margin-top: 0.6rem;" type='radio' name="account_type" value="Company"><i style=" color: #244a79; font-size: 1.25rem; padding: 0 3rem 0 1rem;">Company</i>
                                    </div>
                                </div>

                                <h4 class="get-verify-heading ">Add Your Details:</h4>
                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Country</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;height: 33px;width: 33px;' class='fas fa-flag form-u-name'></i>
                                        <select required id='country' class='form-control' name='country'>
                                               <option selected>Select Country</option>
                                               <option value="Afganistan">Afghanistan</option>
                                               <option value="Albania">Albania</option>
                                               <option value="Algeria">Algeria</option>
                                               <option value="American Samoa">American Samoa</option>
                                               <option value="Andorra">Andorra</option>
                                               <option value="Angola">Angola</option>
                                               <option value="Anguilla">Anguilla</option>
                                               <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                               <option value="Argentina">Argentina</option>
                                               <option value="Armenia">Armenia</option>
                                               <option value="Aruba">Aruba</option>
                                               <option value="Australia">Australia</option>
                                               <option value="Austria">Austria</option>
                                               <option value="Azerbaijan">Azerbaijan</option>
                                               <option value="Bahamas">Bahamas</option>
                                               <option value="Bahrain">Bahrain</option>
                                               <option value="Bangladesh">Bangladesh</option>
                                               <option value="Barbados">Barbados</option>
                                               <option value="Belarus">Belarus</option>
                                               <option value="Belgium">Belgium</option>
                                               <option value="Belize">Belize</option>
                                               <option value="Benin">Benin</option>
                                               <option value="Bermuda">Bermuda</option>
                                               <option value="Bhutan">Bhutan</option>
                                               <option value="Bolivia">Bolivia</option>
                                               <option value="Bonaire">Bonaire</option>
                                               <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                               <option value="Botswana">Botswana</option>
                                               <option value="Brazil">Brazil</option>
                                               <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                               <option value="Brunei">Brunei</option>
                                               <option value="Bulgaria">Bulgaria</option>
                                               <option value="Burkina Faso">Burkina Faso</option>
                                               <option value="Burundi">Burundi</option>
                                               <option value="Cambodia">Cambodia</option>
                                               <option value="Cameroon">Cameroon</option>
                                               <option value="Canada">Canada</option>
                                               <option value="Canary Islands">Canary Islands</option>
                                               <option value="Cape Verde">Cape Verde</option>
                                               <option value="Cayman Islands">Cayman Islands</option>
                                               <option value="Central African Republic">Central African Republic</option>
                                               <option value="Chad">Chad</option>
                                               <option value="Channel Islands">Channel Islands</option>
                                               <option value="Chile">Chile</option>
                                               <option value="China">China</option>
                                               <option value="Christmas Island">Christmas Island</option>
                                               <option value="Cocos Island">Cocos Island</option>
                                               <option value="Colombia">Colombia</option>
                                               <option value="Comoros">Comoros</option>
                                               <option value="Congo">Congo</option>
                                               <option value="Cook Islands">Cook Islands</option>
                                               <option value="Costa Rica">Costa Rica</option>
                                               <option value="Cote DIvoire">Cote DIvoire</option>
                                               <option value="Croatia">Croatia</option>
                                               <option value="Cuba">Cuba</option>
                                               <option value="Curaco">Curacao</option>
                                               <option value="Cyprus">Cyprus</option>
                                               <option value="Czech Republic">Czech Republic</option>
                                               <option value="Denmark">Denmark</option>
                                               <option value="Djibouti">Djibouti</option>
                                               <option value="Dominica">Dominica</option>
                                               <option value="Dominican Republic">Dominican Republic</option>
                                               <option value="East Timor">East Timor</option>
                                               <option value="Ecuador">Ecuador</option>
                                               <option value="Egypt">Egypt</option>
                                               <option value="El Salvador">El Salvador</option>
                                               <option value="Equatorial Guinea">Equatorial Guinea</option>
                                               <option value="Eritrea">Eritrea</option>
                                               <option value="Estonia">Estonia</option>
                                               <option value="Ethiopia">Ethiopia</option>
                                               <option value="Falkland Islands">Falkland Islands</option>
                                               <option value="Faroe Islands">Faroe Islands</option>
                                               <option value="Fiji">Fiji</option>
                                               <option value="Finland">Finland</option>
                                               <option value="France">France</option>
                                               <option value="French Guiana">French Guiana</option>
                                               <option value="French Polynesia">French Polynesia</option>
                                               <option value="French Southern Ter">French Southern Ter</option>
                                               <option value="Gabon">Gabon</option>
                                               <option value="Gambia">Gambia</option>
                                               <option value="Georgia">Georgia</option>
                                               <option value="Germany">Germany</option>
                                               <option value="Ghana">Ghana</option>
                                               <option value="Gibraltar">Gibraltar</option>
                                               <option value="Great Britain">Great Britain</option>
                                               <option value="Greece">Greece</option>
                                               <option value="Greenland">Greenland</option>
                                               <option value="Grenada">Grenada</option>
                                               <option value="Guadeloupe">Guadeloupe</option>
                                               <option value="Guam">Guam</option>
                                               <option value="Guatemala">Guatemala</option>
                                               <option value="Guinea">Guinea</option>
                                               <option value="Guyana">Guyana</option>
                                               <option value="Haiti">Haiti</option>
                                               <option value="Hawaii">Hawaii</option>
                                               <option value="Honduras">Honduras</option>
                                               <option value="Hong Kong">Hong Kong</option>
                                               <option value="Hungary">Hungary</option>
                                               <option value="Iceland">Iceland</option>
                                               <option value="Indonesia">Indonesia</option>
                                               <option value="India">India</option>
                                               <option value="Iran">Iran</option>
                                               <option value="Iraq">Iraq</option>
                                               <option value="Ireland">Ireland</option>
                                               <option value="Isle of Man">Isle of Man</option>
                                               <option value="Israel">Israel</option>
                                               <option value="Italy">Italy</option>
                                               <option value="Jamaica">Jamaica</option>
                                               <option value="Japan">Japan</option>
                                               <option value="Jordan">Jordan</option>
                                               <option value="Kazakhstan">Kazakhstan</option>
                                               <option value="Kenya">Kenya</option>
                                               <option value="Kiribati">Kiribati</option>
                                               <option value="Korea North">Korea North</option>
                                               <option value="Korea Sout">Korea South</option>
                                               <option value="Kuwait">Kuwait</option>
                                               <option value="Kyrgyzstan">Kyrgyzstan</option>
                                               <option value="Laos">Laos</option>
                                               <option value="Latvia">Latvia</option>
                                               <option value="Lebanon">Lebanon</option>
                                               <option value="Lesotho">Lesotho</option>
                                               <option value="Liberia">Liberia</option>
                                               <option value="Libya">Libya</option>
                                               <option value="Liechtenstein">Liechtenstein</option>
                                               <option value="Lithuania">Lithuania</option>
                                               <option value="Luxembourg">Luxembourg</option>
                                               <option value="Macau">Macau</option>
                                               <option value="Macedonia">Macedonia</option>
                                               <option value="Madagascar">Madagascar</option>
                                               <option value="Malaysia">Malaysia</option>
                                               <option value="Malawi">Malawi</option>
                                               <option value="Maldives">Maldives</option>
                                               <option value="Mali">Mali</option>
                                               <option value="Malta">Malta</option>
                                               <option value="Marshall Islands">Marshall Islands</option>
                                               <option value="Martinique">Martinique</option>
                                               <option value="Mauritania">Mauritania</option>
                                               <option value="Mauritius">Mauritius</option>
                                               <option value="Mayotte">Mayotte</option>
                                               <option value="Mexico">Mexico</option>
                                               <option value="Midway Islands">Midway Islands</option>
                                               <option value="Moldova">Moldova</option>
                                               <option value="Monaco">Monaco</option>
                                               <option value="Mongolia">Mongolia</option>
                                               <option value="Montserrat">Montserrat</option>
                                               <option value="Morocco">Morocco</option>
                                               <option value="Mozambique">Mozambique</option>
                                               <option value="Myanmar">Myanmar</option>
                                               <option value="Nambia">Nambia</option>
                                               <option value="Nauru">Nauru</option>
                                               <option value="Nepal">Nepal</option>
                                               <option value="Netherland Antilles">Netherland Antilles</option>
                                               <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                               <option value="Nevis">Nevis</option>
                                               <option value="New Caledonia">New Caledonia</option>
                                               <option value="New Zealand">New Zealand</option>
                                               <option value="Nicaragua">Nicaragua</option>
                                               <option value="Niger">Niger</option>
                                               <option value="Nigeria">Nigeria</option>
                                               <option value="Niue">Niue</option>
                                               <option value="Norfolk Island">Norfolk Island</option>
                                               <option value="Norway">Norway</option>
                                               <option value="Oman">Oman</option>
                                               <option value="Pakistan">Pakistan</option>
                                               <option value="Palau Island">Palau Island</option>
                                               <option value="Palestine">Palestine</option>
                                               <option value="Panama">Panama</option>
                                               <option value="Papua New Guinea">Papua New Guinea</option>
                                               <option value="Paraguay">Paraguay</option>
                                               <option value="Peru">Peru</option>
                                               <option value="Phillipines">Philippines</option>
                                               <option value="Pitcairn Island">Pitcairn Island</option>
                                               <option value="Poland">Poland</option>
                                               <option value="Portugal">Portugal</option>
                                               <option value="Puerto Rico">Puerto Rico</option>
                                               <option value="Qatar">Qatar</option>
                                               <option value="Republic of Montenegro">Republic of Montenegro</option>
                                               <option value="Republic of Serbia">Republic of Serbia</option>
                                               <option value="Reunion">Reunion</option>
                                               <option value="Romania">Romania</option>
                                               <option value="Russia">Russia</option>
                                               <option value="Rwanda">Rwanda</option>
                                               <option value="St Barthelemy">St Barthelemy</option>
                                               <option value="St Eustatius">St Eustatius</option>
                                               <option value="St Helena">St Helena</option>
                                               <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                               <option value="St Lucia">St Lucia</option>
                                               <option value="St Maarten">St Maarten</option>
                                               <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                               <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                               <option value="Saipan">Saipan</option>
                                               <option value="Samoa">Samoa</option>
                                               <option value="Samoa American">Samoa American</option>
                                               <option value="San Marino">San Marino</option>
                                               <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                               <option value="Saudi Arabia">Saudi Arabia</option>
                                               <option value="Senegal">Senegal</option>
                                               <option value="Seychelles">Seychelles</option>
                                               <option value="Sierra Leone">Sierra Leone</option>
                                               <option value="Singapore">Singapore</option>
                                               <option value="Slovakia">Slovakia</option>
                                               <option value="Slovenia">Slovenia</option>
                                               <option value="Solomon Islands">Solomon Islands</option>
                                               <option value="Somalia">Somalia</option>
                                               <option value="South Africa">South Africa</option>
                                               <option value="Spain">Spain</option>
                                               <option value="Sri Lanka">Sri Lanka</option>
                                               <option value="Sudan">Sudan</option>
                                               <option value="Suriname">Suriname</option>
                                               <option value="Swaziland">Swaziland</option>
                                               <option value="Sweden">Sweden</option>
                                               <option value="Switzerland">Switzerland</option>
                                               <option value="Syria">Syria</option>
                                               <option value="Tahiti">Tahiti</option>
                                               <option value="Taiwan">Taiwan</option>
                                               <option value="Tajikistan">Tajikistan</option>
                                               <option value="Tanzania">Tanzania</option>
                                               <option value="Thailand">Thailand</option>
                                               <option value="Togo">Togo</option>
                                               <option value="Tokelau">Tokelau</option>
                                               <option value="Tonga">Tonga</option>
                                               <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                               <option value="Tunisia">Tunisia</option>
                                               <option value="Turkey">Turkey</option>
                                               <option value="Turkmenistan">Turkmenistan</option>
                                               <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                               <option value="Tuvalu">Tuvalu</option>
                                               <option value="Uganda">Uganda</option>
                                               <option value="United Kingdom">United Kingdom</option>
                                               <option value="Ukraine">Ukraine</option>
                                               <option value="United Arab Erimates">United Arab Emirates</option>
                                               <option value="United States of America">United States of America</option>
                                               <option value="Uraguay">Uruguay</option>
                                               <option value="Uzbekistan">Uzbekistan</option>
                                               <option value="Vanuatu">Vanuatu</option>
                                               <option value="Vatican City State">Vatican City State</option>
                                               <option value="Venezuela">Venezuela</option>
                                               <option value="Vietnam">Vietnam</option>
                                               <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                               <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                               <option value="Wake Island">Wake Island</option>
                                               <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                               <option value="Yemen">Yemen</option>
                                               <option value="Zaire">Zaire</option>
                                               <option value="Zambia">Zambia</option>
                                               <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Name</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                        <input required type='text' name="name" value="<?=@$_SESSION['name']?>" class='form-control' placeholder='Enter First Name' readonly>
                                    </div>
                                </div>
                                
                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Email</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                        <input required type='email' name="email" value="<?=@$_SESSION['email']?>" class='form-control' placeholder='Enter First Name' readonly>
                                    </div>
                                </div>

                                <div class='form-group c-form-group'>
                                    <label style='margin-bottom: 0;' class='custom-label2'>Date of Birth</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-calendar-week form-u-name'></i>
                                        <input required type='date' name="dob" class='form-control ' placeholder='Choose date'>
                                    </div>
                                </div>

                                <div class='form-group c-form-group'>
                                    <label class='custom-label2'>Primary Phone Number</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-phone form-u-name'></i>
                                        <input required type='number' name="phone" class='form-control ' placeholder='Enter Your Number'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Address Line 1</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-map-marker-alt form-u-name'></i>
                                        <input required type='text' name="address1" class='form-control ' placeholder='Enter your address'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Address Line 2</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-map-marker-alt form-u-name'></i>
                                        <input required type='text' name="address2" class='form-control ' placeholder='Enter Address line 2'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>City</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-location-arrow form-u-name'></i>
                                        <input required type='city' name="city" class='form-control ' placeholder='Enter City'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>State</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-location-arrow form-u-name'></i>
                                        <input required type='text' name="state" class='form-control ' placeholder='Enter Your State'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <label class='custom-label2'>Zip Code/Postal Code</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-map-marked-alt form-u-name'></i>
                                        <input required required type='number' name="zipcode" class='form-control ' placeholder='Enter Your Zip code'>
                                    </div>
                                </div>

                                <div class='form-group  c-form-group'>
                                    <div class='c-flex'>
                                        <input required style="margin-top: 0.4rem;" type="checkbox" checked disabled={checkStat == 1 ? true : false}/>
                                        <p class='custom-label2 c-term'>
                                            <span style=" color: #da750c; text-decoration: underline;">
                                                i agree to the terms and policy</span>
                                            <br />
                                            note that your verification will be automatically resetted every time your change your profile photo graph
                                        </p>
                                    </div>
                                </div>

                                <div style='border-bottom: none;' class='form-group c-form-group'>
                                     <input type="submit" value="Submit" class='btn btn-primary submitBtn' id="btnSubmit"/>
                                    <!--<button type='submit' class='btn btn-primary'>Submit</button>-->
                                </div>
                            </form>
                        </div>
                        
                        <!--learn-more-->
                        <div class="tab-pane fade custom-pad" id="learn-more" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <hr style=' margin: 0 0 1rem 0;  '>
                            <h4 style="font-weight: 700;margin-top: 2rem;background: #bebebe;padding: 0.8rem 0 0.8rem 0.8rem;width: 34%; text-align:center">Learn More</h4>
                            <div class="triangle-bottom2"></div>


                            <h2 class="learn-heading">Register/Signup</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span>Register Yourself from the <a href="signup">register page.</a>
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> If you are already registered then login yourself by <a href="login">clicking here.</a>
                            </p>

                            <h2 class="learn-heading">Profile Creation</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span> After login <a href="signup">click here</a> to create your profile
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> After entering your details review your profile information.
                                <span style="margin-right: 0.8rem;">3.</span> You can upload your profile picture on your <a href="">dashboard page</a>
                            </p>


                            <h2 class="learn-heading">Wallet Address</h2>
                            <p class="learn-para">
                                <span style="margin-right: 0.8rem;">1.</span> You can upload your wallet address from the <a href="">Address page.</a>
                                <br />
                                <span style="margin-right: 0.8rem;">2.</span> After uploading wallet addresses you can view it on the same page(if it not appears then refresh the same page once or twice)</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col c3'>
            <div style='border: none;' class='my-cards card'>
                <div style='padding-top: 0.5rem;' class=' custom-card card-body'>
                    <div style='padding-bottom: 0.5rem;' class='custom-pad form-group  c-flex'>
                        <!-- <span class='fa fa-search form-control-feedback'></span> -->
                        <input style=" border-top-right-radius: 0; border-bottom-right-radius: 0; " type='text' id='searchAddress' name='search' class='form-control' placeholder='Enter Wallet Address'>
                        <button id="search_address" type="button" class="btn btn-light"><i class='fa fa-search'></i></button>
                    </div>
                    <hr style='margin: 0; height:12px; background:#bdbdbd'>
                    <h5 class='custom-pad' style='font-size: 1rem; padding-top:1rem'>Wallet Address search summary</h5>
                    <hr>

                    <h5 class='custom-pad' style='font-size: 1rem;'>
                        <?php
                        if (isset($_POST['search_address'])) {
                            $query = $_POST['search_address'];
                            echo $query . "<i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i>";
                        } else {
                            echo "Paste Your wallet address above to search for transaction
                                        ";
                        }
                        ?>
                    </h5>
                    <div style ="padding: 0 1.25rem;" id="search_address_area" class="custom-pad"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($this->session->verified != '1'){ ?>
    <script>
        $('.deactivate').css({'pointer-events': 'none','opacity': '0.4'});
        $('#verification-status').addClass('not-verified');
        $('#after-verification-status').css('display', 'none');
    </script>
<?php } else{?>
    <script>
        $('#verification-status').css('display', 'none');
        $('.after-verified').css({'pointer-events': 'none','opacity': '0.4'});
         $('#after-verification-status').addClass('not-verified');
    </script>
    <?php }?>
<script>

$(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?=base_url("profile-verification")?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ 
                // console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    toastr.info(response.message);
                }else{
                    toastr.info(response.message);
                    toastr.info(response.errors.errors);
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                setTimeout(function(){ window.location.reload(1); }, 1000);
            }
        });
    });
});

    $(document).ready(function() {

        function loading() {
                var output = '<div align="center"><br/><br /><br />';
                output += '<img width=50% src="<?php echo base_url(); ?>assets/images/loading.gif" /></div>';
                return output;
        }
        
        //search transaction
        $(document).on('submit', '#transactionRequest', function(e) {
            e.preventDefault();
            var search_query = $.trim($('#track_txn_id').val());
            $('#track_txn_area').html('');
            if (search_query != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/track_txn_id",
                    method: "POST",
                    data: {
                        txn_id: search_query
                    },
                    dataType:"json",
                    beforeSend: function() {
                        $('#track_txn_area').html(loading());
                        $('#track_txn_id_button').prop('disabled', true);
                        $('#transactionRequest').css('display', 'none');
                    },
                    success: function(data) {
                        if(data.length != 0){
                            var status = "";
                            if((data[0].status)==0){
                                status ="<span style='color:#d48209'>Pending...</span>";
    
                            }else if((data[0].status)==1){
                                status ="<span style='color:#0ba71e'>Confirmed</span>";
                            }else{
                                status ="<span style='color:#f55252'>Declined</span>";
                            }
                            
                            var output = '<div class="t-details">Transaction Details</div>';
                            
                                output += '<p style="color: #1f59c3;cursor:pointer; text-align:right; font-weight: 500;"><button type="button" onClick="window.location.reload(); " id="refresh" class="review">Refresh</button><p>';
                                
                                output += '<p style="color: #444; font-weight: 600;margin-bottom:0.2rem"> Transaction ID - <span style="color: #1f59c3; font-weight: 600;">'+ data[0].txn_id+ '</span></p>';
                                output += '<p style="color: #444; font-weight: 600;margin-bottom:1.3rem"> Transaction Status -'+ status + '</p>';
                                
                                output += '<div class="d-flex" style="margin-bottom:1.3rem"><img margin-right:1.1rem width=35 height=35 src="<?= base_url('assets') ?>/images/u1.png"><p style="color:#848282; font-weight: 600;">'+ data[0].sender_email + ' sent request</p></div>';
                               
                               if(data[0].receiver_email == "<?=$_SESSION['email']?>"){
                                  if((data[0].accepted)==1){  
                                    
                                    output += '<div style=" display:block; width :100%;"><div class="d-flex" style=" text-align:right; float:right;">';
                                    output += '<p style="color:#848282; font-weight: 600;margin-right:0.8rem">'+ data[0].receiver_email + ' Accepted </p>';
                                    output += '<img width=35 height=35 src="<?= base_url('assets') ?>/images/u2.png"></div></div>';
                                     
                                    output += '<div class="d-flex" style="margin: 5.5rem 0 0 0 ;"><img margin-right:1.1rem width=35 height=35 src="<?= base_url('assets') ?>/images/u1.png"><p style="color:#848282; font-weight: 600;">'+ data[0].sender_email + ' Shared wallet address<br/><span style="font-weight: 400;margin:0;">'+ data[0].txn_wallet_address+'</p></div>';
                                    
                                    output += '<p style="color: #1f59ce;margin:0; text-align:left;font-weight: 400;">The above shared wallet address has been verified, and we confirm that '+ data[0].sender_email + ' is the legitimate owner of this wallet address. Proceed and view its transaction details.</p>';
                                    output += '<button type="button" class="btn review" id="search_txn_address" style="float:right" data-wallet_address="'+ data[0].txn_wallet_address+'">Review</button>';
                                    output += '<div style=" margin: 3rem auto; " id="search_txn_address_area"></div>';
                                      
                                  }
                                }
                              
                            //   output += '<p style="color: #1f59ce;margin:0; text-align:left;font-weight: 400;">'+ data[0].sender_email + ' Successfully reviewed the shared wallet address. Waiting for '+ data[0].sender_email + ' to confirm that this transaction is successfull...</p>';
    
                                if((data[0].status)==0){
                                  if(data[0].receiver_email != "<?=@$_SESSION['email']?>"){
                                    output += '<p style="color: #d48209; text-align:center;font-weight: 500;">Waiting for '+ data[0].receiver_email + ' to accept the request</p>';
                                  }
                                }
    
                                if((data[0].status)==0){
                                  if(data[0].receiver_email=="<?=@$_SESSION['email']?>"){
                                     output += '<button onClick="window.location.reload(); "  hidden style="float:right" type="button" name="accept_button" class="friend-request accept-request accept_button btn accept" data-receiver_email="' + data[0].receiver_email + '" data-sender_id="' + data[0].sender_id + '" id="accept_txn_button" data-txn_id="' + data[0].txn_id + '" data-wallet_address="'+ data[0].txn_wallet_address+'">Confirm</button>';
                                  }
                                }
                        }else{
                            var output = '<div class="t-details">Invalid Transaction Id</div>';
                        }
                          
                        $('#track_txn_id_button').attr('disabled', false);
                        $('#track_txn_area').html(output);
                        
                    },
                    
                })
            }
           
        });
        
        //search txn Address
        $(document).on('click', '#search_txn_address', function() {
            var search_query = $(this).data('wallet_address');
            console.log(search_query);
            $('#search_txn_address_area').html('');
            if (search_query != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/search_txn_address",
                    method: "POST",
                    data: {
                        search_query: search_query
                    },
                    beforeSend: function() {
                        $('#search_txn_address_area').html(loading());
                        $('#search_txn_address').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        $('#search_txn_address_area').html(data);
                        $('#accept_txn_button').attr('hidden', false);
                        }
                })
            }
        });
        
        //search Address
        $(document).on('click', '#search_address', function() {
            var search_query = $.trim($('#searchAddress').val());
            $('#search_address_area').html('');
            if (search_query != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/search_address",
                    method: "POST",
                    data: {
                        search_query: search_query
                    },
                    // dataType:"json",
                    beforeSend: function() {
                        $('#search_address_area').html(loading());
                        $('#search_address').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#search_address').attr('disabled', false);
                        $('#search_address_area').html(data);
                        $('#searchAddress').val('');
                    }
                })
            }
        });
        
        //accept transaction request
        $(document).on('click', '#accept_txn_button', function() {
            var txn_id = $(this).data('txn_id');
            $.ajax({
                url: "<?php echo base_url(); ?>chat/confirm_txn_request",
                method: "POST",
                data: {
                    txn_id: txn_id
                },
                beforeSend: function() {
                    $('#accept_txn_button').attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#accept_txn_button').attr('hidden');
                }
            })
        });

        //load_notification
        load_notification();

        function load_notification() {
            $.ajax({
                url: "<?php echo base_url(); ?>home/load_txn_notification",
                method: "POST",
                data: {
                    action: 'load_notification'
                },
                dataType: "json",
                beforeSend: function() {
                    $('.notification_area').html(loading());
                },
                success: function(data) {
                    var output = '';
                    if (data.length > 0) {
                        for (var count = 0; count < data.length; count++) {
                            
                            output += '<div><div class="friend-box">' +
                                '<div class="friend-profile" style="background-image:url(<?= base_url() ?>' + data[count].profile_picture + ');"></div>' +
                                '<div class="name-box">' + data[count].name + '</div>' +
                                '<div class="user-name-box">' + data[count].email + ' sent you a transaction request.</div>' +
                                '<div  class="user-name-box" style="top: 5rem;"> Txn Id : <span style="color:#3f51b5">' + data[count].txn_id + '</span></div>' +
                                '<div class="request-btn-row" data-username="' + data[count].email + '">' +
                                '<button onClick="window.location.reload();" type="button" name="accept_button" class="friend-request accept-request accept_button" data-username="' + data[count].email + '" id="accept_button' +
                                data[count].txn_id + '" data-sender_id="' + data[count].user_id + '" data-txn_id="' + data[count].txn_id + '">Accept</button>' +
                                '<button onClick="window.location.reload();" type="button" name="decline_button" class="friend-request decline-request decline_button" data-username="' + data[count].email + '" id="decline_button' +
                                data[count].txn_id + '" data-sender_id="' + data[count].user_id + '" data-txn_id="' + data[count].txn_id + '">Decline</button>' +
                                '</div></div>';
                        }
                    } else {
                        output += '<div align="center" style="height:100vh;margin: 8rem 0;font-size: 1.25rem;color: #525252;"><b>Currently You don\'t have any transaction request</b></div>';
                    }
                    output += '';
                    $('.notification_area').html(output);
                }
            })
        }

        $(document).on('click', '.accept_button', function() {
            var id = $(this).attr('id');
            var txn_id = $(this).data('txn_id');
            var receiver_email = '<?=@$_SESSION['email']?>';
            var sender_id = $(this).data('sender_id');
            $.ajax({
                url: "<?php echo base_url(); ?>chat/accept_txn_request",
                method: "POST",
                data: {
                    txn_id: txn_id,
                    receiver_email:receiver_email,
                    sender_id:sender_id
                },
                beforeSend: function() {
                   $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-warning');
                    $('#' + id).text('Accepted');
                }
            })
        });

        $(document).on('click', '.decline_button', function() {
            var id = $(this).attr('id');
            var txn_id = $(this).data('txn_id');
            $.ajax({
                url: "<?php echo base_url(); ?>chat/decline_txn_request",
                method: "POST",
                data: {
                    txn_id: txn_id
                },
                beforeSend: function() {
                    $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-warning');
                    $('#' + id).text('Declined');
                }
            })
        });

        //load_chat_user();
        load_chat_user();
        
        function load_chat_user() {
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/load_chat_user",
                    method: "POST",
                    data: {
                        action: 'load_chat_user'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#chat_user_area').html(loading());
                    },
                    success: function(data) {
                        console.log(data);
                        var output = '<div class="custom-list">';
                        var output2 = '<div style="margin:0 1.55rem">';
                        var output3 = '';
                            if (data != null && data.length > 0) {
                                var receiver_id_array = '';
                                for (var count = 0; count < data.length; count++) {
                                    if(data[count].name){
                                        
                                        var onlineStatus =  data[count].statuss;
                                        if(onlineStatus == 0){
                                            onlineStatus = 'Offline';
                                        }else{
                                            onlineStatus = 'Online';
                                        }
                                    output += '<a data-bs-toggle="modal" href="#ViewProfile'+count+'" role="button" style=" margin: 0;padding: 0.5rem 1rem !important;border:none !important;" class="list-group-item d-flex user_chat_list chat-hover" data-receiver_id="' + data[count].receiver_id + '" data-receiver_name="' + data[count].name + '" data-chat_request_id="' + data[count].chat_request_id + '">';
    
                                    output += '<p style="display: inline-flex;" class="u-name"> <img style="border-radius:50%" src="<?= base_url() ?>' + data[count].profile_picture + '" class="custom-width2 mr-5 u-img'+data[count].receiver_id+'" />' + data[count].name + '&nbsp<br><span class="u-status">' +onlineStatus+ '<i style="margin-left: 0.5rem;" class="fas fa-check"></i></span>';
                                  
                                    output += '<span  id="chat_notification">';
                                    
                                    output +=     '<i style="font-size: 1rem;color: #0048b1;cursor:pointer;position: relative;right: 0px;top: 28px;" class="fas fa-expand-alt"></i>';
                                   
                                    output += '</span></p>';
                                        
                                    //output2
                                    output2 += '<div class="modal fade" id="ViewProfile'+count+'" aria-hidden="true" aria-labelledby="profile" tabindex="-1">';
                                    output2 += '    <div class="modal-dialog modal-dialog-centered">';
                                    output2 += '    <div class="modal-content">';
                                    output2 += '      <div class="modal-header">';
                                    output2 += '        <h5 class="modal-title" id="exampleModalToggleLabel">User Details</h5>';
                                    output2 += '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                    output2 += '      </div>';
                                    output2 += '        <div style="text-align:center;" id="user_details" class="modal-body">';
                                    
                                    output2 += '<img style="border-radius:50%; margin-bottom:1rem;height:100px;width:100px " src="<?= base_url() ?>' + data[count].profile_picture + '" class=" mr-5 u-img'+data[count].receiver_id+'" />';
                                    output2 += '<h5 class="user-details" style="font-size:1.12rem;text-align:center; margin-bottom:2rem;">'+ data[count].name +'</h5>';
                                    if(data[count].share_email == 1){
                                        output2 += '<h5 class="user-details">Email - <span class="details">'+ data[count].email +'</span></h5>';
                                    }if(data[count].share_mobile == 1){
                                        output2 += '<h5 class="user-details">Number - <span class="details">'+ data[count].phone +'</span></h5>';
                                    }if(data[count].share_wallet == 1){
                                        output2 += '<h5 class="user-details">Wallet Address - <span class="details">'+data[count].wallet+'</span></h5>';
                                    }if(data[count].share_confirmation == 1){
                                        output2 += '<h5 class="user-details">Confirmations - <span class="details">'+data[count].confirmation+'</span></h5>';
                                    }
                                    output2 += '        </div>';
                                    output2 += '    </div>';
                                    output2 += '  </div>';
                                    output2 += '  </div>';
                                    
                                    receiver_id_array += data[count].receiver_id + ',';
                                }
                                
                                    }
                                $('#hidden_receiver_id_array').val(receiver_id_array);
                            } else {
                                output += '<div style="font-size: 1rem; color: #777777; font-weight: 500; margin: 1rem;" align="center">Currently you don\'t have any associates go to <a href="inbox">inbox</a> page and send request to add associates.</div>';
                            }
                        output += '</div>';
                        output2 += '</div>';
                        $('#chat_user_area').html(output);
                        $('#user-popup').html(output2);
                        // $('#user_details').html(output2);
                    }
                })
            }

        $("#search_associate").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".user_chat_list p").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        var receiver_id;

        // $(document).on('click', '.user_chat_list', function() {
        //     var search_query = $(this).data('receiver_id');
        //     console.log(search_query);
        //     // $('#search_address_area').html('');
        //     // if (search_query != '') {
        //     //     $.ajax({
        //     //         url: "<?php echo base_url(); ?>home/search_address",
        //     //         method: "POST",
        //     //         data: {
        //     //             search_query: search_query
        //     //         },
        //     //         // dataType:"json",
        //     //         beforeSend: function() {
        //     //             $('#search_address_area').html(loading());
        //     //             $('#search_address').attr('disabled', 'disabled');
        //     //         },
        //     //         success: function(data) {
        //     //             // console.log(data);
        //     //             $('#search_address').attr('disabled', false);
        //     //             $('#search_address_area').html(data);
        //     //             $('#searchAddress').val('');
        //     //         }
        //     //     })
        //     // }
        // });

        $(".remove_address").click(function(){
                var id = $(this).parents("tr").attr("id");
            
               swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Address!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm) {
                if (isConfirm) {
                  $.ajax({
                     url: '/delete-address/'+id,
                     type: 'DELETE',
                     error: function() {
                        alert('Something is wrong');
                     },
                     success: function(data) {
                          $("#table"+id).remove();
                          swal("Deleted!", "Your Address has been deleted successfully.", "success");
                     }
                  });
                } else {
                  swal("Cancelled", "Your Address is safe :)", "error");
                }
              });
             
            });

    });
</script>