<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactForm extends CI_Controller {

	public function index()
	{     
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email-add'),
            'complaintType' => $this->input->post('complaintType'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'type' => $this->input->post('type'),
            'created_at' => date('Y-m-d H:m:s')
        );

        $res = $this->db->insert('contact_form', $data);
        $lastId = $this->db->insert_id();

        $this->load->helper('email_helper');
        $this->load->library('mailer'); 

        $body  = '<h2> Ticket Type -'. $this->input->post('type').'</h2><br/>
                <h4> From User -'. $this->input->post('name').'</h4><br/>
                <p>Message - '.$this->input->post('email').'</p><br/><br/>
                <p>Message - '.$this->input->post('message').'</p>
                Reply To User<a href="mailto:'.$this->input->post('email').'"> '.$this->input->post('email').'</a>';


        $body2  = '
            <h2><strong>Dear'. $this->input->post('name').'</strong></h2>
            <br/>
            <br/>
            <p>
                Thank you for reaching us, we will try to resolve your ticket <strong>EQ'.$lastId.date('m-y-d').'<strong> as soon as possible <br/>
                Please find below your information regarding raised ticket.
            </p>
            <br/>
            <br/>
            <p>Your Message - '.$this->input->post('message').'</p>';
        
        $email = send_email('support@equinoxtradingcapital.com', $this->input->post('subject'), $body,'','',8);

        $userEmail = send_email($this->input->post('email'), "Equinox enquiry ticket", $body2,'','',2);

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
