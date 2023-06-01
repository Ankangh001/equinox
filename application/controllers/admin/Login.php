<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
			redirect(base_url('user'));
        }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
			redirect(base_url('admin'));
        }
    }

	public function index()
	{
        $this->load->view('admin/login');
	}
}
