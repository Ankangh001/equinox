<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendBulkEmail extends CI_Controller {
    public function index()
	{
		$body = file_get_contents(base_url('assets/mail/comingSoon.html'));

        $this->load->helper('email_helper');
        $this->load->library('mailer');
    

        $getAll_emails =  $this->db->get('comingsoon')->result_array();

        $to = 'ankanghosh010@gmail.com';
        $email = send_email($to, $emailData['subject'], $body,'','',2);
	}
}
?>