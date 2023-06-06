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
}
