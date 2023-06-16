<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function pendingPassedAccounts()
	{
        $this->load->view('admin/pending-passed-accounts');
	}

    public function approvedPassedAccounts()
	{
        $this->load->view('admin/approved-passed-accounts');
	}

    public function getPendingPassedAccounts(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['product_status'=>'2', 'admin_account_status' => '0'])->get()->result_array();

		echo  json_encode($response);
	}

    public function getApprovedPassedAccounts(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['product_status'=>'2', 'admin_account_status' => '1'])->get()->result_array();

		echo  json_encode($response);
	}




    public function pendingFailedAccounts()
	{
        $this->load->view('admin/pending-failed-accounts');
	}

    public function approvedFailedAccounts()
	{
        $this->load->view('admin/approved-failed-accounts');
	}
    public function getPendingFailedAccounts(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['product_status'=>'3', 'admin_account_status' => '0'])->get()->result_array();

		echo  json_encode($response);
	}

    public function getApprovedFailedAccounts(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['product_status'=>'3', 'admin_account_status' => '1'])->get()->result_array();

		echo  json_encode($response);
	}



    public function toggleAccount(){
        $rowId =  $this->input->post('id');
        $acc_status =  $this->input->post('admin_account_status');

        if ($acc_status == 0) {
            $res = $this->db->where(['id' =>  $rowId])->update('userproducts', ['admin_account_status' => '1']);
        }else{
            $res = $this->db->where(['id' =>  $rowId])->update('userproducts', ['admin_account_status' => '0']);
        }

		
        if($res){
            $response = array(
                'status' => '200',
                'message' => 'Changed Status successfully',
            );
        }else{
            $response = array(
                'status' => '400',
                'message' => 'Unable to change status.',
            );
        }
        echo json_encode($response); 
	}
}
