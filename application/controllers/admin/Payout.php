<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	
	public function pending()
	{
		$this->load->view('admin/pending');
	}

	public function getPendingPayouts()
	{
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'0'])->get()->result_array();
		echo  json_encode($response);
	}


	public function getPayout(){
		$payoutId = $this->input->post('payout_id');
		
		// $this->db->select('*');
        // $this->db->from('payout_history');
        // $this->db->join('user', 'payout_history.user_id=user.user_id');
        // $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		// $this->db->join('products', 'userproducts.product_id=products.product_id');
        // $response = $this->db->where(['payout_status'=>'0', 'payout_id'=>$payoutId])->get()->result_array();

        $response = $this->db->where(['payout_id'=>$payoutId])->get('payout_history')->result_array();
		echo json_encode($response);
	}

	public function approvePayout(){
		try {
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->update('payout_history', ['payout_status' => '1']);
            
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

	public function rejectPayout(){
		try {
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->update('payout_history', ['payout_status' => '2']);
            
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

	public function deletetPayout(){
		try {
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->delete('payout_history');
            
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


	//approved----------
	public function approved()
	{
		$this->load->view('admin/approved');
	}
	public function getApprovedPayouts()
	{
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'1'])->get()->result_array();
		echo  json_encode($response);
	}

	//declined-----------
	public function declined()
	{
        $this->load->view('admin/declined');
	}
	public function getDeclinedPayouts()
	{
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'2'])->get()->result_array();
		echo  json_encode($response);
	}
}
