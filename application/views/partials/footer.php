<style>
        .badge {
    display: inline-block;
    padding: 2px 7px;
    font-size: 1.25rem;
    font-weight: 700;
    z-index: 999;
    line-height: 1;
    position: absolute;
    right: 0;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 50%;
    top: -20px;
    background: tomato;
}
.cross{
    float:right; color:tomato;
    margin-top:0.2rem;
    cursor:pointer;
}
    </style>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">You have a message from admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="admin-message">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Understood</button>-->
          </div>
        </div>
      </div>
    </div>
    
    
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
          duration: 1500,
        });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js'></script>

    <!--live prices-->
  <?php  if (isset($_SESSION['is_user_login']) && $_SESSION['is_user_login'] == true) { ?>
     <script>
        $(document).ready(function(){
            setInterval(myData ,1000);
            function myData() {
                $.ajax({
                    type:'GET',
                    url:'<?=base_url()?>live',
                    data:{user_id:'me'},
                    success:function(data){
                        if(data){
                            var datas = JSON.parse(data);
                            $('#symbol').text(datas[0].symbol);
                            $('#price').text('$ '+Math.round(datas[0].price, 2));
                            $('#price2').text('$ '+Math.round(datas[1].price, 2));
                            $('#hour').text(datas[0]['1h'].price_change_pct);
                            $('#hour2').text(datas[1]['1h'].price_change_pct);
                            $('#market').text(datas[0].market_cap);
                            $('#volume').text(datas[0]['1h'].volume);
                            $('#showdata').html(data);
                            if(Math.sign(datas[0]['1h'].price_change_pct)==1){
                                $('#sign').html("<svg class='chevron-arrow price-up g' width='22' height='11' viewBox='0 0 22 11'><path d='M0.3,11L11,1l10.7,10 '></path></svg>");
                            }else{
                                $('#sign').html("<svg class='chevron-arrow price-down r' width='22' height='11' viewBox='0 0 22 11'><path d='M21.7,1L11,11L0.3,1'></path></svg>");
                            }
                            if(Math.sign(datas[1]['1h'].price_change_pct)==1){
                                $('#sign2').html("<svg class='chevron-arrow price-up g' width='22' height='11' viewBox='0 0 22 11'><path d='M0.3,11L11,1l10.7,10 '></path></svg>");
                            }else{
                                $('#sign2').html("<svg class='chevron-arrow price-down r' width='22' height='11' viewBox='0 0 22 11'><path d='M21.7,1L11,11L0.3,1'></path></svg>");
                            }
                        } 
                    }
                });
            }
        });
        //admin notification
        $(document).ready(function(){
                $.ajax({
                    type:'GET',
                    url:'<?=base_url()?>messages',
                    data:{user_id:'me'},
                    dataType:"json",
                    
                    success:function(data){
                        if(data){
                            if(data.length>0){
                                $('.badge').html(data.length);
                            }else{
                                $('.badge').css('display', 'none');
                            }
                            var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
                            //console.log(utc);
                            var output = "";
                            for(var i=0; i<data.length; i++){
                               
                                output +=i+1+". "+ data[i].message + "<span id='delmessage' data-msg_id="+data[i].id+"><i class='cross fas fa-times'></i></span><br/><span style='font-size: 0.8rem;color: #908c8c;'>"+utc+"</span><br/><br/>";
                            }
                            
                            $('#admin-message').html( output);
                             
                              $('.float').on('click', function(e){
                                 e.preventDefault();
                                 $('.badge').html('');
                              });
                        } else{
                            $('.badge').html('');
                        }
                    }
                });
        });
        
        $(document).on('click', '#delmessage', function() {
            var id = $(this).attr('id');
            var msg_id = $(this).data('msg_id');
            $.ajax({
                url: "<?php echo base_url(); ?>home/delete_notification",
                method: "POST",
                data: {
                    id: msg_id
                },
                beforeSend: function() {
                    $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    window.location.reload(1);
                }
            })
        });
      
    </script>
<?php } ?>
<!--  <script>     -->


<!--      const copyToClipboard = (str) => {-->
<!--        const ele = document.createElement("input");-->
<!--        ele.value = str;-->
<!--        document.body.appendChild(ele);-->
<!--        ele.select();-->
<!--        document.execCommand("copy");-->
<!--        document.body.removeChild(ele);-->
<!--      }-->
<!--      const handleCopy = () => {-->
<!--        const text = document.getElementById("text-long");-->
<!--        copyToClipboard(text.innerText);-->
<!--      }-->
<!--      document.querySelector("#copy").addEventListener("click", handleCopy);-->
<!--</script>-->

<script>
     $(document).on('click', '#inbox', function() {
                var data =  '<div class="col-md-6" style="padding-left:0; padding-right: 0;">'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">Chat Area</div>'
                    '<div class="panel-body">'+
                        '<div id="chat_header">'+
                            '<h2 align="center" style="margin:0; padding-bottom:16px;"><span id="dynamic_title">Welcome <?php echo $this->session->userdata("username"); ?></span></h2>'+
                        '</div>'+
'                        <div id="chat_body" style="height:406px; overflow-y: scroll;"></div>'
                        '<div id="chat_footer" >'
                            '<hr />'
                            '<div class="form-group">'
                                '<div id="chat_message_area" contenteditable class="form-control"></div>'
                            '</div>'
                            '<div class="form-group" align="right">'
                                '<button type="button" name="send_chat" id="send_chat" class="btn btn-success btn-xs" disabled>Send</button>'
                            '</div> </div> </div> </div> </div>';
                $('#inbox-messages').html(data);
                // $('#inbox-messages').load('http://localhost/bitcoins/application/views/inbox');
            });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>