<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends CI_Controller {

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
