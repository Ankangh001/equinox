<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($to = '', $subject  = '', $body = '', $attachment = '', $cc = '',$fromEmail='',$fromPass='')

    {
		$controller =& get_instance();
       	$controller->load->helper('path'); 
		$fromEmail = ($fromEmail !='')?$fromEmail:SMPT_USER; 
		$fromPass = ($fromPass !='')?$fromPass:SMPT_PASS; 
       	// Configure email library
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp";
        $config['smtp_host']    = $fromEmail;
        $config['smtp_port']    = $fromPass;
		$config['smtp_timeout'] = '30';
		$config['smtp_user']    = SMPT_USER;
		$config['smtp_pass']    = SMPT_PASS;
        $config['mailtype'] 	= 'html';
        $config['charset']  	= 'utf-8';
        $config['newline']  	= "\r\n";
        $config['wordwrap'] 	= TRUE;

        $controller->load->library('email');
        $controller->email->initialize($config);   
		$controller->email->from($fromEmail, APPLICATION_NAME);
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
			return true;
		}else{
			return false;
			// echo $controller->email->print_debugger();
		}
    }

?>