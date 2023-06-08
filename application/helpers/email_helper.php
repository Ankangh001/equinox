<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($to = '', $subject  = '', $body = '', $attachment = '', $cc = '',$type = '1')

    {
		$controller =& get_instance();
       	$controller->load->helper('path'); 

		switch ($type) {
			case "1":
				$smtp_host = '';
				$smtp_port = '';
				$smtp_user = '';
				$smtp_pass = '';
				$from	=	'';
				$application_name	=	'';
			  break;
			case "2":
				$smtp_host = '';
				$smtp_port = '';
				$smtp_user = '';
				$smtp_pass = '';
				$from	=	'';
				$application_name	=	'';
			  break;
			case "3":
				$smtp_host = '';
				$smtp_port = '';
				$smtp_user = '';
				$smtp_pass = '';
				$from	=	'';
				$application_name	=	'';
			  break;
			default:
				$smtp_host 	= SMPT_HOST;
				$smtp_port 	= SMPT_PORT;
				$smtp_user 	= SMPT_USER;
				$smtp_pass 	= SMPT_PASS;
				$from		= SMPT_USER;
				$application_name	=	APPLICATION_NAME;
		  }



       	// Configure email library
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp";
        $config['smtp_host']    = $smtp_host;
        $config['smtp_port']    = $smtp_port;
		$config['smtp_timeout'] = '30';
		$config['smtp_user']    = $smtp_user;
		$config['smtp_pass']    = $smtp_pass;
        $config['mailtype'] 	= 'html';
        $config['charset']  	= 'utf-8';
        $config['newline']  	= "\r\n";
        $config['wordwrap'] 	= TRUE;

        $controller->load->library('email');
        $controller->email->initialize($config);   
		$controller->email->from($from, $application_name);
		// $this->email->from('your@example.com', 'Your Name');
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