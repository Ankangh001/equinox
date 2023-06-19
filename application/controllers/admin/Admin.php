<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
        // if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
		// 	redirect(base_url('user'));
        // }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
		// 	redirect(base_url('admin'));
        // }
    }

	public function index()
	{
        $response['phase1'] = count($this->db->where(['phase'=> '1', 'product_status'=> '0', 'payment_status'=> '1' ])->get('userproducts')->result_array());
        $response['phase2'] = count($this->db->where(['phase'=> '2', 'product_status'=> '0', 'payment_status'=> '1'  ])->get('userproducts')->result_array());
        $response['funded'] = count($this->db->where(['phase'=> '3', 'product_status'=> '0', 'payment_status'=> '1'  ])->get('userproducts')->result_array());
        $response['completed'] = count($this->db->where(['product_status'=> '1' ])->get('userproducts')->result_array());
        $response['users'] = count($this->db->where(['admin_type'=> 'Client' ])->get('user')->result_array());

        $this->load->view('admin/index',$response);
	}
}
