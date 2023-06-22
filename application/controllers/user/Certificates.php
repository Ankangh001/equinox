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
        $response['res'] = $this->db->where(['phase' => '3'])->get()->result_array();
        $response['certificates'] = $this->db->where(['payout_status' => '1', 'user_id' => $_SESSION['user_id']])->get('payout_history')->result_array();

        $this->load->view('user/certificates', $response);
	}

    public function getPayoutCertificates()
	{
        $res = $this->db->where(['payout_status' => '1', 'user_id' => $_SESSION['user_id']])->get('payout_history')->result_array();

        if($res){
            $response = array(
                'status' => 200,
                'data' => $res
            );
        }else{
            $response = array(
                'status' => 200,
                'data' => 'no certificates yet'
            );
        }
        echo json_encode($response);
	}
}
