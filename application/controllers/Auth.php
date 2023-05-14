<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends APIMaster {

	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model', 'auth_model');
		$this->load->model('user_model', 'user_model');
		$this->CI =& get_instance();
	}

	public function index(){

		if($this->session->has_userdata('is_admin_login')){
			redirect('admin/dashboard');
		}
		else{
			redirect('admin/auth/login');
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

        if (empty($user) || empty($pass)):
            $this->returnResponse(0, "All param required!");
        endif;

        $res = $this->AppLogin->PanelLogin($user, $pass);
        if ($res['success'] == 1) {
            $user_data = $res['data'];
            $this->session->set_userdata("user_id", $user_data['user_id']);
            $this->session->set_userdata("email", $user_data['email']);
            $this->session->set_userdata("admin_type", $user_data['admin_type']);
            $this->session->set_userdata("user_name", $user_data['user_name']);

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
        header("Location: " . base_url());
    }

	//-------------------------------------------------------------------------
	public function register(){

		if($this->input->post('submit')){

			// for google recaptcha
			if ($this->recaptcha_status == true) {
				if (!$this->recaptcha_verify_request()) {
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('error', 'reCaptcha Error');
					redirect(base_url('admin/auth/register'));
					exit();
				}
			}

			$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[ci_admin.username]|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_admin.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/auth/register'),'refresh');
			}
			else{
				$data = array(
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'admin_role_id' => 3, // By default i putt role is 2 for registraiton
					'email' => $this->input->post('email'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => 1,
					'is_verify' => 0,
					'token' => md5(rand(0,1000)),    
					'last_ip' => '',
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				if($result){
					//sending welcome email to user
					$this->load->helper('email_helper');

					$mail_data = array(
						'fullname' => $data['firstname'].' '.$data['lastname'],
						'verification_link' => base_url('admin/auth/verify/').'/'.$data['token']
					);
					$to = $data['email'];
					$email = $this->mailer->mail_template($to,'email-verification',$mail_data);
					if($email){
						$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
						redirect(base_url('admin/auth/login'));
					}	
					else{
						echo 'Email Error';
					}
				}
			}
		}
		else{
			$this->load->view('client-signup');
		}
	}

	//----------------------------------------------------------	
	public function verify(){

		$verification_id = $this->uri->segment(4);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
			redirect(base_url('admin/auth/login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('admin/auth/login'));
		}	
	}

	//--------------------------------------------------		
	public function forgot_password(){

		if($this->input->post('submit')){
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/auth/forget_password'),'refresh');
			}

			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);

			if($response){

				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['admin_id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
				
				// --- sending email
				$to = $response['email'];
				$mail_data= array(
					'fullname' => $response['firstname'].' '.$response['lastname'],
					'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
				);
				$this->mailer->mail_template($to,'forget-password',$mail_data);

				if($email){
					$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

					redirect(base_url('admin/auth/forgot_password'));
				}
				else{
					$this->session->set_flashdata('error', 'There is the problem on your email');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
			else{
				$this->session->set_flashdata('error', 'The Email that you provided are invalid');
				redirect(base_url('admin/auth/forgot_password'));
			}
		}
		else{

			$data['title'] = 'Forget Password';
			$data['navbar'] = false;
			$data['sidebar'] = false;
			$data['footer'] = false;
			$data['bg_cover'] = true;

			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/auth/forget_password');
			$this->load->view('admin/includes/_footer', $data);
		}
	}

	//----------------------------------------------------------------		
	public function reset_password($id=0){

		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('reset_code', $id);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}

			else{
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->auth_model->reset_password($id, $new_password);
				$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
				redirect(base_url('admin/auth/login'));
			}
		}
		else{
			$result = $this->auth_model->check_password_reset_code($id);

			if($result){

				$data['title'] = 'Reseat Password';
				$data['reset_code'] = $id;
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/reset_password');
				$this->load->view('admin/includes/_footer', $data);

			}
			else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('admin/auth/forgot_password'));
			}
		}
	}

}  // end class


?>