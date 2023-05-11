<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webterminal extends CI_Controller {

	public function index()
	{
		$this->load->view('user/mt5-webterminal');
	}
    
}
