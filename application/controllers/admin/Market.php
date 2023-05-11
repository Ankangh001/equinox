<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

	public function index()
	{
        $this->load->view('user/market-data-analysis');
	}
}
