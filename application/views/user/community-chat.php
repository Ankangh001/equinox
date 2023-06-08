
<?php
$this->load->view('user/includes/header');
?>


<style>
  .accordion .accordion-item.active {
      box-shadow: none;
  }
</style>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12">
      </div>
      <div class="col-lg-2 pointer">
        &nbsp;&nbsp;&nbsp;<i class="bx bx-refresh"></i>Refresh 
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
        <widgetbot server="299881420891881473" channel="355719584830980096" width="100%" height="600"></widgetbot>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script>

  <script>
  $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Community Chat</h4>`)
</script>
<?php $this->load->view('user/includes/footer');?>