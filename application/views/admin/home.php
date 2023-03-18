    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.material.min.css">
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            
            
            
            
            
            
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
            
            <?php foreach($result as $row): ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1"><img width="50" src="<?=base_url($row->profile_picture)?>"></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Subscriptions</span>
                        <span class="info-box-number"></span>
                      </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            
             <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-export"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Posts</span>
                    <span class="info-box-number"><?= $result ?></span>
                  </div>
                   
                </div>
                
          <!--</div>-->
          <!--<div class="clearfix hidden-md-up"></div>-->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  <?php $this->load->view('admin/partials/footer') ?>
