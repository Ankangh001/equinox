<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function getCredentials(){
		$userID = $this->input->post('user_id');
		$productID = $this->input->post('product_id');

		$response = $this->db->where(
			[
			'user_id' =>  $userID,
			'product_id' =>  $productID
			])->get('userproducts')->result_array();

		echo json_encode($response);
	}

	public function addCredentials()
	{
		// print_r($this->input->post());die;
		$data = array(
			'account_id' => $this->input->post('account_id'),
			'account_password' =>  $this->input->post('account_password'),
			'server' =>  $this->input->post('server'),
			'ip' =>  $this->input->post('ip'),
			'port' =>  $this->input->post('port'),
			'product_status' =>  '1',
		);

		$userID = $this->input->post('user_id');
		$productID = $this->input->post('product_id');
		
		$res = $this->db->where([
			'user_id' =>  $userID,
			'product_id' =>  $productID,
			])->update('userproducts', $data);

		if($res){
			$response = array(
				'status' => '200',
				'message' => 'Added successfully',
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'Unable to add data',
			);
		}
		echo json_encode($response);  
	}

	public function freeTrial()
	{
		$this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('admin/free-trial',$response);
	}

	public function phase1()
	{
		$this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('admin/phase-1',$response);
	}

	public function phase2()
	{
		$this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('admin/phase-2',$response);
	}

	public function phase3()
	{
		$this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('admin/phase-3',$response);
	}

	public function completed()
	{
        $this->load->view('admin/completed');
	}

	public function getPhase1()
	{
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->get()->result_array();

		echo  json_encode($response);
	}
}
