<?php
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
      <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-xl">
                <div class="card-body">
                  <table class="table hover" id="userTable" style="padding: 2rem 0 0 0;">
                      <thead class="table-light">
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0" >
                      
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-4">
            <div class="col-xl">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table hover" id="creditTable" style="padding: 2rem 0 0 0;">
                    <thead class="table-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Affiliate Amount</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
<?php $this->load->view('admin/includes/footer'); ?>
<script>
  
  let requestData = {};
  
  function showAffiliateUser(id){
      $('#userTable').DataTable().destroy();
      $('#userTable').DataTable({
          ajax: "<?php echo base_url('admin/Affiliate/getAffiliateUserData?affiliate_code='); ?>"+id,
          deferRender: true,
          "pageLength": 100,
          columns:[
            {
              width: '33.3%',
              data: null,
              render: function (data, type, row) {
                  return `${row.first_name + ' ' + row.last_name}` ;
              }
            },
            {
              width: '33.3%',
              data: null,
              render: function (data, type, row) {
                  return `${row.email}`;
              }
            }
          ]
      });
      $('#modalCenter').modal('show');
      // $.ajax({
      //     type: "POST",
      //     url: "<?php echo base_url('admin/Affiliate/getAffiliateUserData'); ?>",
      //     data: requestData,
      //     beforeSend: function(){
      //       $('body').prepend(`<div id="loading" class="demo-inline-spacing">
      //           <div class="spinner-border" role="status">
      //             <span class="visually-hidden">Loading...</span>
      //           </div>
      //         </div>`
      //       );
      //     },
      //     success: function(data){
      //       $('div#loading').hide(200);
      //       $('.modal').modal('hide');
      //       $('#modalCenter').modal('show');
      //       loadTable();
      //       setTimeout(() => {
      //         $('#modalCenter').modal('hide');
      //       }, 8000);
      //     },
      //     error: function() { alert("Error posting feed."); }
      // });
    };
  
  $(document).ready(function () {
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Affiliate Data</h4>`);
  });

  function loadTable(){
    $('#creditTable').DataTable().destroy();
    $('#creditTable').DataTable({
        ajax: "<?php echo base_url('admin/Affiliate/getAffiliateData'); ?>",
        deferRender: true,
        "pageLength": 100,
        columns:[
          {
            width: '33.3%',
            data: null,
            render: function (data, type, row) {
                return `${row.first_name + ' ' + row.last_name}` ;
            }
          },
          {
            width: '33.3%',
            data: null,
            render: function (data, type, row) {
                return `${row.email}`;
            }
          },
          {
            width: '33.3%',
            data: null,
            render: function (data, type, row) {
                return `${row.credit}`;
            }
          },
          {
            data: null,
            render: function (data, type, row) {
                return `<div class="d-flex justify-content-start">
                          <button class=" btn btn-info" onclick="showAffiliateUser('${row.affiliate_code}')">
                            View
                          </button>
                        </div>`
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