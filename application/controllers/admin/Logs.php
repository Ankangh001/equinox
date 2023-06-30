<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

    public function index(){
        
    }
	public function viewlogs(){
        $this->load->view('admin/logs');
	}

    public function allAccounts(){
        $this->load->view('admin/all-accounts');
	}

    public function getAccounts(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['payment_status' =>'1'])->get()->result_array();

		echo  json_encode($response);
	}

    public function getLogs(){
        $response['data'] = $this->db->get('metrics_cron_job')->result_array();
		echo json_encode($response);
	}
}
