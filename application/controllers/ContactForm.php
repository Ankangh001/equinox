<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactForm extends CI_Controller {

	public function index()
	{     
        $ticketID = 'EQ'.rand(10,100).date('m-y-d');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email-add'),
            'complaintType' => $this->input->post('complaintType'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'type' => $this->input->post('type'),
            'created_at' => date('Y-m-d H:m:s'),
            'ticketId' => $ticketID,
        );
        $userEmail = $this->input->post('email-add');

        $res = $this->db->insert('contact_form', $data);

        $this->load->helper('email_helper');
        $this->load->library('mailer'); 

        $body  = '
                <h2> Ticket ID -'.$ticketID.'</h2><br/>
                <h2> Ticket Type -'. $this->input->post('type').'</h2><br/>
                <h4> From User -'. $this->input->post('name').'</h4><br/>
                <p>Message - '.$this->input->post('email').'</p><br/><br/>
                <p>Message - '.$this->input->post('message').'</p>
                <a href="mailto:'.$userEmail.'"><button>Reply To User</button></a>
            ';


        $body2  = '
            <h2>Dear <strong> '. $this->input->post('name').',</strong></h2>
            <br/>
            <p>
            Thank you for reaching us,
            <br/>
            we will try to resolve your ticket <strong>'.$ticketID.'</strong> as soon as possible <br/>
            Please find below your information regarding raised ticket.
            </p>
            <br/>
            <br/>
            <p>Your Message - <br/>'.$this->input->post('message').'</p>';
        
        send_email('support@equinoxtradingcapital.com', $this->input->post('subject'), $body,'','',8);

        send_email($userEmail, "Equinox enquiry ticket", $body2,'','',2);

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
