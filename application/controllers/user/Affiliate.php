<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends CI_Controller {

	public function index()
	{
        $this->load->view('user/affiliate');
	}
}
