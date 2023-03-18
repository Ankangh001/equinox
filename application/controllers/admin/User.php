<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		if (!@$_SESSION['admin']['email']) {
			redirect('admin/login');
		}
		$this->load->model('admin/user_model');
		$this->load->view('admin/partials/header');
	}
	
	public function index()
	{
		$info = $this->user_model->user();
		$data['result'] = $info;
		$this->load->view('admin/user', $data);
	}
	
	public function new_user()
	{
		$info = $this->user_model->new_user();
		$data['result'] = $info;
		$this->load->view('admin/user', $data);
	}
	
	public function user_detail()
	{
		$data = $this->user_model->user_detail($this->uri->segment(3));
		$this->load->view('admin/user-detail', $data);
	}

	public function request()
	{
		$info = $this->user_model->request();
		$data['result'] = $info;
		$this->load->view('admin/request', $data);
	}

	public function update_user()
	{
		$info = $this->user_model->request();
		$data['result'] = $info;
		$this->load->view('admin/update_user', $data);
	}
	
	public function edit_user(){
    
	    $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
		if ($this->form_validation->run() == false) {
                $data = array(
					'errors' => validation_errors()
			    );

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        else{
            if($_FILES['user_image']['name']){
    			$config['upload_path'] =        'uploads/';
    			$config['allowed_types']        = 'gif|jpg|png|pdf|JPG|PNG|GIF';
    			$config['max_size']             = 5000;
    			$config['encrypt_name'] = TRUE;
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			if (!$this->upload->do_upload('user_image')){
                    $data = array('errors' => $this->upload->display_errors());
    				$this->session->set_flashdata('form_data', $this->input->post());
    				$this->session->set_flashdata('errors', $data['errors']);
    				redirect(base_url('settings'),'refresh');
                }
                $this->upload->do_upload('user_image');
                $add_file = array('user_image' => $this->upload->data());
                $add_file = 'uploads/'.$add_file['user_image']['file_name'];
            }else{
                $add_file = filter_var($this->input->post('profile_picture'), FILTER_SANITIZE_STRING);
            }
            $name = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
            // $country = filter_var($this->input->post('country'), FILTER_SANITIZE_STRING);
			$add_date = filter_var($this->input->post('dob'), FILTER_SANITIZE_STRING);
			$phone = filter_var($this->input->post('phone'), FILTER_SANITIZE_STRING);
			
			$fields = [
                'name' => $name,
                // 'country' => $country,
                'dob' => $add_date,
                'phone' => $phone,
                'profile_picture' => $add_file,
                'verified'      =>  '1'
            ];
            
			$this->user_model->edit_user($this->uri->segment(4),$fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	
	public function edit_user_password()
	{
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('conf_password', 'password', 'required|matches[password]');
		if ($this->form_validation->run() == false) {
				$data = array(
					'errors' => validation_errors()
			    );

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else{
			$password = filter_var($this->input->post('password'), FILTER_SANITIZE_STRING);
			$hash = [ 'password' => password_hash($password, PASSWORD_DEFAULT) ];
			$id = $this->uri->segment(4);
			$this->user_model->edit_user($id,$hash);
			$this->session->set_flashdata('success', 'Password changed successfully.');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	
	public function notification()
	{
	    if($this->input->post('submit')){
	       
			$this->form_validation->set_rules('message', 'Message', 'required');
    		if ($this->form_validation->run() == false) {
    			$data = $this->input->post();
        		$this->load->view('admin/notification', $data);
    		} else{
    			$user_id = filter_var($this->input->post('user'), FILTER_SANITIZE_STRING);
    			$message = filter_var($this->input->post('message'), FILTER_SANITIZE_STRING);
    			$data = [
    				'user_id' => $user_id,
    				'message' => $message,
    			];
    			$this->user_model->add_notification($data);
    			redirect('admin/user/notification/success');
    		}
	    }else{
	        $data['result'] = $this->user_model->user();
	        $data['notification'] = $this->user_model->notification();
    		$this->load->view('admin/notification', $data);
	    }
	}
	
	public function delete_notification()
	{
		$this->user_model->delete_notification($this->uri->segment(4));
		redirect('admin/user/notification');
	}
	
	public function verification()
	{
		$data['result'] = $this->user_model->verification_request();
		$this->load->view('admin/verification', $data);
	}
	
	public function transaction()
	{
		$data['result'] = $this->user_model->txn_request();
		$this->load->view('admin/transaction', $data);
	}

	public function delete_request()
	{
		$this->user_model->delete_request($this->uri->segment(3));
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	public function delete_verified_request()
	{
		$this->user_model->delete_verified_request($this->uri->segment(3));
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	public function change_request_status()
	{
		$this->user_model->change_request_status($this->uri->segment(3));
		redirect('admin/user/request');
	}
	
	public function delete_user()
	{
		$this->user_model->delete_user($this->uri->segment(3));
// 		redirect('admin/user');
redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	public function change_user_status()
	{
		$data = $this->user_model->change_user_status($this->uri->segment(3));
    	if($data['is_active']==1){
    		$subject = 'Account Activated';
    		$msg = 'Congratulations !! Your Account is activated by the admin. ';
            $this->textMail($msg,$subject,$data['email']);
    	}
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	public function change_verified_status()
	{
		$data = $this->user_model->change_verified_status($this->uri->segment(3));
		
        if($data['verified'] == '0'){
    		$subject = 'Account Verified';
    		$msg = 'Congratulations !! Your Account is verified by the admin. ';
    		$this->textMail($msg,$subject,$data['email']);
    		$not = [
    				'user_id' => $this->uri->segment(3),
    				'message' => $msg,
    			];
    		$this->user_model->add_notification($not);
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
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
?>