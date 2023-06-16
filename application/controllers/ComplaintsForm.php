<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComplaintsForm extends CI_Controller {

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

        $this->load->helper('email_helper');
        $this->load->library('mailer');  
        $body  = '<h2> Ticket Type -'. $this->input->post('type').'</h2><br/>
                <h4> From User -'. $this->input->post('name').'</h4><br/>
                <p>Message - '.$this->input->post('email').'</p><br/><br/>
                <p>Message - '.$this->input->post('message').'</p>
                Reply To User<a href="mailto:'.$this->input->post('email').'"> '.$this->input->post('email').'</a>';
        
        $email = send_email('complaints@equinoxtradingcapital.com', $this->input->post('subject'), $body,'','',8);

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
