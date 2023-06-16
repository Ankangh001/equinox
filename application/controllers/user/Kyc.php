<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kyc extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $this->load->view('user/account-kyc');
	}

    public function addKyc(){
		
		$config['upload_path']          = './kyc/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('idProof'))
		{
			$response = array(
				'status' => '200',
				'message' => 'Added successfully',
			);
		}
		else
		{
			$response = array(
				'status' => '400',
				'message' => 'Added successfully',
			);
		}
		echo json_encode($response);  


        // profile image
        // if(@$_FILES['idProof']){
        //     $target_dir = "kyc/";
        //     $target_file = $target_dir .date('dmYHis'). basename($_FILES["idProof"]["name"]);
        //     $uploadedFile = move_uploaded_file($_FILES["idProof"]["tmp_name"], $target_file);
        //     if ($uploadedFile) {
        //         $data['idProof'] = $target_file;
        //     } 
        // }
        // //trainer doc
        // if(@$_FILES['adhar']){
        //     $target_dir2 = "kyc/";
        //     $target_file2 = $target_dir2 .date('dmYHis'). basename($_FILES["adhar"]["name"]);
        //     $uploadedFile2 = move_uploaded_file($_FILES["adhar"]["tmp_name"], $target_file2);
        //     if ($uploadedFile2) {
        //         $data['adhar'] = $target_file2;
        //     }
        // }

		// if($uploadedFile && $uploadedFile2){
		// 	$data = array(
		// 		'account_id' => $this->input->post('account_id'),
		// 		'account_password' =>  $this->input->post('account_password'),
		// 		'server' =>  $this->input->post('server'),
		// 		'ip' =>  $this->input->post('ip'),
		// 		'port' =>  $this->input->post('port'),
		// 		'product_status' =>  '1',
		// 		'equity' => $addEquity['equity']
		// 	);
	
		// 	$iD = $this->input->post('id');
			
		// 	$res = $this->db->where(['id' =>  $iD])->update('userproducts', $data);
	

		// 	//semding credentials email to user
		// 	$this->db->select('userproducts.user_id, user.email');
		// 	$this->db->from('userproducts');
		// 	$this->db->join('user', 'userproducts.user_id=user.user_id');
		// 	$this->db->where(['id' => $iD, 'payment_status' => '1']);
		// 	$check = $this->db->get()->result_array();

		// 	$this->send_credentials_email($check[0]['email'], $this->input->post('account_id'), $this->input->post('account_password'), $this->input->post('server'), $addEquity['balance']);

		// 	if($res){
		// 		$response = array(
		// 			'status' => '200',
		// 			'message' => 'Added successfully',
		// 		);
		// 	}else{
		// 		$response = array(
		// 			'status' => '400',
		// 			'message' => 'Unable to add data',
		// 		);
		// 	}
		// 	echo json_encode($response);  
		// }else{
		// 	$response = array(
		// 		'status' => '401',
		// 		'message' => 'Wrong Account Credentials',
		// 	);
		// 	echo json_encode($response);  
		// }
	}
}
