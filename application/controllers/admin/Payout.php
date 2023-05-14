<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function approved()
	{
        $this->load->view('admin/approved');
	}

	public function pending()
	{
        $this->load->view('admin/pending');
	}

	public function declined()
	{
        $this->load->view('admin/declined');
	}
}
