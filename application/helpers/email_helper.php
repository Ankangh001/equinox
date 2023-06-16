<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($to = '', $subject  = '', $body = '', $attachment = '', $cc = '',$type = '1')

    {
		$controller =& get_instance();
       	$controller->load->helper('path'); 

		switch ($type) {
			case "1":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'develop@equinoxtradingcapital.com';
				$smtp_pass = 'Ankan@2000';
				$from	=	'develop@equinoxtradingcapital.com';
				$application_name = 'Equinox';
			  break;
			case "2":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'support@equinoxtradingcapital.com';
				$smtp_pass = 'Support@2023';
				$from	=	'support@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "3":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'accounts@equinoxtradingcapital.com';
				$smtp_pass = 'Accounts@2023';
				$from	=	'accounts@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "4":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'community@equinoxtradingcapital.com';
				$smtp_pass = 'Community@2023';
				$from	=	'community@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "5":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'payments@equinoxtradingcapital.com';
				$smtp_pass = 'Payments@2023';
				$from	=	'payments@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "6":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'noreply@equinoxtradingcapital.com';
				$smtp_pass = 'Noreply@2023';
				$from	=	'noreply@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "7":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'pressrelease@equinoxtradingcapital.com';
				$smtp_pass = 'Pressrelease@2023';
				$from	=	'pressrelease@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			case "8":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'complaints@equinoxtradingcapital.com';
				$smtp_pass = 'Complaints@2023';
				$from	=	'complaints@equinoxtradingcapital.com';
				$application_name = 'Equinox Trading Capital LTD';
			  break;
			
			  case "9":
				$smtp_host = 'smtp.hostinger.com';
				$smtp_port = '587';
				$smtp_user = 'press@equinoxtradingcapital.press';
				$smtp_pass = 'Press@2023';
				$from	=	'press@equinoxtradingcapital.press';
				$application_name = 'Equinox Trading Capital';
				
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
// 			echo $controller->email->print_debugger();
		}
    }

?>