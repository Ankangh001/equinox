<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends APIMaster {

	public function __construct()
    {
        $users = array(
            // 'g.gordon94@gmail.com',
            // 'info@aryatrader.com',
            // 'dubioustrader@gmail.com',
            // 'shujaatkhan410@gmail.com',
            // 'metagesgetachew52@gmail.com',
            // 'Zim.business@proton.me',
            // 'info@bmtrading.de',
            // 'paldenbhutiallc@gmail.com',
            // 'tradezonew7@gmail.com',
            // 'ramosecommercellc@gmail.com',
            // 'moreharrisonuwah@gmail.com',
            // 'will@lynktrading.com',
            // 'cs@qubesys.com',
            // 'bagendajunior@yahoo.com',
            // 'support@a1trading.com',
            // 'thepropjournalist@gmail.com',
            // 'support@blueedgefinancial.com',
            // 'info@trustfultrading.com',
            // 'saintpatrick3236@gmail.com',
            // 'info@tradinglp.com',
            'ankanghosh010@gmail.com',
            'gigabytelite.001@gmail.com'
        );

        foreach ($users as $key => $value) {
            $this->load->helper('email_helper');
            $this->load->library('mailer');  
            $body = file_get_contents(base_url('assets/mail/launch.html'));

            
            $email = send_email($value, 'We are now live - 20% Discount', $body,'','',9);
        }

    }

    public function send() {
        
    }

}
