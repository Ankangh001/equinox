<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/login_model');
	}
	public function index()
	{
		if (@$_SESSION['admin']) {
			redirect('/');
		} else {
			$this->load->view('admin/login');
		}
	}
	public function validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
	if ($this->form_validation->run() == false) {
		$data = $this->input->post();
		$this->load->view('admin/login', $data);
	} else{
		$email = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL);
		$password = filter_var($this->input->post('password'), FILTER_SANITIZE_STRING);
		$info = $this->login_model->validate($email);
		if (!empty($info[0]->email)) {
			if (password_verify($password, $info[0]->password)) {
			    $_SESSION['admin'] = [
			        'email' => $info[0]->email,
			        'name'  => $info[0]->name,
			        'role'  => $info[0]->role
			        ];
				redirect('admin');
			} 
			else {
				$data = $this->input->post();
				$data['msg'] = 'Wrong Email/Password Combination';
				$this->load->view('admin/login', $data);
			}
		}
		else {
			$data = $this->input->post();
			$data['msg'] = 'Wrong Email/Password Combination';
			$this->load->view('admin/login', $data);
		}
	}
}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}