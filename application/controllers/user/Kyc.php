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
		print_r($_FILES);exit;
		// profile image
		if(@$_FILES['proofId']){
			$target_dir = "kyc/";
			$target_file = $target_dir .date('dmYHis'). basename($_FILES["profileImage"]["name"]);
			$uploadedFile = move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
			if ($uploadedFile) {
				$data['profile_image'] = $target_file;
			}
		}

		// $config['upload_path']="./kyc/";
        // $config['allowed_types']='gif|jpg|png';
        // $this->load->library('upload',$config);

        // if($this->upload->do_upload()){
		// 	$data = array('upload_data' => $this->upload->data());
		// 	// $data1 = array(
		// 	// 	'menu_id' => $this->input->post('selectmenuid'),
		// 	// 	'submenu_id' => $this->input->post('selectsubmenu'),
		// 	// 	'imagetitle' => $this->input->post('imagetitle'),
		// 	// 	'imgpath' => $data['upload_data']['file_name']
        // 	// );  
		// 	echo "Hi";
		// 	echo $data['upload_data']['file_name'];die;
		// 	// $result= $this->Admin_model->save_imagepath($data1);
		// 	// if ($result == TRUE) {
		// 	// }
		// }
	}
}
