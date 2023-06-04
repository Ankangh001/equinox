<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $res['res'] = $this->db->get('announcements')->result_array();
        $this->load->view('user/announcements', $res);
	}
}
