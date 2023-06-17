<?php
$this->load->view('user/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <?php foreach ($res as $key => $value) {?>
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3"><?= @$value['title']?></h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3">
                  <?php 
                    if(substr(@$value['created_at'],8,-8) == "01"){
                      echo "1st ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }elseif (substr(@$value['created_at'],8,-8) == "02") {
                      echo "2nd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }elseif (substr(@$value['created_at'],8,-8) == "03") {
                      echo "3rd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }else{
                      echo substr(@$value['created_at'],8,-8).date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }
                    ?>
                </h6>
                <p class="mb-0"><?= @$value['content']?></p>
            </div>
          </div>
        </div>
      </div>
    <?php break;}?>

      <?php foreach ($res as $key => $value) {?>
      <div class="col-md-4 my-5 mx-auto">
        <div class="card">
          <h5 class="card-header text-center border-bottom mb-3"><?= @$value['title']?></h5>
          <div class="card-body row align-items-center">
            <div class="mb-3 col-lg-12 mb-0">
                <h6 class="alert-heading fw-bold mb-3 text-center">
                <?php 
                    if(substr(@$value['created_at'],8,-8) == "01"){
                      echo "1st ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }elseif (substr(@$value['created_at'],8,-8) == "02") {
                      echo "2nd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }elseif (substr(@$value['created_at'],8,-8) == "03") {
                      echo "3rd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }else{
                      echo substr(@$value['created_at'],8,-8).date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                    }
                    ?>
                </h6>
                <p class="mb-0"><?= @$value['content']?></p>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
<script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Promotions</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>