<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends APIMaster {

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
		$this->load->view('user/index', $response);
	}

    public function updateProfile()
	{
        // print_r($this->input->post());
        $iD = $this->input->post('user_id');
        $data = array(
            'first_name' => $this->input->post('firstName'),
            'last_name' =>  $this->input->post('lastName'),
            'email' =>  $this->input->post('email'),
            'country' =>  $this->input->post('country'),
            'number' =>  $this->input->post('phoneNumber')
        );
        
        $res = $this->db->where(['user_id' =>  $iD])->update('user', $data);

        if($res){
            $response = array(
                'status' => '200',
                'message' => 'User profile updated successfully',
            );
        }else{
            $response = array(
                'status' => '400',
                'message' => 'Unable to update user',
            );
        }
        echo json_encode($response);
	}
    
    
}
