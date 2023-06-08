<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends APIMaster {

    public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
		$response['res'] = $this->db->where(['admin_type'=>'Client'])->get('user')->result_array();
		$this->load->view('admin/users', $response);
	}
    
    public function accountOverview()
    {
        $this->load->view('admin/account-overview');
        
    }
}
