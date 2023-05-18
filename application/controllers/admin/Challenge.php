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
		$response = $this->db->get('products')->result_array();
        $this->load->view('admin/challenge', json_encode($response));
		// echo json_encode($response);	
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
				'product_desc' => $this->input->post('description'),
				'product_category' => $this->input->post('product-type'),
				'product_price' => $this->input->post('product-price'),
				'created_at' => date('Y-m-d H:m:s'),
				'created_by' => 'admin',
				'status' => $this->input->post('status'),
			);
			
			$res = $this->db->insert('products', $data);
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
			echo $response;  

		} catch (\Throwable $th) {
			$res = $th;
		}

	}


	public function view(){
		$response = $this->db->get('products')->result_array();
		echo json_encode($response);	
	}
}
