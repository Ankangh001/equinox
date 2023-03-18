<!-- chatttt -->
<!--  <div class="row" id="chat_portion">
                                   <div class="col-md-3" style="padding-right:0;">
                                            <div class="panel panel-default" style="height: 700px; overflow-y: scroll;">
                                                <div class="panel-heading">Chat with User</div>
                                                <div class="panel-body" id="chat_user_area">

                                                </div>
                                                <input type="hidden" name="hidden_receiver_id_array" id="hidden_receiver_id_array" />
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 0; width:100%">
                                            <div class="panel panel-default" style=" width: 90%; margin: auto; border: 2px solid; padding: 1rem; ">
                                                <div class="panel-heading">Chat Area</div>
                                                <div class="panel-body">
                                                    <div id="chat_header">
                                                        <h2 align="center" style="margin:0; padding-bottom:16px;"><span id="dynamic_title">Welcome <?php echo $this->session->userdata('username'); ?></span></h2>
                                                    </div>
                                                    <div id="chat_body" style="height:406px; overflow-y: scroll;"></div>
                                                    <div id="chat_footer">
                                                        <hr />
                                                        <div class="form-group">
                                                            <div id="chat_message_area" contenteditable class="form-control"></div>
                                                        </div>
                                                        <div class="form-group" align="right">
                                                            <button type="button" name="send_chat" id="send_chat" class="btn btn-success btn-xs" disabled>Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title d-flex">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u2.png)"></div>
                <p class="chat-name">Cindy Pathra<br /><span class="user-chat-staus">Online</span>|<span class="user-profile-staus not-verified">Not Verified</span></p>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u2.png)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <!-- <div class="msg-info-name">BOT</div> -->
                        <div class="msg-info-time">12:45</div>
                    </div>

                    <div class="msg-text">
                        Hi, welcome to Addressme! Go ahead and send me a message. 😄
                    </div>
                </div>
            </div>

            <div class="msg right-msg">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">Cindy Pathra</div>
                        <div class="msg-info-time">12:46</div>
                    </div>

                    <div class="msg-text">
                        You can change your name in JS section!
                    </div>
                </div>
            </div>
        </main>

        <form class="msger-inputarea">
            <input type="text" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>
</div>
<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title d-flex">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u4.png)"></div>
                <p class="chat-name">Peter Andreson<br /><span class="user-chat-staus">Offline</span>|<span class="user-profile-staus">Verified</span></p>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u4.png)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <!-- <div class="msg-info-name">BOT</div> -->
                        <div class="msg-info-time">12:45</div>
                    </div>

                    <div class="msg-text">
                        Hi, welcome to Addressme! Go ahead and send me a message. 😄
                    </div>
                </div>
            </div>

            <div class="msg right-msg">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">Cindy Pathra</div>
                        <div class="msg-info-time">12:46</div>
                    </div>

                    <div class="msg-text">
                        You can change your name in JS section!
                    </div>
                </div>
            </div>
        </main>

        <form class="msger-inputarea">
            <input type="text" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>
</div>
<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title d-flex">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u3.png)"></div>
                <p class="chat-name">Monalisa Parpe<br />
                    <span class="user-chat-staus">Offline</span>|<span class="user-profile-staus not-verified">Not Verified</span>
                </p>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u3.png)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <!-- <div class="msg-info-name">BOT</div> -->
                        <div class="msg-info-time">12:45</div>
                    </div>

                    <div class="msg-text">
                        Hi, welcome to Addressme! Go ahead and send me a message. 😄
                    </div>
                </div>
            </div>

            <div class="msg right-msg">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">James Mooriee Pathra</div>
                        <div class="msg-info-time">12:46</div>
                    </div>

                    <div class="msg-text">
                        You can change your name in JS section!
                    </div>
                </div>
            </div>
        </main>

        <form class="msger-inputarea">
            <input type="text" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>
</div>






















<section class="msger">
    <header class="msger-header">
        <div class="msger-header-title d-flex">
            <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u1.png)"></div>
            <p class="chat-name">James Moorie<br /><span class="user-chat-staus">Online</span>|<span class="user-profile-staus">Verified</span></p>
        </div>
        <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
        </div>
    </header>

    <main class="msger-chat">
        <div class="msg left-msg">
            <div class="msg-img" style="background-image: url(<?= base_url('assets') ?>/images/u1.png)"></div>

            <div class="msg-bubble">
                <div class="msg-info">
                    <!-- <div class="msg-info-name">BOT</div> -->
                    <div class="msg-info-time">12:45</div>
                </div>

                <div class="msg-text">
                    Hi, welcome to Addressme! Go ahead and send me a message. 😄
                </div>
            </div>
        </div>

        <div class="msg right-msg">
            <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

            <div class="msg-bubble">
                <div class="msg-info">
                    <div class="msg-info-name">Cindy Pathra</div>
                    <div class="msg-info-time">12:46</div>
                </div>

                <div class="msg-text">
                    You can change your name in JS section!
                </div>
            </div>
        </div>
    </main>

    <form class="msger-inputarea">
        <input type="text" class="msger-input" placeholder="Enter your message...">
        <button type="submit" class="msger-send-btn">Send</button>
    </form>
</section>