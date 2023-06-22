<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $check['res'] = $this->db->where([
            'user_id' => $_SESSION['user_id'
            ]])->get('user')->result_array();
        $this->load->view('user/profile', $check);
	}
}
