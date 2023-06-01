<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('user/games');
	}
}
