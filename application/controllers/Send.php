<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends APIMaster {

	public function __construct()
    {
        $users = array(
            'gigabytelite.001@gmail.com',
            'okoyechuma@yahoo.com',
            'globalwebucation@gmail.com',
            'gofcusacademy@gmail.com',
            'ith4941@naver.com',
            'donterreon@hotmail.com',
            'freddyaguirre05@yahoo.com',
            'csanto10@gmail.com',
            'advancetechnicals1@gmail.com',
            'giannill737@gmail.com',
            'ravjotsb@icloud.com',
            'marcofilippi83@gmail.com',
            'angelojohnson94@gmail.com',
            'jak66001@gmail.com',
            'scalone_andrea@libero.it',
            'mustafej1@gmail.com',
            'nsubukah@gmail.com',
            'nchedochuks@gmail.com',
            'wongwinghan123@gmail.com',
            'deannational@gmail.com',
            'jakkarinsuknate@gmail.com',
            'Ayanhusain34@gmail.com',
            'treed@cypresslinux.com',
            'hugoruelasilva@gmail.com',
            'isaiahkobli123@gmail.com',
            'maadan14@hotmail.com',
            'desifoli78@gmail.com',
            'raxxe@gmail.com',
            'ForexTrader173@outlook.com',
        );

        foreach ($users as $key => $value) {
            $this->load->helper('email_helper');
            $this->load->library('mailer');  
            $body  = '<h2>'.$this->input->post('title').'</h2><br/>
                    
                    <p>'.$this->input->post('desc').'</p><br/><br/>
                    <p>'.$this->input->post('date').'</p>';
            
            $email = send_email($value['email'], $this->input->post('subject'), $body,'','',2);
        }

    }

}
