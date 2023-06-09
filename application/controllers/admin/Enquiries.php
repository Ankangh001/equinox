<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

    public function index()
	{
        $response['res'] = $this->db->get('contact_form')->result_array();

        $this->load->view('admin/enquiries',$response);
	}

    public function complaints()
	{
        $response['res'] = $this->db->get('contact_form')->result_array();

        $this->load->view('admin/complaints',$response);
	}
}
