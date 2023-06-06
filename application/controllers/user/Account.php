<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends APIMaster {

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
        $this->db->where(['user_id' => $_SESSION['user_id']]);
        $response['res'] = $this->db->get()->result_array();

        $this->load->view('user/account-overview', $response);
	}

    public function freeTrial()
    {
        try {
			$checkFreetrial = $this->db->where(['user_id' => $_SESSION['user_id'],'product_id' => '1' ])->get('userproducts')->result_array();
			if(!$checkFreetrial){
				$userProducts = array(
					'user_id' => $this->input->post('id'),
					'product_id' => '1',
					'phase' => '0',
					'created_date' => date('Y-m-d H:m:s'),
					'product_status' => '0',
				);
	
				$transaction = array(
					'user_id' => $this->input->post('id'),
					'amount' => '0',
					'product_id' => '1',
					'product_category' => 'Free Trial',
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
			}else{
				$response = array(
					'status' => '401',
					'message' => 'You have already a free trial account.',
				);
			}

			
			echo json_encode($response);  

		} catch (\Throwable $th) {
			$res = $th;
		}
        
    }
}
