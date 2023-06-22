<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
        $this->CI->load->helper('email');
	}
     //=============================================================
    // Eamil Templates
    function mail_template($to = '',$slug = '',$mail_data = '')
    {
        $template   =  $this->$slug();
        $body       = $template['body'];
        $data['subject']    = $template['subject'];
        $data['content']    = $this->mail_template_variables($body,$slug,$mail_data);
        return $data;
    }

    //=============================================================
    // GET Eamil Templates AND REPLACE VARIABLES
    function mail_template_variables($content,$slug,$data = '')
    {
        switch ($slug) {
            case 'registration_email':
                $content = str_replace('{FULLNAME}',$data['fullname'],$content);
                $content = str_replace('{VERIFICATION_LINK}',$data['verification_link'],$content);
                return $content;
            break;

            case 'forget-password':
                $content = str_replace('{FULLNAME}',$data['fullname'],$content);
                $content = str_replace('{RESET_LINK}',$data['reset_link'],$content);
                return $content;
            break;

            case 'general-notification':
                $content = str_replace('{CONTENT}',$data['content'],$content);
                return $content;
            break;

            default:
                # code...
                break;
        }
    }

	//=============================================================
	function registration_email()
	{
        $login_link = base_url('auth/login');  
        $template = [];
		$template['body'] = '<h3>Hi {FULLNAME}</h3>
            <p>Welcome to Equinox!</p>
            <p>Active your account with the link above and start your Career :</p>  
            <p>{VERIFICATION_LINK}</p>

            <br>
            <br>

            <p>Regards, <br> 
               Equinox Team <br> 
            </p>';
        $template['subject'] = 'Account Email Verification';
		return $template;		
	}

	//=============================================================
	function pwd_reset_email()
	{
		$template = [];
		$template['body'] = '<h3>Hi {FULLNAME}</h3>
            <p>Welcome to Equinox!</p>
            <p>We have received a request to reset your password. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p> 
            <p>To reset your password, please click the link below:</p> 
            <p>{RESET_LINK}</p>

            <br>
            <br>

            <p>Regards, <br> 
               Equinox Team <br> 
            </p>';
        $template['subject'] = 'Password Reset link';
        return $template;			
	}

}
?>