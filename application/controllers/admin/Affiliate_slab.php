<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate_slab extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $data['slab']=$this->db->get('affiliate_slab')->result_array();
        $this->load->view('admin/affiliate-slab',$data);
	}

    public function save(){
		if($_POST){
            foreach($_POST as $key=>$slab){
                $data = array(
                    'percentage' => $slab
                );
                $this->db->where(['auto_id' => $key])->update('affiliate_slab',$data);
            }
            $response = array(
                "success" => 1,
                "message" => "Updated Successfully"
            );
            $this->jsonOutput($response);
		}
	}

}
