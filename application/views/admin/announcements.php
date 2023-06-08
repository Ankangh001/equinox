<?php
$this->load->view('admin/includes/header');
?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div id="alert" class="alert alert-success alert-dismissible d-none" role="alert">
      Announcement Added Successfully 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-8 mx-auto mt-5">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="menu-icon tf-icons bx bxs-megaphone"></i>Add New Announcement </h5>
            <small class="text-muted float-end">Fill Required Detail</small>
          </div>
          <div class="card-body">
            <form id="add-challenge">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input required type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label" for="desc">Description</label>
                      <input required type="text" id="desc" class="form-control phone-mask" placeholder="Enter description" name="desc">
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label" for="date">Date</label>
                      <input type="text" id="date" name="date" class="form-control phone-mask" readonly value="<?= date('Y-m-d | H:m:s')?>">
                    </div>
                </div>
              </div>
              <button type="submit" class="w-100 btn btn-primary">ADD ANNOUNCEMENT</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="nav-align-top mb-4">
      <div class="col-xl">
        <div class="card">
          <h5 class="card-header">
            All announcements
          </h5>
          <div class="table-responsive text-nowrap p-3">
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Date</th>
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

<?php $this->load->view('admin/includes/footer'); ?>
    

    <script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Add Challenge</h4>`);
  $('#add-challenge').on('submit',(e)=>{
    e.preventDefault();

    // var form = $(this);
    var form = $('#add-challenge').serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/announcements/save'); ?>",
        data: form,
        dataType: "html",
        beforeSend: function(){
          $('body').prepend(`<div id="loading" class="demo-inline-spacing">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`
           );
        },
        success: function(data){
          $('#add-challenge')[0].reset();
          $('#loading').remove();
          $('#alert').removeClass('d-none');
          $('.table').DataTable().destroy();
          loadTable();
          setTimeout(() => {
            $('#alert').fadeOut();
            // $('#alert').addClass('d-none');
          }, 3000);
        },
        error: function() { alert("Error posting feed."); }
    });
  });

  loadTable();
  function loadTable(){
        $('.table').DataTable({
          ajax: "<?php echo base_url('admin/announcements/get'); ?>",
          deferRender: true,
          "pageLength": 100,
          columns:[
            {
              data: null,
              render: function (data, type, row) {
                  return row.title ;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return (row.content).slice(0,50);
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return row.created_at;
              }
            },
            {
              data: null,
              render: function (data, type, row) {
                  return `<div class="d-flex justify-content-start">
                            <a class="text-success" href="#"><i class="bx bx-edit-alt me-1"></i></a>&nbsp;&nbsp;&nbsp;
                            <a class="text-primary" href="#"><i class="bx bx-link-external me-1"></i></a>&nbsp;&nbsp;&nbsp;
                            <a class="text-danger" onclick="delete_product()" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                          </div>`;
              }
            }
          ]
        });
    }

    function delete_product(){

    }
</script>