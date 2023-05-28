<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')

    {
		$controller =& get_instance();
       	$controller->load->helper('path'); 

       	// Configure email library
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp";
        $config['smtp_host']    = SMPT_HOST;
        $config['smtp_port']    = SMPT_PORT;
		$config['smtp_timeout'] = '30';
		$config['smtp_user']    = SMPT_USER;
		$config['smtp_pass']    = SMPT_PASS;
        $config['mailtype'] 	= 'html';
        $config['charset']  	= 'utf-8';
        $config['newline']  	= "\r\n";
        $config['wordwrap'] 	= TRUE;

        $controller->load->library('email');
        $controller->email->initialize($config);   
		$controller->email->from(EMAIL_FROM, APPLICATION_NAME);
		$controller->email->to($to);
		$controller->email->subject($subject);
		$controller->email->message($body);
		if($cc != '') 
		{	
			$controller->email->cc($cc);
		}	

		if($attachment != '')
		{
			$controller->email->attach(base_url()."your_file_path/" .$attachment);
		}

		if($controller->email->send()){
			return "success";
		}else{
			echo $controller->email->print_debugger();
		}
    }

?>