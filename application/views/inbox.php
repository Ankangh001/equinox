<style>
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


#block, #unfriend {
    font-size: 1rem;
    font-weight: 600;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    cursor: pointer;
}

#block:hover,#unfriend:hover {background-color: #ddd}

.show {display:block;}
</style>

<div class='content-layout'>
    <div class='row row-cols-1 row-cols-md-3 g-4'>
        <!--users lists-->
        <div style="height:100vh; overflow:auto" class='col c1'>
            <div class='my-cards card'>

                <div class='custom-card card-body'>
                    <h5 class='card-title text-center'>Associates</h5>
                    <hr style=' margin: 0.7rem 0 1rem 0; '>
                    <div class='custom-pad form-group has-search'>
                        <span class='fa fa-search form-control-feedback'></span>
                        <input style='font-size: 0.9rem;' id="search_associate" type='text' class='form-control' placeholder='Enter Associates name...'>
                    </div>
                    <hr style="margin-bottom: 0;">

                    <div style=" margin: 0 !important; " class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!--<div id="search_user_area"></div>-->
                        <div id="chat_user_area"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:100vh;" class='col c2'>
            <div class='my-cards card'>
                <div style=" padding: 0.5rem 0; " class=' custom-card card-body'>
                    <ul style="margin: 0 12px !important;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class=" link-size nav-item" role="presentation">
                            <button class="c-links nav-link active link-size " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#address" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Conversation</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#transaction" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Send Request</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#confirmation" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">View Request</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!--Conversation-->
                        <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="pills-home-tab" >
                            <hr style=' margin: 0 0 0.2rem 0;  '>

                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="before-chat">
                                        <img style=" border-radius: 50%; margin-bottom: 3rem; padding: 1rem; box-shadow: 0 0 10px #bbbbbb; " width="35%" src="<?=base_url('assets')?>/images/chat.png">
                                        <h2>Welcome to <span style="font-family:'Caveat', cursive;">Addressme</span></h2>
                                        <p>Click on an associate to start a conversation</p>
                                    </div>
                                    <!-- chatttt -->
                                    <div class="row" id="chat_portion">
                                        <section class="msger">
                                            <header class="msger-header">
                                                <div class="msger-header-title d-flex">
                                                    <div class="msg-img" id="dynamic_image" style="background-image: url(<?= base_url('assets') ?>/images/u1.png)"></div>
                                                    <p class="chat-name"><span id="dynamic_title"></span><br /><span class="user-chat-staus" id="dynamic_status"></span>|<span class="user-profile-staus" id="dynamic_verified"></span></p>
                                                </div>
                                                <div class="msger-header-options dropdown">
                                                    <button onclick="myFunction()" class="dropbtn"><i style="color:#444;font-size: 1.51rem;margin: 1rem;" class="dropbtn fas fa-ellipsis-v"></i></button>
                                                    
                                                    
                                                  <div id="myDropdown" class="dropdown-content">
                                                    <div onClick="window.location.reload();" id="block" style="color:#8a1d1d" >Block</div>
                                                    <div onClick="window.location.reload();" id="unfriend">Unfriend</div>
                                                  </div>
                                                </div>
                                            </header>
                                            <div id="chat_body" class="msger-chat"> </div>
                                            <form class="msger-inputarea">
                                                <div id="chat_message_area" contenteditable class="msger-input"></div>
                                                <button type="button" name="send_chat" id="send_chat" class="msger-send-btn" disabled>Send</button>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Send request-->
                        <div class="tab-pane fade custom-pad" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <hr style=' margin: 0 0 1rem 0;  '>
                                <form class=' c-form-control custom-pad2'>
                                    <div class='form-group  c-form-group'>
                                        <label class='custom-label2'>Enter associate email:</label>
                                        <div class='c-flex'>
                                            <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                            <input style='font-size: 0.9rem;' id="search_user" type='text' class='form-control' placeholder='Enter Associates name...'>
                                        </div>
                                    </div>
                                    <!--<div style='border-bottom: none;' class='form-group c-form-group'>-->
                                    <!--    <button type='submit' class='btn btn-primary'>Search Now</button>-->
                                    <!--</div>-->
                                </form>
                                <div id="search_user_area"></div>
                        </div>
                            <!--view request-->
                        <div class="tab-pane fade custom-pad notification_area" id="confirmation" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:100vh; overflow:auto" class='col c3'>
            <div style='border: none;' class='my-cards card'>

                <div style='padding-top: 0.5rem;' class=' custom-card card-body'>
                    <form method='POST'>
                        <div style='padding-bottom: 0.5rem;' class='custom-pad form-group has-search'>
                            <span class='fa fa-search form-control-feedback'></span>
                            <input type='text' id='search' name='search' class='form-control' placeholder='Enter Wallet Address'>
                        </div>
                    </form>

                    <hr style='margin: 0; height:12px; background:#bdbdbd'>
                    <h5 class='custom-pad' style='font-size: 1rem; padding-top:1rem'>Wallet Address search summary</h5>
                    <hr>
                    <h5 class='custom-pad' style='font-size: 1rem;'>
                        <?php
                        $query = '';
                        $user_wallet = "bc1qk8u9u92e7t0qp3nggg05rdr3ed9fqk2uqv4rwn";
                        if (isset($_POST['search'])) {
                            $query = $_POST['search'];
                            echo $query . "<i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i>";
                        } else {
                            echo "Paste Your wallet address above to search for transaction
                                    ";
                        }

                        ?></h5>

                    <!-- transaction details -->
                    <?php

                    $url = "https://api.blockcypher.com/v1/btc/main/addrs/" . $query . "/full";
                    $curl = curl_init();
                    $apiKey = "42ffd41960db43c08d34277de19d0df5";

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: ' . $apiKey,
                            "cache-control: no-cache"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    curl_close($curl);
                    $response = json_decode($response, true);



                    if ($response) { ?>

                        <h3 class='custom-pad' style='font-size: 1.4rem; color: #797979; padding-top: 2.2rem;'>Account<br /><span style='font-size: 1.2rem;'>Details</span></h3>

                        <table>
                            <tbody>
                                <!-- <tr>
                                        <td  style="padding: 0 1.2rem 0 0;">Address</td>
                                        <td id="text-long"><?= @$response['address'] ?><i id="copy" style="margin-left: 1.2rem;" class="fas fa-clone"></i></td>
                                    </tr> -->
                                <tr>
                                    <td style="padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;">Transactions</td>
                                    <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= @$response['n_tx'] ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;">Total Received</td>
                                    <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= @$response['total_received'] / 100000000 ?>BTC</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;">Total Sent</td>
                                    <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= @$response['total_sent'] / 100000000 ?>BTC</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;">Final Balance</td>
                                    <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= @$response['final_balance'] / 100000000 ?>BTC</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="custom-pad" style="font-size: 1.4rem; color: #797979; padding-top: 2.2rem;">TRANSACTIONS</h3>
                        <?php foreach (array_slice($response['txs'], 0, 1) as $txn) : ?>
                            <table class="custom-pad">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0 1.2rem 0 0;border: none;color: #8c8b8b;">Hash</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ; float: right; font-size: 12px;padding-bottom: 1rem;  color: #8c8b8b;" id="text-long"><?= $txn['hash'] ?> <i id="copy" style="margin-left: 1.2rem;" class="fas fa-clone"></i></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Fees</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= $txn['fees'] / 100000000 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Confirmed Date</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= substr($txn['confirmed'], 0, 10)  ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Confirmed Time</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;"><?= substr($txn['confirmed'], 11)  ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Received Date</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;"><?= substr($txn['received'], 0, 10)  ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Received Time</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= substr($txn['received'], 11, 18)  ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Size</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;"><?= $txn['size'] ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;">Included in Block</td>
                                        <td style="padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;"><?= @$txn['block_height'] ?></td>
                                    </tr>

                                </tbody>

                            </table>
                            <p style="text-align: center;"><button type="button" name="show-more" class="custom-btn">Show More >></button></p>


                    <?php
                        //  if(isset($_POST['show-more'])){
                        //      echo "sgddfg";

                        //  }
                        endforeach;
                    }
                    // }
                    ?>

                </div>

            </div>

        </div>
    </div>
    
