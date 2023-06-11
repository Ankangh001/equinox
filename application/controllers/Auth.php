<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends APIMaster {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->CI =& get_instance();
	}

	public function index(){

		if($this->session->has_userdata('is_admin_login')){
			redirect('dashboard');
		}
		else{
			redirect('client-login');
		}
	}

	//--------------------------------------------------------------
    public function login()
    {
        if (empty($this->input->post())):
            $this->returnResponse(0, "Invalid request!");
        endif;
        $user = $this->input->post('email');
        $pass = $this->input->post('password');
        $type = $this->input->post('type');

        if (empty($user) || empty($pass)):
            $this->returnResponse(0, "All param required!");
        endif;

        $res = $this->AppLogin->PanelLogin($user, $pass,$type);
        if ($res['success'] == 1) {
			if ($this->decryptAES($res['data']['password']) == $pass){
				$user_data = $res['data'];
				$this->session->set_userdata("user_id", $user_data['user_id']);
				$this->session->set_userdata("email", $user_data['email']);
				$this->session->set_userdata("admin_type", $user_data['admin_type']);
				$this->session->set_userdata("user_name", $user_data['user_name']);
				$this->session->set_userdata("affiliate_code", $user_data['affiliate_code']);
				$this->session->set_userdata("affiliate_by", $user_data['reffered_by']);
	
				//store data in login analaytics
				$generateToken = rand(10,100).$user_data['user_id'].''.$user_data['user_id'].''.$user_data['email'];
				$generateToken = base64_encode($generateToken);
				$insertData['user_id'] 	= $user_data['user_id'];
				$insertData['device'] 	= $_SERVER['HTTP_USER_AGENT'];
				$insertData['device_id'] = 1;
				$insertData['token'] 	= $generateToken;
				$insertData['status'] 	= 1;
				$insertData['created_date'] = date('Y-m-d H:i:s');
				$this->session->set_userdata("token", $generateToken);
	
				$this->db->insert('login_analytics',$insertData);
				$lastId = $this->db->insert_id();
				$this->db->query("update login_analytics set status=0 where auto_id!='$lastId' and user_id='{$user_data['user_id']}'");
	
				//set token in cookie
				$cookie_name = "API_TOKEN";
				$cookie_value = $generateToken;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
				if( $user_data['admin_type']=='Client'){
					$res['data']['redirect_url']=base_url('user');
				}else if( $user_data['admin_type']=='Admin'){
					$res['data']['redirect_url']=base_url('admin');
				}
			}else{
				$res['success'] = 0;
				$res['message'] = "Your password is incorrect, enter valid password!";
			}
        }

        $this->jsonOutput($res);
    }

    public function logout()
    {
        //update status and destroy cookie
        $API_TOKEN = $_COOKIE['API_TOKEN'];
        $this->db->where('token',$API_TOKEN);
        $result = $this->db->update('login_analytics', array('status'=>0));
        if($result){
            setcookie("API_TOKEN", "", time()-3600);
            unset($_COOKIE['API_TOKEN']);
        }

        session_destroy();
        header("Location: " . base_url('client-login'));
    }

	//-------------------------------------------------------------------------
	public function register(){
		$body = file_get_contents(base_url('assets/mail/verification.txt'));
		if($_POST){
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}
			else{
				$data = array(
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'number' 		=> $this->input->post('contact'),
					'email' 		=> $this->input->post('email'),
					'password' 		=> $this->encryptAES($this->input->post('password')),
					'admin_type'	=> 'Client',	
					'email_verified'=> '0',
					'verification_key'=> md5(rand(0,1000).time()), 	
					'affiliate_code'=> rand(100,999).$this->randomuuid(9).rand(100,999),
					'reffered_by'	=> $this->input->post('referral_code')??'',
					'created_date' 	=> date('Y-m-d h:m:s')
				);
				$data 	= $this->security->xss_clean($data);
				$response = $this->AppLogin->insertRegData($data);
				if($response['success']==1){
					$this->load->helper('email_helper');
					$this->load->library('mailer');
					$mail_data = array(
						'fullname' => $data['first_name'].' '.$data['last_name'],
						'verification_link' => base_url('auth/verify/').$data['verification_key']
					);
					$to = $data['email'];
					$emailData = $this->mailer->mail_template($to,'registration_email',$mail_data);
					$email = send_email($to, $emailData['subject'], $body,'','',2);

					if($email){
						$response = array(
							"success" => 1,
							"message" => "Your Account has been made, please verify it by clicking the activation link that has been send to your email."
						);
					}	
					else{
						$response = array(
							"success" => 0,
							"message" => "Some error occured!"
						);
					}
				}
				$this->jsonOutput($response);
			}
		}
	}

	//----------------------------------------------------------	
	public function verify(){

		$verification_id = $this->uri->segment(3);
		$result = $this->AppLogin->email_verification($verification_id);
		if($result){
			$response = array(
				"success" => 1,
				"message" => "Your email has been verified, you can now login."
			);
		}
		else{
			$response = array(
				"success" => 0,
				"message" => "The url is either invalid or you already have activated your account."
			);
		}
		$this->jsonOutput($response);
	}

	//--------------------------------------------------		
	public function forgot_password(){

		if($_POST){
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}

			$email = $this->input->post('email');
			$response = $this->AppLogin->check_user_mail($email);

			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['user_id']);
				$this->AppLogin->update_reset_code($pwd_reset_code, $response['user_id']);
				$this->load->helper('email_helper');
				$this->load->library('mailer');
				// --- sending email
				$to = $response['email'];
				$mail_data= array(
					'fullname' => $response['first_name'].' '.$response['last_name'],
					'reset_link' => base_url('auth/reset_password/'.$pwd_reset_code)
				);
				$emailData = $this->mailer->mail_template($to,'pwd_reset_email',$mail_data);
				$email = send_email($to,$emailData['subject'],$emailData['content'],'','',1);

				if($email){
					$response = array(
						"success" =>  1,
						"message" =>  "We have sent instructions for resetting your password to your email",
						"data"	  =>  ['redirect_url'=> base_url('client-login')]
					);
				}else{
					$response = array(
						"success" => 0,
						"message" => "Some error occured!"
					);
				}
			}else{
				$response = array(
					"success" => 0,
					"message" => "The Email that you provided are invalid"
				);
			}
			$this->jsonOutput($response);
		}else{
			$this->load->view('forget-password');
		}
	}

	//----------------------------------------------------------------		
	public function reset_password($id=0){

		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}else{
				$new_password = $this->encryptAES($this->input->post('password'));
				$this->AppLogin->reset_password($id, $new_password);
				$response = array(
					"success" =>  1,
					"message" =>  "New password has been Updated successfully.Please login",
					"data"	  =>  ['redirect_url'=> base_url('client-login')]
				);
				$this->jsonOutput($response);
			}
		}else{
			$result = $this->AppLogin->check_password_reset_code($id);

			if($result){
				$data['reset_code'] = $id;
				$this->load->view('reset-password',$data);
			}else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('client-forget-password'));
			}
		}
	}

	public function client()
	{
		if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
			redirect(base_url('user'));
        }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
			redirect(base_url('admin'));
        }
		$this->load->view('client');
	}

	public function clientSignup($code='')
	{
		if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
			redirect(base_url('user'));
        }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
			redirect(base_url('admin'));
        }
		$this->load->view('client-signup',['referral_code'=>$code]);
	}

}  // end class


?>