<style>
    ul.devices-list {
    list-style: none;
    display:flex;
}
ul.devices-list li:hover {
    opacity: 0.5;
    margin: 10px 1rem;
    transition: 0.3s ease-in-out;
}
ul.devices-list li {
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    background: #f7f7f7;
    box-shadow: 0 0 8px #888;
    padding: 2rem;
    width: 50% !important;
    border-radius: 12px;
    margin: 1rem;
    cursor:pointer;
    text-align: center;
}
ul.devices-list li i {
    margin-right: 0.5rem;
    font-size: 1.3rem;
    padding: 6px 10px;
}
.friend-box{
    margin:1.4rem !important;
}

    .before-chat{
        text-align: center;
        margin: 0;
        padding: 6.3rem 0;
        background: #21252908;
    }
    
    .dropbtn {
    background-color: transparent;
    color: white;
    padding: 0;
    margin: 0;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: transparent;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    right: 0;
    transition: 0.3s ease-in-out;
    box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>
<div class='content-layout' style="margin: 0;width: 100%;padding: 0;">
    <div class='row row-cols-1 row-cols-md-3 g-4' style=" width: inherit; margin: 0; ">
        
        <div class='col' style="margin:auto;padding: 0;width:100%;">
            <div   class='my-cards card'>
                <div style="width: 70%;margin: 1rem auto;box-shadow: 0 0 12px #ddd;" id="middle_portion" class=' custom-card card-body'>
                    <ul style="margin: 0 12px !important;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class=" link-size nav-item" role="presentation">
                            <button class="c-links nav-link active link-size " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#address" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Password</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#transaction" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2-factor-Authentication</button>
                        </li>
                        <li class=" link-size nav-item" role="presentation">
                            <button class="c-links nav-link  link-size " id="auth-tab" data-bs-toggle="pill" data-bs-target="#auth" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active Sessions</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-block-tab" data-bs-toggle="pill" data-bs-target="#block" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">BLocked Associates</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <!--Password-->
                        <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="pills-home-tab">
                            <hr style=' margin: 0 0 0.2rem 0;  '>

                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <?php $this->load->view('partials/messages'); ?>
                                    <form method="POST" action="<?=base_url()?>reset-password" class='c-form-control custom-pad2'>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class='form-group  c-form-group'>
                                                    <label class='custom-label2'>Current Password</label>
                                                    <div class='c-flex'>
                                                        <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                                        <input type='password' class='form-control' name="current_pass" placeholder='Current Password' required>
                                                    </div>
                                                </div>
                                                <div class='form-group  c-form-group'>
                                                    <label class='custom-label2'>New Password</label>
                                                    <div class='c-flex'>
                                                        <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                                        <input type='password' class='form-control' name="new_pass" placeholder='New Password' required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class='form-group  c-form-group'>
                                                    <label class='custom-label2'>Confirm New Password</label>
                                                    <div class='c-flex'>
                                                        <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                                        <input type='password' class='form-control' name="cpass" placeholder='Confirm Password' required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <div style='border-bottom: none;' class='form-group c-form-group'>
                                    <input type='submit' name="submit" class='btn btn-primary' value="Change Password">
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>

                        <!--2-factor -->
                        <div  style='padding:0 2rem;' class="tab-pane fade custom-pad" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <h4 style="margin:1.5rem 0; font-weight: 700;margin-top: 2rem;background: #949494; border-radius:12px; padding:1.1rem;width: 52%; color: #fff !important;">
                                Protect your account with 2-factor Authentication<br/><br/>
                                <span style=" font-size: 1.1rem; font-weight: 500; margin: 1rem 0; ">
                                    Every login to your account will require a unique code generated in an authenticator app. Please note that 2FA will be setup in All your apps. 
                                </span><br/> <br/><i style='padding: 6px 12px;font-size: 1.2rem;color: #b70000;border: 2px solid #b70000;' class='fas fa-exclamation form-u-name'></i>
                                Please read <a href="" style="text-decoration:underline; color:#fff;">2-factor authentication guide</a>
                            </h4>
                            <div class="d-flex">
                                <img width="50" src="<?=base_url('assets')?>/images/google-authenticator-2.svg">
                                <div>
                                   <p style=" margin-left: 1.2rem; font-size: 1.2rem; font-weight: 500; color: #333030; ">You can use any authenticator app e.g Google Authenticator.</p>
                                    <p class="d-flex"><a style="margin-left: 1.2rem;  font-size: 1.2rem; font-weight: 500; color:#064ab1 !important; text-decoration:underline;" target="blank"  href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">
                                 Google Play</a>
                                 <a style="margin-left: 1.2rem;  font-size: 1.2rem; font-weight: 500; color:#064ab1 !important; text-decoration:underline;" target="blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">
                                 Appstore</a></p>
                                </div>
                            </div>
                            <form method="POST" id="fupForm">
                            <div class='form-group  c-form-group'>
                                <div class='c-flex'>
                                    <input style="margin-top: 0.4rem;" value='1' id="two_step_verification" name="two_step_verification" type="checkbox">
                                    <p class='custom-label2 c-term'>
                                        <span class='custom-label2' style="margin:0;">Enable 2fa</span>
                                        <br />
                                        Click to enable two factor authntication.
                                    </p>
                                </div>
                            </div>
                             <button style=" margin-top: 1.2rem;" type='submit' class='btn btn-primary submitBtn' >
                                 Continue
                             </button>
                          </form> 
                        </div>
                        <?php
                            if($row['two_step_verification']=='1'){
                                echo "<script>document.getElementById('two_step_verification').checked = true;</script>";
                            }
                        ?>
                        <!--Active session -->
                        <div style=' padding:0 2rem;height: 100%;' class="tab-pane fade custom-pad" id="auth" role="tabpanel" aria-labelledby="auth-tab">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <h4 style="text-align:center; margin:2rem;text-align:left">Devices from which you have recently logged in:</h4>
                            <ul class="devices-list">
                                <?php foreach($active as $row): ?>
                                <li>
                                    <i style='margin-right: 0.5rem;' class='fas fa-mobile-alt form-u-name'></i><br/><?=@$row['os']?>
                                    <br/><?=@$row['device']?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                       

                        <!--Blocked User -->
                        <div style=' padding:0 2rem;height: 100%;' class="tab-pane fade custom-pad" id="block" role="tabpanel" aria-labelledby="pills-block-tab">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <div style="margin:auto ;text-align: center;">
                                <div id="blocked"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
<link href="<?=base_url()?>assets/toastr.css" rel="stylesheet"/>
<script src="<?=base_url()?>assets/toastr.js"></script>
<?php
    if(@$successful){
        echo "
            <script>
            window.alert('".@$successful."');
            window.location.href= '".base_url("logout")."';
            </script>";
    }
?>

<script>
$(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST', 
            url: '<?=base_url("update-two-step")?>',
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
                // $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    toastr.info(response.message);
                }else{
                    toastr.info(response.message);
                    toastr.info(response.errors.errors);
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
        $(document).ready(function() {

            function loading() {
                var output = '<div align="center"><br /><br /><br />';
                output += '<img width=50% src="<?php echo base_url(); ?>assets/images/loading.gif" /></div>';
                return output;
            }
            
            load_notification();

            function load_notification() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>chat/load_blocked_user",
                        method: "POST",
                        data: {
                            action: 'load_notification'
                        },
                        dataType: "json",
                        beforeSend: function() {
                            $('#blocked').html(loading());
                        },
                        success: function(data) {
                            //console.log(data);
                            var output = '';
                            if (data != null && data.length > 0) {
                                for (var count = 0; count < data.length; count++) {
                                    output += '<div><div class="friend-box">' +
                                            '<div class="friend-profile" style="background-image:url(<?= base_url() ?>' + data[count].profile_picture + ');"></div>' +
                                            '<div style=" padding: 1rem 0 0 5rem; ">You have blocked <span clsss="name-box">' + data[count].name + '</span></div>' +
                                            '<div class="user-name-box">' + data[count].email +'</div>' +
                                            '<div class="request-btn-row" data-username="' + data[count].email +'">' +
                                            '<button type="button" name="accept_button" class="friend-request accept-request accept_button" data-username="' + data[count].email +'" id="accept_button' +
                                            data[count].user_id + '" data-blocked_id="' + data[count].blocked_id + '">Unblock</button>' +
                                            // '<button type="button" name="decline_button" class="friend-request decline-request decline_button" data-username="' + data[count].email +'" id="decline_button' +
                                            // data[count].user_id + '" data-chat_request_id="' + data[count].blocked_id + '">Delete</button>' +
                                            '</div></div>';
                                }
                            } else {
                                output += '<div align="center"><b style="margin:2rem 0;">Currenty You don\'t have any blocked associate</b></div>';
                            }
                            output += '';
                               $('#blocked').html(output);
                        }
                    })
                }

            $(document).on('click', '.accept_button', function() {
                var id = $(this).attr('id');
                var blocked_id = $(this).data('blocked_id');
                console.log(blocked_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/unblock_user",
                    method: "POST",
                    data: {
                        blocked_id: blocked_id
                    },
                    beforeSend: function() {
                        $('#' + id).attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        // console.log(data);
                        // toastr.info(data);
                        // $('#' + id).attr('disabled', false);
                        $('#' + id).removeClass('btn-success');
                        $('#' + id).addClass('btn-warning');
                        $('#' + id).text('Unblocked');
                        setTimeout(function(){ window.location.reload(1); }, 1000);
                    }
                })
            });
    
            $(document).on('click', '.decline_button', function() {
                var id = $(this).attr('id');
                var chat_request_id = $(this).data('chat_request_id');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/delete_request",
                    method: "POST",
                    data: {
                        chat_request_id: chat_request_id
                    },
                    beforeSend: function() {
                        $('#' + id).attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        toastr.info(data);
                        $('#' + id).attr('disabled', false);
                        $('#' + id).removeClass('btn-success');
                        $('#' + id).addClass('btn-warning');
                        $('#' + id).text('Declined');
                    }
                })
            });

        });
</script>