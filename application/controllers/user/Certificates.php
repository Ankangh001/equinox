<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends APIMaster {

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
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('user/certificates', $response);
	}
}
