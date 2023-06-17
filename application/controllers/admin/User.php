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

    public function view(){
		try {
			$last_segment = $this->uri->segment($this->uri->total_segments());
			$response['res'] = $this->db->where(['user_id' =>$last_segment])->get('user')->result_array();

        	$this->load->view('admin/view-user', $response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function getUserProducts(){
		try {
			$last_segment = $this->uri->segment($this->uri->total_segments());

			$this->db->select('*');
            $this->db->from('userproducts');
            $this->db->join('products', 'userproducts.product_id=products.product_id');
            $this->db->where(['user_id' => $last_segment]);
            $response['data'] = $this->db->get()->result_array();

            echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function getAllProducts(){
		try {
            $response['data'] = $this->db->get('products')->result_array();
            echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function deleteProduct(){
		try {
            $res = $this->db->where(['id'=>$this->input->post('id')])->delete('userproducts');
            if($res){
				$response = array(
					'status' => '200',
					'message' => 'User Poduct Deleted successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to delete data',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}
    
    public function adduserProduct()
	{        
        // print_r($this->input->post());die;
        try {
            $product_category = $this->db->where(['product_id' => $this->input->post('product_id')])->get('products')->result_array();
			$userProducts = array(
				'user_id' => $this->input->post('user_id'),
				'product_id' => $this->input->post('product_id'),
				'phase' => '1',
				'created_date' => date('Y-m-d H:m:s'),
				'product_status' => '0',
			);

            $transaction = array(
				'user_id' => $this->input->post('user_id'),
				'amount' => $product_category[0]['product_price'],
				'product_id' => $this->input->post('product_id'),
				'product_category' => $product_category[0]['product_category'],
				'gateway' => 'coinbase',
				'purchase_date' => date('Y-m-d H:m:s'),
				'updated_at' => date('Y-m-d H:m:s'),
			);
			
			$res = $this->db->insert('userproducts', $userProducts);
			$res2 = $this->db->insert('transactions', $transaction);
			if($res && $res2){
				$response = array(
					'status' => '200',
					'message' => 'User Poduct Added successfully',
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

	public function getpendingKyc(){
		try {
			$res = $this->db->where(['user_id'=>$this->input->post('user_id')])->update('user', ['kyc_status' => '0']);
            
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to find pending kyc related to this account.',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function approveKyc(){
		try {
			$res = $this->db->where(['user_id'=>$this->input->post('user_id')])->update('user', ['kyc_status' => '1']);
            
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to update kyc status',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function rejectKyc(){
		try {
			$res = $this->db->where(['user_id'=>$this->input->post('user_id')])->update('user', ['kyc_status' => '2']);
            
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to update kyc status',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function viewPendingKyc(){
		$response['res'] = $this->db->where(['admin_type'=>'Client'])->get('user')->result_array();
		$this->load->view('admin/pending-kyc', $response);
	}
	public function viewApproveKyc(){
		$this->load->view('admin/approved-kyc');
	}
}
