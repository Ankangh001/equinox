$(document).ready(function() {
        
        function base_url() {
            var pathparts = location.pathname.split('/');
            if (location.host == 'localhost') {
                var surl = location.origin+'/'+pathparts[1].trim('/')+'/';
            }else{
                var surl = location.origin;
            }
            return surl;
        }
        
        var surl = base_url();
       // console.log(surl);
        $('#chat_portion').css('display', 'none');

        function loading() {
                var output = '<div align="center"><br /><br /><br />';
                output += '<img width=50% src="/assets/images/loading.gif" /></div>';
                return output;
        }
                //search Address
        $(document).on('click', '#search_address', function() {
            var search_query = $.trim($('#searchAddress').val());
            $('#search_address_area').html('');
            if (search_query != '') {
                $.ajax({
                    url: "/home/search_address",
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
                        console.log(data);
                        $('#search_address').attr('disabled', false);
                        $('#search_address_area').html(data);
                        $('#searchAddress').val('');
                    }
                })
            }
        });

        //search user
        $(document).on('click', '#search_user_button', function() {
            var search_query = $.trim($('#search_user').val());
            $('#search_user_area').html('');
            if (search_query != '') {
                $.ajax({
                    url: surl+"/chat/search_user",
                    method: "POST",
                    data: {
                        search_query: search_query
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#search_user_area').html(loading());
                        $('#search_user_button').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        $('#search_user_button').attr('disabled', false);
                        $('#search_user').val('');
                        var output = '<hr /> <ul class="custom-pad custom-list">';
                        var send_userid = "<?php echo $this->session->userdata('user_id'); ?>";
                        if (data.length > 0) {
                            for (var count = 0; count < data.length; count++) {
                                output += '<li style="display: inline-flex;"><img src="'+surl+'/' + data[count].profile_picture + '" class="img-circle custom-width mr-5"/> <p class="u-name"><small>' + data[count].name + '<br/><span class="u-status">Online<i style="margin-left: 0.5rem;" class="fas fa-check"></i></span><br/></small></p>';
                                if (data[count].is_request_send == 'yes') {
                                    output += '<div class="col-md-5"><button type="button" name="request_button" class="btn btn-warning btn-xs">Request Sended</button></div>';
                                } else {
                                    output += '<div class="col-md-5"><button type="button" name="request_button" class="btn btn-success btn-xs request_button" id="request_button' + data[count].user_id + '" data-receiver_userid="' + data[count].user_id + '" data-send_userid="' + send_userid + '">Send Request</button></div>';
                                }
                                output += '</li></ul>';
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

        $(document).on('click', '.request_button', function() {
            var id = $(this).attr('id');
            var receiver_userid = $(this).data('receiver_userid');
            var send_userid = $(this).data('send_userid');
            $.ajax({
                url: surl+"/chat/send_request",
                method: "POST",
                data: {
                    receiver_userid: receiver_userid,
                    send_userid: send_userid
                },
                beforeSend: function() {
                    $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-warning');
                    $('#' + id).text('Request Sended');
                }
            })
        })

        load_notification();

        function load_notification() {
            $.ajax({
                url: surl+"/chat/load_notification",
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
                            output += '<div><div class="friend-box">' +
                                '<div class="friend-profile" style="background-image:url('+surl+'/'+ data[count].profile_picture + ');"></div>' +
                                '<div class="name-box">' + data[count].name + '</div>' +
                                '<div class="user-name-box">@blueleopard306 sent you a ' + data[count].chat_type + ' request.</div>' +
                                '<div class="request-btn-row" data-username="blueleopard306">' +
                                '<button type="button" name="accept_button" class="friend-request accept-request accept_button" data-username="blueleopard306" id="accept_button' +
                                data[count].user_id + '" data-chat_request_id="' + data[count].chat_request_id + '">Accept</button>' +
                                '<button type="button" name="decline_button" class="friend-request decline-request decline_button" data-username="blueleopard306" id="decline_button' +
                                data[count].user_id + '" data-chat_request_id="' + data[count].chat_request_id + '">Decline</button>' +
                                '</div></div>';

                            // output +=   '<div class="col-md-5">'+
                            //     '<button type="button" name="accept_button" class="btn btn-success btn-xs accept_button" id="accept_button'
                            //     + data[count].user_id + '" data-chat_request_id="' + data[count].chat_request_id + '">Accept</button>'+
                            // '</div>';
                        }


                    } else {
                        output += '<div align="center"><b>No Data Found</b></div>';
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
                url: surl+"/chat/accept_request",
                method: "POST",
                data: {
                    chat_request_id: chat_request_id
                },
                beforeSend: function() {
                    $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-warning');
                    $('#' + id).text('Accepted');
                }
            })
        });


        $(document).on('click', '.decline_button', function() {
            var id = $(this).attr('id');
            var chat_request_id = $(this).data('chat_request_id');
            $.ajax({
                url: surl+"/chat/decline_request",
                method: "POST",
                data: {
                    chat_request_id: chat_request_id
                },
                beforeSend: function() {
                    $('#' + id).attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#' + id).attr('disabled', false);
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-warning');
                    $('#' + id).text('Declined');
                }
            })
        });


        load_chat_user();

        function load_chat_user() {
            $.ajax({
                url: surl+"/chat/load_chat_user",
                method: "POST",
                data: {
                    action: 'load_chat_user'
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#chat_user_area').html(loading());
                },
                success: function(data) {
                    var output = '<div class="custom-list">';
                    if (data.length > 0) {
                        var receiver_id_array = '';
                        for (var count = 0; count < data.length; count++) {
                            
                            var onlineStatus =  data[count].statuss;
                            if(onlineStatus == 0){
                                onlineStatus = 'Offline';
                            }else{
                                onlineStatus = 'Online';
                            }
                            output += '<a href="javascript:void(0)" style="margin: 0;padding: 0.5rem 1rem !important;border:none !important;" class="list-group-item d-flex user_chat_list chat-hover" data-receiver_id="' + data[count].receiver_id + '">';

                            output += '<img src="'+surl+'/' + data[count].profile_picture + '" class="custom-width2 mr-5" />';

                            output += '<p class="u-name"> ' + data[count].name + '<br><span class="u-status">' + onlineStatus + '<i style="margin-left: 0.5rem;" class="fas fa-check"></i></span></p>';

                            output += '&nbsp;<span id="chat_notification_' + data[count].receiver_id + '"></span>';

                            output += '&nbsp;<span id="type_notifitcation_' + data[count].receiver_id + '"></span>';

                            output += ' <i class="offline" id="online_status_' + data[count].receiver_id + '" style="float:right;">&nbsp;</i></a>';

                            receiver_id_array += data[count].receiver_id + ',';
                        }

                       

                        $('#hidden_receiver_id_array').val(receiver_id_array);
                    } else {
                        output += '<div align="center"><b>No Data Found</b></div>';
                    }
                    output += '</div>';

                    $('#chat_user_area').html(output);
                }
            })
        }

        var receiver_id;

        $(document).on('click', '.user_chat_list', function() {
                $('#middle_portion').css('display', 'none');
                $('#chat_portion').css('display', 'block');
                $('#send_chat').attr('disabled', false);
                receiver_id = $(this).data('receiver_id');
                var str = $(this).text();
                 var src = $('.u-img'+receiver_id).attr("src");
//                 console.log(src);
                var myString = str.trim();
                myString.substring(1, myString.lastIndexOf(" "));
                //console.log(myString);
                $('#dynamic_title').text(myString);
                 $('#dynamic_image').css("background-image", "url(" + src + ")");
                load_chat_data(receiver_id, 'yes');
            });

        $(document).on('click', '#send_chat', function() {
                var chat_message = $.trim($('#chat_message_area').html());
                if (chat_message != '') {
                    $.ajax({
                        url: surl+"/chat/send_chat",
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

                            var html = '<div class="msg right-msg">' +
                                            '<div class="msg-img" style="background-image: url('+surl+'/assets/images/u1.png)"></div>' +
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
                url: surl+"/chat/load_chat_data",
                method: "POST",
                data: {
                    receiver_id: receiver_id,
                    update_data: update_data
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    
                    for (var count = 0; count < data.length; count++) {
                        if (data[count].message_direction == 'right') {
                                html +=     '<div class="msg right-msg"><div class="msg-img" style="background-image: url(<?= @$_SESSION["user_image"] ?>)"></div>' +
                                        '<div class="msg-bubble">' +
                                        '<div class="msg-info">' +
                                        '<div class="msg-info-time">' +data[count].chat_messages_datetime +'</div>' +
                                        '</div>';
                        }else{
                            html +=     '<div class="msg left-msg"><div class="msg-img" style="background-image: url('+surl+'/'+data[count].sender_image +')"></div>' +
                                        '<div class="msg-bubble">' +
                                        '<div class="msg-info">' +
                                        '<div class="msg-info-time">' +data[count].chat_messages_datetime +'</div>' +
                                        '</div>';
                        }
                                html+=        '<div class="msg-text">' +data[count].chat_messages_text + '</div>' +
                                        '</div>' +
                                    '</div>';
                    }
                    
                    // for (var count = 0; count < data.length; count++) {
                    //     html += '<div class="row" style="margin-left:0; margin-right:0">';
                    //     if (data[count].message_direction == 'right') {
                    //         html += '<div align="left"><span class="text-muted"><small><b>' + data[count].chat_messages_datetime + '</b></small></span></div>';

                    //         html += '<div class="col-md-10 alert alert-warning">';
                    //     } else {
                    //         html += '<div align="right"><span class="text-muted"><small><b>' + data[count].chat_messages_datetime + '</b></small></span></div>';
                    //         html += '<div class="col-md-2">&nbsp;</div>';
                    //         html += '<div class="col-md-10 alert alert-info">';
                    //     }
                    //     html += data[count].chat_messages_text + '</div></div>';
                    // }
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
                url: surl+"/chat/check_chat_notification",
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
                            //console.log(data[count].status);

                            if (data[count].status == 'online') {
                                //console.log('online_status_' + data[count].user_id);
                                $('#online_status_' + data[count].user_id).addClass('online');
                                $('#online_status_' + data[count].user_id).removeClass('offline');
                                //
                                if (data[count].is_type == 'yes') {
                                    $('#type_notifitcation_' + data[count].user_id).html('<i><small>Typing</small></i>');
                                } else {
                                    $('#type_notifitcation_' + data[count].user_id).html('');
                                }
                            } else {
                                $('#online_status_' + data[count].user_id).addClass('offline');

                                $('#online_status_' + data[count].user_id).removeClass('online');

                                //
                                $('#type_notifitcation_' + data[count].user_id).html('');
                            }

                            $('#chat_notification_' + data[count].user_id).html(html);
                        }
                    }
                }
            })
        }
        });