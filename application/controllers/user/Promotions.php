<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $res['res'] = $this->db->get('promotions')->result_array();
        $this->load->view('user/promotions',$res);
	}
}
