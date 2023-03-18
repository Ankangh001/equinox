<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
        $this->load->helper(['url','form','function_helper']);
        $this->load->library('form_validation');
        $this->load->model('auth_model');
	}

    public function login(){
	    if(($this->session->name) && ($this->session->failed==0)){
            $this->logout();
            //header('Location:home');
        }
		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    		$this->form_validation->set_rules('password', 'password', 'required');
			
            if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('error', $data['errors']);
				redirect(base_url('login'),'refresh');
			}
			else {
				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);
				if($result){
					if($result['is_verify'] == 0){
						$this->session->set_flashdata('error', 'Please verify your email address!');
						redirect(base_url('login'));
						exit();
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', 'Account is disabled by Admin!');
						redirect(base_url('login'));
						exit();
					}
					if($result['role'] == 'user'){
						$user_data = array(
							'user_id' => $result['user_id'],
							'email' => $result['email'],
							'name' => $result['name'],
							'verified'  =>  $result['verified'],
							'is_user_login' => TRUE,
							'user_image'    => $result['profile_picture'],
							'two_step_verification' =>$result['two_step_verification']
						);
						        $this->load->library('user_agent');
                                if ($this->agent->is_browser())
                                {
                                        $agent = $this->agent->browser().' '.$this->agent->version();
                                }
                                elseif ($this->agent->is_robot())
                                {
                                        $agent = $this->agent->robot();
                                }
                                elseif ($this->agent->is_mobile())
                                {
                                        $agent = $this->agent->mobile();
                                }
                                else
                                {
                                        $agent = 'Unidentified User Agent';
                                }
                                
                                preg_match('#\((.*?)\)#', $this->agent->agent, $match);
                                $device = explode(";",$match[1]);

                        $user_log = array(
							'user_id'           =>  $result['user_id'],
							'ip_address'        =>  getUserIpAddr(),
							'device'            =>  $device[2],
							'os'                =>  $this->agent->platform(),
							'logged_in_time'    =>  date('Y-m-d : h:m:s'),
						);
						
						if(@$result['email_notification'] == 1){
    					    $msg = "You have Login at ".date('Y-m-d : h:m:s')."<br>Device : ".$this->agent->platform().'-'.$device[2];
    					    $subject = "Login Details";
                            $this->textMail($msg,$subject,$result['email']);
    					}
						
						$data = $this->security->xss_clean($user_log);
				        $result = $this->auth_model->user_log($data);
						$this->session->set_userdata($user_data);
						$this->load->library('authenticator');
						if($this->session->two_step_verification=='0'){
						    redirect(base_url('dashboard'), 'refresh');
						}
    						$this->load->view('twofactor/index');
					}
				}
				else{
					$this->session->set_flashdata('errors', 'Invalid Username or Password!');
					redirect(base_url('login'));
				}
			}
		}
		else{
			$data['title'] = 'Login';
			$this->load->view('partials/header', $data);
			$this->load->view('login');
			$this->load->view('partials/footer');
		}
	}
	
	public function check(){
	    if ($_SERVER['REQUEST_METHOD'] != "POST") {
            $this->session->set_flashdata('errors', 'Authentication Failed!');
			redirect(base_url('login'));
            die();
        }
        $this->load->library('authenticator');
        $Authenticator = new Authenticator();
        
        $checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance
        
        if (!$checkResult) {
            $data = ['user_id','email', 'role', 'name','is_user_login','user_image','verified'];
		    $this->session->unset_userdata($data);
            $_SESSION['failed'] = true;
            $this->session->set_flashdata('errors', 'Authentication Failed!');
			redirect(base_url('login'));
            die();
        }else{
            redirect(base_url('dashboard'), 'refresh');
        }

	}
    
	public function logout()
	{
	    if(!$this->session->name){
            header('Location:home');
        }
		$this->auth_model->logout();
		$data = ['user_id','email', 'role', 'name','is_user_login','user_image','verified','failed'];
		$this->session->unset_userdata($data);
		redirect('home');
	}

    //-------------------------------------------------------------------------
	public function signup(){
	    if($this->session->name){
            header('Location:home');
        }
		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('cpass', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('signup'),'refresh');
			}
			else{
                $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' =>  $password,
					'is_active' =>0,
	                'is_verify' => 0,
					'token' => md5(rand(0,1000)),
					'last_ip' => getUserIpAddr(),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->signup($data);
				$result = true;
                if($result){
					$verification_link = base_url('auth/verify').'/'.$data['token'];
                    $subject = 'Verification Email for Addressme';
                    //Email content
                    $htmlContent = '<h1>Thank you for signing up.</h1>';
                    $htmlContent .= '<p>Your Verification link is <b><a href="'.$verification_link.'">'.$verification_link.'</a></b>';
                    $htmlContent .= '<p> click or copy the link to your browser to get verified</p>';
                    
					$email = $this->textMail($htmlContent,$subject,$data['email']);
					if($email){
						$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
						redirect(base_url('login'));
					}	
					else{
						echo 'Email Error';
					}
				}
			}
		}
		else{
			$data['title'] = 'Create an Account';
			$this->load->view('partials/header', $data);
			$this->load->view('signup');
			$this->load->view('partials/footer',$data);
		}
	}

	//----------------------------------------------------------	
	public function verify(){

		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
			redirect(base_url('login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('login'));
		}	
	}

	public function user_verify(){
        
		$verification_id = $this->uri->segment(4);
		$result = $this->auth_model->user_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
			redirect(base_url('admin/auth/user_login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('admin/auth/user_login'));
		}	
	}
	
		//--------------------------------------------------		
	public function forgot_password(){

		if($this->input->post('submit')){
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
	public function reset_password(){
        if(!$this->session->name){
            header('Location:home');
        }
		if($this->input->post('submit')){
			$this->form_validation->set_rules('current_pass', 'Password', 'trim|required');
			$this->form_validation->set_rules('new_pass', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('cpass', 'Password Confirmation', 'trim|required|matches[new_pass]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('errors', $data['errors']);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}

			else{
			    $current_password = $this->input->post('current_pass');
				$new_password = password_hash($this->input->post('new_pass'), PASSWORD_BCRYPT);
				$result = $this->auth_model->reset_password($this->session->user_id, $new_password,$current_password);
                $userMail = $this->session->email;

				if(@$result['token']){
					$verification_link = base_url('confirm-change-password').'/'.$result['token'];
                    //Email content
                    $htmlContent = '<h1>Reset Password.</h1>';
                    $htmlContent .= 'Your reset password link is <a href="'.$verification_link.'">'.$verification_link.'</a>';
                    $subject='Reset Password';
                    $email = $this->textMail($htmlContent,$subject,$userMail);
                    
                    if($email){
					    $msg['successful'] = 'Your reset password request is accepted, please verify it by clicking the activation link that has been send to your email.';
						$this->session->set_flashdata('success', 'Your reset password request is accepted, please verify it by clicking the activation link that has been send to your email.');
					}	
					else{
						$this->session->set_flashdata('error','Email error');
					}
				}
				else{
				    $this->session->set_flashdata('error','Please Retry');
				}
				$this->load->view('partials/header');
				$this->load->view('security',$msg);
				$this->load->view('partials/footer');
			}
		}
	}
	
	//-----------------------------------
	public function confirm_change_password(){
	    if($this->session->name){
            header(base_url().'Location:home');
        }
	    $code = $this->uri->segment(2);
	    $result = $this->auth_model->user_verification($code);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
			redirect(base_url('login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('login'));
		}
	}
	
	//---------------------------------------------------
	public function textMail($msg,$subject,$email){
        $this->load->library('email');
                    $config = array(
                        'protocol'  => 'SMTP',
                        'smtp_host' => 'mail.ankangh.xyz',
                        'smtp_port' => '465',
                        'smtp_user' => 'ankan@ankangh.xyz',
                        'smtp_pass' => 'Ankan@2000',
                        'mailtype'  => 'html',
                        'smtp_crypto' => 'ssl',
                        'smtp_timeout' => '4',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $this->email->initialize($config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");

                    $this->email->to($email);
                    $this->email->from('ankan@ankangh.xyz','ADDRESSME');
                    $this->email->subject($subject);
                    $this->email->message($msg);

                    $info = $this->email->send();
					return $info;
    }
}