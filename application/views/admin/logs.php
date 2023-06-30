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
      <div class="col-md-6">
        <div class="row g-0">
          <?php foreach ($res as $key => $value) { ?>
            <div class="col-lg-4">
               <div class="card mb-3 p-3">
                  <img class="card-img mb-3" src="<?=base_url('assets/img/')?>log.webp" alt="log-file">
                  <a href="<?=base_url('logs/').$value ?>" target="_blank" class="w-100 pointer btn btn-info">
                    <i class='bx bx-link-external'></i>
                  </a>
                </div>
              </div>
             <?php } ?>            
          </div>
      </div>
    </div>
  </div>
</div>
    
<?php $this->load->view('admin/includes/footer'); ?>
<script>
  
  let requestData = {};
  
  function approveKyc(id){
      requestData.user_id = id;
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/user/approveKyc'); ?>",
          data: requestData,
          beforeSend: function(){
            $('body').prepend(`<div id="loading" class="demo-inline-spacing">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>`
            );
          },
          success: function(data){
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            loadTable();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 8000);
          },
          error: function() { alert("Error posting feed."); }
      });
    };
  
    function rejectKyc(id){
      requestData.user_id = id;
      $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/user/rejectKyc'); ?>",
          data: requestData,
          beforeSend: function(){
            $('body').prepend(`<div id="loading" class="demo-inline-spacing">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>`
            );
          },
          success: function(data){
            $('div#loading').hide(200);
            $('.modal').modal('hide');
            $('#modalCenter').modal('show');
            loadTable();
            setTimeout(() => {
              $('#modalCenter').modal('hide');
            }, 8000);
          },
          error: function() { alert("Error posting feed."); }
      });
    };
  $(document).ready(function () {
    // $('.table').DataTable();
    // $('.paginate_button').addClass('btn btn-primary');
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span>Logs</h4>`);
  });

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
                  return `${row.id}` ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.userName}` ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.accountNum}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.password;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.ip;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.port;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                return `${
                    (row.phase == 1 ? '<span class="btn btn-sm btn-info">PHASE 1</span>' : 
                      (row.phase == 2 ? '<span class="btn btn-sm btn-info">PHASE 2</span>' : 
                        row.phase == 3 ? '<span class="btn btn-sm btn-success">FUNDED</span>' :''
                      )
                    )
                  }`;              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.maxDD;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.maxDL;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.p1profitTarget;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.p2profitTarget;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.equity;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.dbEquity;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.balance;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.dbBalance;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.accountSize;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.maxDDStatus;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.maxDLStatus;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.profitTargetStatus;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.failTimeMaxDD;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.failTimeMaxDL;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.passTimeProfitTarget;
              }
            },


            {
              data: null,
              render: function (data, type, row) {
                  return `${row.message}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.userEndStats}`;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `${row.date}`;
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