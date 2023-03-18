<?php 
// echo "<pre>";
// print_r($result);
// foreach($result as $txn):
 
 
// endforeach;
?>
<style>
    .my-btn{
        padding:0.5rem 1rem ;
        width:85%;
    }
    .card-body{
    
        text-align:center;
    }
    .card-body h5{
        width:100%;
    }
</style>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaction Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Transactions</li>
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
                    
                    <th>Transaction Id</th>
                    <th>Sender Email</th>
                    <th>Receiver Email</th>
                    <th>Date Initiated</th>
                    <th>Staus</th>
                    <th>View more</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=0; foreach($result as $row): $i++; ?>
                  <tr>
                     <td><?=$row->txn_id?></td>
                     
                    <td>
                      <b><?= $row->sender_email ?></b><br/>
                    </td>
                    <td>
                      <b><?= $row->receiver_email?></b><br/>
                    </td>
                    <td><?= $row->txn_date?></td>
                    
                    <td>
                        <?php if($row->status == '0') {
                                echo '<span class="badge badge-pill badge-secondary">Pending..</span>';
                            }else if($row->status == '1'){
                                echo '<span class="badge badge-pill badge-primary">Confirmed</span>';
                            }else if($row->status == '2'){
                                echo '<span class="badge badge-pill badge-danger">Declined</span>';
                            }  
                        ?>
                    </td>
                    
                    <td> 
                        
                       
                        
                        <button type="button" class="btn btn-sm btn-outline-success mr-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$row->id?>" >
                          <i class="fas fa-eye"></i>
                        </button>
                     </td>
                  </tr>
                  <?php endforeach; ?>
                  
                  
                  <?php $i=0; foreach($result as $row): $i++; ?>
         <!-- Modal -->
            <div class="modal fade" id="staticBackdrop<?=$row->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Transaction ID : <span><?=  $row->txn_id;?></span></h5>
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                  </div>
                  <div class="modal-body" style=" font-weight: 400; ">
                    <p>Sent From:&nbsp<b><?=  $row->sender_email?></b></p>
                    <p>Received By:&nbsp <b><?=  $row->receiver_email?></b> </p>
                    <hr/>
                    <p>Transaction Wallet Address:<br/><b><?=  $row->txn_wallet_address ?></b>  </p>
                    <p>Transaction Date:<br/><b><?=  $row->txn_date ?></b>  </p>
                    <p>Transaction Status:<br>
                        <?php if(($row->status)==0){
                            echo '<span style="color:orange;">Pending</span><br/> Waiting for <b>'. $row->receiver_email.'</b> to accept the request';
                            }else if(($row->status)==1){
                                echo '<span style="color:green;">Succesfull</span><br/>Date Verified:<br/><b>'. $row->txn_verified_date;
                            }else{
                                echo '<span style="color:tomato;">Declined</span><br/><b>'. $row->receiver_email.'</b> declined the request';
                            }
                        ?>
                    </p>
                    
                  </div>
                  
                </div>
              </div>
            </div>
                 <?php endforeach;?> 
                 
                 
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>
    
    
    
    
    
    

   
            
            
    
           
             
           
  <?php $this->load->view('admin/partials/footer') ?>