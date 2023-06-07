<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $this->load->view('user/payout');
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
			$response = array(
				'status' => '200',
				'message' => 'success',
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

	public function requestPayout()
	{
		// print_r($this->input->post());die;
// 		Array
// (
//     [payoutType] => Profit Split
//     [accountNum] => 850760
//     [paymentMode] => 1
//     [payoutAmount] => 776
//     [emailAddress] => test@gg.com
//     [receipantName] => 
//     [receipantAddress] => 
//     [accountNumber] => 
//     [sortCode] => 
//     [swiftCode] => 
//     [bankName] => 
//     [branchAddress] => 
// )

		$data = array(
			'account_id' => $this->input->post('payoutType'),
			'account_password' =>  $this->input->post('account_password'),
			'server' =>  $this->input->post('server'),
			'ip' =>  $this->input->post('ip'),
			'port' =>  $this->input->post('port'),
			'product_status' =>  '1',
		);

		$iD = $this->input->post('id');
		
		$res = $this->db->where(['id' =>  $iD])->update('userproducts', $data);

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
}
