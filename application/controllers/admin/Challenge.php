<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
		$response['res'] = $this->db->get('products')->result_array();
        $this->load->view('admin/challenge', $response);
	}

	public function addChallenge()
	{
        $this->load->view('admin/add-challenge');
	}

	public function save()
	{
        try {
			$data = array(
				'product_name' => $this->input->post('product-name'),
				'account_size' => $this->input->post('account-size'),
				'product_category' => $this->input->post('product-type'),
				'product_price' => $this->input->post('product-price'),
				'max_drawdown' => $this->input->post('maximum-drawdown'),
				'daily_drawdown' => $this->input->post('daily-drawdown'),
				'p1_target' => $this->input->post('phase-1-target'),
				'p2_target' => $this->input->post('phase-2-target'),
				'created_at' => date('Y-m-d H:m:s'),
				'created_by' => 'admin',
				'status' => $this->input->post('status'),
			);

			$product_id = $this->input->post('product_id');
			$response = count($this->db->where(['product_id' =>$product_id])->get('products')->result_array());
			if($response > 0){
				$res = $this->db->where(['product_id' =>$product_id])->update('products', $data);
			}else{
				$res = $this->db->insert('products', $data);
			}

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

		} catch (\Throwable $th) {
			$res = $th;
		}

	}

	public function edit()
	{
        try {
			$last_segment = $this->uri->segment($this->uri->total_segments());
			$response['res'] = $this->db->where(['product_id' =>$last_segment])->get('products')->result_array();
        	$this->load->view('admin/edit-challenge', $response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function delete()
	{
        try {
			$product_id = $this->input->post('product_id');		
			$res = $this->db->where(['product_id' =>$product_id])->delete('products');

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

		} catch (\Throwable $th) {
			$res = $th;
		}

	}


	public function view(){
		try {
			$last_segment = $this->uri->segment($this->uri->total_segments());
			$response['res'] = $this->db->where(['product_id' =>$last_segment])->get('products')->result_array();
        	$this->load->view('admin/view-challenge', $response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}
}
