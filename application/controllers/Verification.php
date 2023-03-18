<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		// if($this->session->name){
        //     header('Location:home');
        // }
        $this->load->helper(['url','form','function_helper']);
        $this->load->library('form_validation');
        $this->load->model('auth_model');
	}

    //-------------------------------------------------------------------------
	public function wallet(){
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        exit;

		if($this->input->post('info_submit')){
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
					'is_active' => 1,
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
					$mail_data = array(
						'name' => $data['name'],
                        'email' => $data['email'],
                        'password'=> $password,
						'verification_link' => base_url('auth/verify').'/'.$data['token']
					);
					$email = send_mail($mail_data);
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


}
    ?>