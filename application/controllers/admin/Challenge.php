<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('admin/challenge');
	}

	public function addChallenge()
	{
        $this->load->view('admin/add-challenge');
	}
}
