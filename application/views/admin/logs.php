<?php
//  echo "<pre>";print_r($res);die; 
$this->load->view('admin/includes/header'); ?>
<style>
  .table-responsive{
    padding: 1rem;
  }
  a.paginate_button.current {
    border: none !important;
    background: transparent !important;
    color: blue !important;
  }
</style>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

    `<div class="card p-3 mb-3">
        <table class="table hover" style="padding: 2rem 0 0 0;">
          <thead class="table-light">
            <tr>
              <th>File Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"></tbody>
        </table>
      </div>


      <?php foreach ($res as $key => $value) { ?>
        <div class="col-lg-3">
          <div class="card mb-3 p-3">
            <img class="card-img mb-3" src="<?=base_url('assets/img/')?>log.webp" alt="log-file">
            <p class="my-3 text-center"><?= @$value ?></p>
            <a href="<?=base_url('logs/').$value ?>" target="_blank" class="w-100 pointer btn btn-info">
              <i class='bx bx-link-external'></i>
            </a>
          </div>
        </div>
      <?php } ?>  
      
      
    </div>
  </div>
</div>
    
<?php $this->load->view('admin/includes/footer'); ?>

<script>
  function loadTable(){
    $('.table').DataTable().destroy();
      $('.table').DataTable({
          ajax: "<?php echo base_url('admin/logs/getLogs'); ?>",
          deferRender: false,
          "pageLength": 100,
          columns:[
            {
              data: null,
              render: function (data, type, row) {
                  return row ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `<a href="<?=base_url('logs/')?>${row}" target="_blank" class="pointer btn btn-info">
                            <i class='bx bx-link-external'></i>
                          </a>`;
              }
            }            
          ]
      });
    }

  loadTable();
  $('.paginate_button').addClass('btn btn-primary');
</script>
</body>
</html>