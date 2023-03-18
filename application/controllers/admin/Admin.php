<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!@$_SESSION['admin']['email']) {
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('admin/admin_model');
		$this->load->view('admin/partials/header');
	}

	public function index()
	{
		$info = $this->admin_model->admin();
		$data['result'] = $info;
		$this->load->view('admin/admin', $data);
	}
	public function add_admin()
	{
		$this->load->view('admin/add-admin');
	}

	public function delete_admin()
	{
		$this->admin_model->delete_admin($this->uri->segment(3));
		redirect('admin/admin');
	}

	public function update_admin()
	{
		$info = $this->admin_model->admin_info($this->uri->segment(3));
		$data['result'] = $info;
		$this->load->view('admin/update-admin', $data);
	}

	public function change_password()
	{
		$this->load->view('admin/change-password');
	}

	public function add_admin_form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == false) {
			$data = $this->input->post();
			$this->load->view('admin/add-admin', $data);
		} else{
			$email = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL);
			$password = filter_var($this->input->post('password'), FILTER_SANITIZE_STRING);
			$name = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
			$role = filter_var($this->input->post('role'), FILTER_SANITIZE_STRING);
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$data = [
				'email' => $email,
				'password' => $hash,
				'name' => $name,
				'role' => $role,
			];
			$this->admin_model->add_admin($data);
			redirect('admin/add-admin/success');
		}	
	}

	public function update_admin_form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == false) {			
			$info = $this->admin_model->admin_info($this->uri->segment(2));
			$data['result'] = $info;
			$this->load->view('admin/update-admin', $data);
		} else{
			$email = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL);
			$name = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
			$role = filter_var($this->input->post('role'), FILTER_SANITIZE_STRING);
			$fields = [
				'email' => $email,
				'name' => $name,
				'role' => $role,
			];
			$this->admin_model->update_admin_info($this->uri->segment(2),$fields);
			redirect('admin/admin');
		}
	}

	public function change_password_form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('conf_password', 'password', 'required|matches[password]');
		if ($this->form_validation->run() == false) {
			$data = $this->input->post();
			$this->load->view('admin/change-password', $data);
		} else{
			$password = filter_var($this->input->post('password'), FILTER_SANITIZE_EMAIL);
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$id = $this->uri->segment(2);
			$this->admin_model->change_password($id,$hash);
			$this->session->set_flashdata('success', 'Password changed successfully.');
			redirect('admin/admin');
		}
	}
}
