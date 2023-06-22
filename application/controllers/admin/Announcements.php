<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('admin/announcements');
	}

    public function save()
	{
        try {
            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('desc'),
                'created_at' => $this->input->post('date')
            );

            $res = $this->db->insert('announcements', $data);

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

            // $users = $this->db->where(['admin_type' => 'Client'])->get('user')->result_array();

            // foreach ($users as $key => $value) {
            //     $this->load->helper('email_helper');
            //     $this->load->library('mailer');  
            //     $body  = '<h2>'.$this->input->post('title').'</h2><br/>
                        
            //             <p>'.$this->input->post('desc').'</p><br/><br/>
            //             <p>'.$this->input->post('date').'</p>';
                
            //     $email = send_email($value['email'], $this->input->post('subject'), $body,'','',2);
            // }

            echo json_encode($response);  

        } catch (\Throwable $th) {
            $res = $th;
        }
    
        
	}

    public function get(){
		$res = $this->db->get('announcements')->result_array();
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
