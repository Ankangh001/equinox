<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

    public function index()
	{
		$response['res'] = $this->db->get('products')->result_array();
        $this->load->view('user/start-challenge', $response);
	}
}
