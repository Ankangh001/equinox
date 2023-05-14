<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('admin/purchase-history');
	}

	public function freeTrial()
	{
        $this->load->view('admin/free-trial');
	}

	public function phase1()
	{
        $this->load->view('admin/phase-1');
	}

	public function phase2()
	{
        $this->load->view('admin/phase-2');
	}

	public function phase3()
	{
        $this->load->view('admin/phase-3');
	}

	public function completed()
	{
        $this->load->view('admin/completed');
	}
}
