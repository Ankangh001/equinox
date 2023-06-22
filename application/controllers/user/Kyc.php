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
		$resp['res'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('user')->result_array();

        $this->load->view('user/account-kyc', $resp);
	}

    public function addKyc(){
		//kyc status 
		// not applied = 0
		// applied = 1 = pending from admin
		// approved = 2
		// rejected = 3
		if(@$_FILES['proofId']){
			$target_dir = "kyc/";
			$target_file = $target_dir .date('dmYHis'). basename($_FILES["proofId"]["name"]);
			$uploadedFile = move_uploaded_file($_FILES["proofId"]["tmp_name"], $target_file);
			if ($uploadedFile) {
				$data['kyc_doc'] = $target_file;
			}
		}

		if(@$_FILES['adhar']){
			$target_dir = "kyc/";
			$target_file = $target_dir .date('dmYHis'). basename($_FILES["adhar"]["name"]);
			$uploadedFile = move_uploaded_file($_FILES["adhar"]["tmp_name"], $target_file);
			if ($uploadedFile) {
				$data['kyc_adhar'] = $target_file;
			}
		}
		
		$data['kyc_status'] = 1;
		
		$resp = $this->db->where(['user_id' => $_SESSION['user_id']])->update('user', $data);

		if ($resp == true) {
			$response = [
				'status' => 200,
				'message' => 'KYC applied Successfully'
			];
		} else {
			$response = [
				'status' => 400,
				'message' => 'Some error occured! for KYC'
			];
		}
		echo json_encode($response);
	}
}