<link href="<?=base_url()?>assets/toastr.css" rel="stylesheet"/>
<script src="<?=base_url()?>assets/toastr.js"></script>
    <script>
        $(document).ready(function() {
            $('#chat_portion').css('display', 'none');

            function loading() {
                var output = '<div align="center"><br /><br /><br />';
                output += '<img width=50% src="<?php echo base_url(); ?>assets/images/loading.gif" /></div>';
                return output;
            }
            //search Address
            $(document).on('keyup', '#search_address', function() {
                var search_query = $.trim($('#searchAddress').val());
                $('#search_address_area').html('');
                if (search_query != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>home/search_address",
                        method: "POST",
                        data: {
                            search_query: search_query
                        },
                        // dataType:"json",
                        beforeSend: function() {
                            $('#search_address_area').html(loading());
                            $('#search_address').attr('disabled', 'disabled');
                        },
                        success: function(data) {
                            //console.log(data);
                            $('#search_address').attr('disabled', false);
                            $('#search_address_area').html(data);
                            $('#searchAddress').val('');
                        }
                    })
                }
            });

            //search user
            $(document).on('keyup', '#search_user', function() {
                var search_query = $.trim($('#search_user').val());
                $('#search_user_area').html('');
                if (search_query != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>chat/search_user",
                        method: "POST",
                        data: {
                            search_query: search_query
                        },
                        dataType: "json",
                        beforeSend: function() {
                            $('#search_user_area').html(loading());
                        },
                        success: function(data) {
                            var output = '<ul class="custom-pad custom-list">';
                            var send_userid = "<?php echo $this->session->userdata('user_id'); ?>";
                            if (data.length > 0) {
                                for (var count = 0; count < data.length; count++) {
                                    output += '<li style="display: inline-flex; margin-left:1.2rem;"><img style="width:26%; height:50px; border-radius:50%;" src="<?= base_url() ?>' + data[count].profile_picture + '" class="img-circle custom-width mr-5"/> <p class="u-name"><small>' + data[count].name + '<br/><span class="u-status">Online<i style="margin-left: 0.5rem;" class="fas fa-check"></i></span><br/></small></p>';
                                    if (data[count].is_request_send == 'yes') {
                                        output += '<div style=" float: right; width: 10%; " class="col-md-5"><button style="padding: 2px 9px;margin: 22px 0 0 10px;" type="button" name="request_button" class="btn btn-warning btn-xs"><i class="fas fa-check"></i></button></div>';
                                    } else {
                                        output += '<div style=" float: right; width: 10%; " class="col-md-5"><button style="padding: 2px 9px;margin: 22px 0 0 10px;" type="button" name="request_button" class="btn btn-success btn-xs request_button" id="request_button' + data[count].user_id + '" data-receiver_userid="' + data[count].user_id + '" data-send_userid="' + send_userid + '"><i style="font-size: 1.5rem;" class="fas fa-user-plus"></i></button></div>';
                                    }
                                    output += '</li>';
                                }
                            } else {
                                output += '<div align="center"><b>No one found with that name</b></div>';
                            }
                            output += '</div>';
                            $('#search_user_area').html(output);
                        }
                    })
                }
            });
            //request
            $(document).on('click', '.request_button', function() {
                $('#' + id).attr('disabled', 'disabled');
                var id = $(this).attr('id');
                var receiver_userid = $(this).data('receiver_userid');
                var send_userid = $(this).data('send_userid');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/send_request",
                    method: "POST",
                    data: {
                        receiver_userid: receiver_userid,
                        send_userid: send_userid
                    },
                    beforeSend: function() {
                        $('#' + id).attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        $('#' + id).attr('disabled', true);
                        $('#' + id).removeClass('btn-success');
                        $('#' + id).addClass('btn-warning');
                         $('#' + id).html('<i class="fas fa-check"><i>');
                    }
                })
            })

            load_notification();

            function load_notification() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>chat/load_notification",
                        method: "POST",
                        data: {
                            action: 'load_notification'
                        },
                        dataType: "json",
                        beforeSend: function() {
                            $('.notification_area').html(loading());
                        },
                        success: function(data) {
        
                            var output = '';
                            if (data.length > 0) {
                                for (var count = 0; count < data.length; count++) {
                                    if(data[count].chat_type == 'chat'){
                                        output += '<div><div class="friend-box">' +
                                            '<div class="friend-profile" style="background-image:url(<?= base_url() ?>' + data[count].profile_picture + ');"></div>' +
                                            '<div class="name-box">' + data[count].name + '</div>' +
                                            '<div class="user-name-box">' + data[count].email + ' sent you a ' + data[count].chat_type + ' request.</div>' +
                                            '<div class="request-btn-row" data-username="blueleopard306">' +
                                            '<button onClick="window.location.reload();" type="button" name="accept_button" class="friend-request accept-request accept_button" data-username="blueleopard306" id="accept_button' +
                                                data[count].user_id + '" data-chat_request_id="' + data[count].chat_request_id + '">Accept</button>' +
                                            '<button type="button" name="decline_button" class="friend-request decline-request decline_button" data-username="blueleopard306" id="decline_button' +
                                                data[count].user_id + '" data-chat_request_id="' + data[count].chat_request_id + '">Decline</button>' +
                                            '</div></div>';
                                    }
                                }
                            } else {
                                output += '<div style="margin:1.2rem; color:bfbfbf;" align="center">Currently you don\'t have any associate request.</div>';
                            }
                            output += '';
                                $('.notification_area').html(output);
                        }
                    })
                }

            $(document).on('click', '.accept_button', function() {
                var id = $(this).attr('id');
                var chat_request_id = $(this).data('chat_request_id');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/accept_request",
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
                        $('#' + id).text('Accepted');
                    }
                })
            });
    
            $(document).on('click', '.decline_button', function() {
                var id = $(this).attr('id');
                $('#' + id).attr('disabled', 'disabled');
                var chat_request_id = $(this).data('chat_request_id');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/decline_request",
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
                        window.location.reload();
                    }
                })
            });

            load_chat_user();

            function load_chat_user() {
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/load_chat_user",
                    method: "POST",
                    data: {
                        action: 'load_chat_user'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#chat_user_area').html(loading());
                    },
                    success: function(data) {
                        console.log(data);
                        var output = '<div class="custom-list">';
                            if (data != null && data.length > 0) {
                                var receiver_id_array = '';
                                for (var count = 0; count < data.length; count++) {
                                    if(data[count].name){
                                            var onlineStatus =  data[count].statuss;
                                            if(onlineStatus == 0){
                                                onlineStatus = 'Offline';
                                            }else{
                                                onlineStatus = 'Online';
                                            }if(data[count].verified == 0){
                                                verified = 'Not Verified';
                                            }else{
                                                verified = 'Verified';
                                            }
                                        output += '<a href="javascript:void(0)" style="margin: 0;padding: 0.5rem 1rem !important;border:none !important;" class="list-group-item d-flex user_chat_list chat-hover" data-receiver_id="' + data[count].receiver_id + '"  data-status="' + onlineStatus + '" data-verified="' + verified + '" data-receiver_name="' + data[count].name + '" data-chat_request_id="' + data[count].chat_request_id + '">';
        
                                        output += '<p style="display: inline-flex;" class="u-name"> <img style="border-radius:50%" src="<?= base_url() ?>' + data[count].profile_picture + '" class="custom-width2 mr-5 u-img'+data[count].receiver_id+'" />' + data[count].name + '&nbsp<br><span class="u-status">' +onlineStatus+ '<i style="margin-left: 0.5rem;" class="fas fa-check"></i></span></p>';
                                      
                                        output += '&nbsp;<span  id="chat_notification_' + data[count].receiver_id + '"></span>';
    
                                        output += '&nbsp;<span id="type_notifitcation_' + data[count].receiver_id + '"></span>';
        
                                        output += ' <i class="offline" id="online_status_' + data[count].receiver_id + '" style="float:right;">&nbsp;</i></a>';
                                        receiver_id_array += data[count].receiver_id + ',';
                                    }
                                }
                                $('#hidden_receiver_id_array').val(receiver_id_array);
                            } else {
                                output += '<div style="margin:1.2rem; color:bfbfbf;" align="center">Currently you don\'t have any associate, please send request to add them.</div>';
                            }
                        output += '</div>';
                        $('#chat_user_area').html(output);
                    }
                })
            }

            var receiver_id;

            $(document).on('click', '.user_chat_list', function() {
                $('.before-chat').css('display', 'none');
                $('#chat_portion').css('display', 'block');
                $('#send_chat').attr('disabled', false);
                receiver_id = $(this).data('receiver_id');
                chat_request_id = $(this).data('chat_request_id');
                verified = $(this).data('verified');
                status = $(this).data('status');
                var str = $(this).data('receiver_name');
                 var src = $('.u-img'+receiver_id).attr("src");
                $('#dynamic_title').text(str);
                $('#dynamic_status').text(status);
                $('#dynamic_verified').text(verified);
                $('#block').attr('data-chat_request_id',chat_request_id);
                $('#unfriend').attr('data-chat_request_id',chat_request_id);
                $('#block').attr('data-receiver_id',receiver_id);
                $('#unfriend').attr('data-receiver_id',receiver_id);
                 $('#dynamic_image').css("background-image", "url(" + src + ")");
                load_chat_data(receiver_id, 'yes');
            });
            
            //block
            $(document).on('click', '#block', function() {
                var id = $(this).attr('id');
                var chat_request_id = $(this).data('chat_request_id');
                var receiver_id = $(this).data('receiver_id');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/block_user",
                    method: "POST",
                    data: {
                        chat_request_id: chat_request_id,
                        receiver_id:receiver_id
                    },
                    success: function(data) {
                        toastr.info(data);
                         location.reload();
                    }
                })
            });

            //unfriend
            $(document).on('click', '#unfriend', function() {
                var id = $(this).attr('id');
                var chat_request_id = $(this).data('chat_request_id');
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/decline_request",
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

            $(document).on('click', '#send_chat', function() {
                var chat_message = $.trim($('#chat_message_area').html());
                if (chat_message != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>chat/send_chat",
                        method: "POST",
                        data: {
                            receiver_id: receiver_id,
                            chat_message: chat_message
                        },
                        beforeSend: function() {
                            $('#send_chat').attr('disabled', 'disabled');
                        },
                        success: function(data) {
                            $('#send_chat').attr('disabled', false);
                            $('#chat_message_area').html('');
                            // var html = '<div class="col-md-10 alert alert-warning">';
                            // html += chat_message;
                            // html += '</div>';
                            // $('#chat_body').append(html);
                            // $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);

                            var html = '<div class="msg right-msg">' +
                                            '<div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u1.png)"></div>' +
                                            '<div class="msg-bubble">' +
                                            '<div class="msg-info">' +
                                            '<div class="msg-info-name">Cindy Pathra</div>' +
                                            '<div class="msg-info-time">12:46</div>' +
                                            '</div>' +
                                            '<div class="msg-text">' + chat_message + '</div>' +
                                            '</div>' +
                                        '</div>';

                            $('#chat_body').append(html);
                            $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);

                        }
                    });
                } else {
                    alert('Type Something in chat box');
                }
            });

            function load_chat_data(receiver_id, update_data) {
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/load_chat_data",
                    method: "POST",
                    data: {
                        receiver_id: receiver_id,
                        update_data: update_data
                    },
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if(data){
                            for (var count = 0; count < data.length; count++) {
                                if (data[count].message_direction == 'right') {
                                        html += '<div class="msg right-msg"><div class="msg-img" style="background-image: url(<?= base_url(@$_SESSION["user_image"]) ?>)"></div>' +
                                                '<div class="msg-bubble">' +
                                                '<div class="msg-info">' +
                                                '<div class="msg-info-time">' +data[count].chat_messages_datetime +'</div>' +
                                                '</div>';
                                }else{
                                    html +=     '<div class="msg left-msg"><div class="msg-img" style="background-image: url(<?= base_url() ?>'+data[count].sender_image +')"></div>' +
                                                '<div class="msg-bubble">' +
                                                '<div class="msg-info">' +
                                                '<div class="msg-info-time">' +data[count].chat_messages_datetime +'</div>' +
                                                '</div>';
                                }
                                html+= '<div class="msg-text">' +data[count].chat_messages_text + '</div>' +
                                        '</div>' +
                                    '</div>';
                            }
                        }else{
                            html+= 'Write something to start the conversation';
                        }

                        $('#chat_body').html(html);
                        $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);
                    }
                })
            }

            setInterval(function() {
                if (receiver_id > 0) {
                    load_chat_data(receiver_id, 'yes');
                }
                check_chat_notification(receiver_id);
            }, 5000);

            function check_chat_notification(receiver_id) {
                var user_id_array = $('#hidden_receiver_id_array').val();
                var is_type = 'no';
                if (receiver_id > 0) {
                    if ($.trim($('#chat_message_area').text()) != '') {
                        is_type = 'yes';
                    }
                }
                $.ajax({
                    url: "<?php echo base_url(); ?>chat/check_chat_notification",
                    method: "POST",
                    data: {
                        user_id_array: user_id_array,
                        is_type: is_type,
                        receiver_id: receiver_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.length > 0) {
                            for (var count = 0; count < data.length; count++) {
                                var html = '';
                                if (data[count].total_notification > 0) {
                                    if (data[count].user_id != receiver_id) {
                                        html = '<span class="notification_circle">' + data[count].total_notification + '</span>';
                                    }
                                }
                                if (data[count].status == 'online') {
                                    //console.log('online_status_' + data[count].user_id);
                                    $('#online_status_' + data[count].user_id).addClass('online');
                                    $('#online_status_' + data[count].user_id).removeClass('offline');
                                    
                                    if (data[count].is_type == 'yes') {
                                        $('#type_notifitcation_' + data[count].user_id).html('<i><small>Typing</small></i>');
                                    } else {
                                        $('#type_notifitcation_' + data[count].user_id).html('');
                                    }
                                } else {
                                    $('#online_status_' + data[count].user_id).addClass('offline');

                                    $('#online_status_' + data[count].user_id).removeClass('online');

                                    $('#type_notifitcation_' + data[count].user_id).html('');
                                }

                                $('#chat_notification_' + data[count].user_id).html(html);
                            }
                        }
                    }
                })
            }
        });
        
        
//         var _hmt = _hmt || [];
// (function() {
// var hm = document.createElement("script");
// hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
// var s = document.getElementsByTagName("script")[0];
// s.parentNode.insertBefore(hm, s);
// })();
</script>
</head>
<body>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">...</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

$(document).ready(function(){
  $("#search_associate").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".user_chat_list p").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
    