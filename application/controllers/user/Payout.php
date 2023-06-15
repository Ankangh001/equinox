<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index(){
        $res['res'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('user')->result_array();
        $this->load->view('user/payout', $res);
	}

    public function getAccounts(){
        $user_id = $this->input->post('user_id');
        $res = $this->db->where(['user_id' => $user_id, 'phase' => '3'])->get('userproducts')->result_array();

        if($res){
			$response = array(
				'status' => '200',
				'message' => 'Added successfully',
                'data' => $res
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'You dont have any funded accounts yet.',
			);
		}
		echo json_encode($response);  
    }

	public function getAccountBalance(){
        $accountId = $this->input->post('number');
        $res = $this->db->where(['account_id' => $accountId, 'phase' => '3'])->get('userproducts')->result_array();

        if($res){
			$last_payout_date = $res[0]['payoutDate'];
			$add30days = date('Y-m-d H:m:s', strtotime($last_payout_date. ' +30 days'));
	
			$current_date = date('Y-m-d H:m:s');
	
			if($current_date > $add30days){ //can take payout
				$response = array(
					'status' => '200',
					'message' => 'success',
					'data' => $res
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => "Sorry! You can't request a payout now.",
					'data' => $res
				);
			}
		}else{
			$response = array(
				'status' => '400',
				'message' => 'You dont have any funded accounts yet.',
			);
		}
		
		echo json_encode($response);  
    }

	public function getPayouts(){
        $res['data'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('payout_history')->result_array();
		echo json_encode($res);  
    }

	public function requestPayout()
	{
		// print_r($this->input->post());die;
		$data = array(
			'user_id' => $this->input->post('user_id'),
			
			'payout_type' =>  $this->input->post('payoutType'),
			'mt5_accountNum' =>  $this->input->post('mt5Acc'),
			'payment_mode' =>  $this->input->post('paymentMode'),
			'amount' =>  $this->input->post('payoutAmount'),
			'wallet_address' =>  $this->input->post('emailWalletAddress'),
			
			//for bank transfer
			'receipant_name' =>  $this->input->post('receipantName'),
			'receipant_address' =>  $this->input->post('receipantAddress'),
			'account_iban' =>  $this->input->post('accountNumber'),
			'sort_code' =>  $this->input->post('sortCode'),
			'swift_code' =>  $this->input->post('swiftCode'),
			'bank_name' =>  $this->input->post('bankName'),
			'branch_address' =>  $this->input->post('branchAddress'),
			
			'payout_date' =>  date('Y-m-d H:m:s'),
		);

		
		$res = $this->db->insert('payout_history', $data);
		$res2 = $this->db->where(['account_id'=>$this->input->post('mt5Acc')])->update('userproducts',['payoutDate'=>date('Y-m-d H:m:s')]);

		if($res){
			$response = array(
				'status' => '200',
				'message' => 'Payout Added successfully',
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'Unable to add payout',
			);
		}
		echo json_encode($response);  
	}
}
