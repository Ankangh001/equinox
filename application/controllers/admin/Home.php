<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!@$_SESSION['admin']['email']) {
			redirect('admin/login');
		}
		$this->load->view('admin/partials/header');
	}

	public function index()
	{
		redirect('admin/user');
	}
}
