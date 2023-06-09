<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactForm extends CI_Controller {

	public function index()
	{     

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'complaintType' => $this->input->post('complaintType'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'type' => $this->input->post('type'),
            'created_at' => date('Y-m-d H:m:s')
        );

        $res = $this->db->insert('contact_form', $data);

        if($res){
            $response = array(
                "status" => 200,
                "message" => "Thank You for subscribing"
            );
        }	
        else{
            $response = array(
                "status" => 400,
                "message" => "Some error occured!"
            );
        }

        echo json_encode($response);
	}
}
