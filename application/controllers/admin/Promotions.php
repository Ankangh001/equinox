<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('admin/promotions');
	}

    public function save()
	{
        {
            try {
                $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('desc'),
                    'created_at' => $this->input->post('date')
                );
    
                $res = $this->db->insert('promotions', $data);
    
                if($res){
                    $response = array(
                        'status' => '200',
                        'message' => 'Added successfully',
                    );
                }else{
                    $response = array(
                        'status' => '400',
                        'message' => 'Unable to add data',
                    );
                }
                echo json_encode($response);  
    
            } catch (\Throwable $th) {
                $res = $th;
            }
    
        }
	}

    public function get(){
		$res = $this->db->get('promotions')->result_array();
        if($res){
            $response = array(
                'status' => '200',
                'data' => $res,
            );
        }else{
            $response = array(
                'status' => '400',
                'message' => 'Unable to get data',
            );
        }
        echo json_encode($response);  
    }
}
