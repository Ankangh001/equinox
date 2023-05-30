<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends APIMaster {

    public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['user_id' => '3']);
        $response['res'] = $this->db->get()->result_array();
		$this->load->view('user/index', $response);
	}
    
    
}
