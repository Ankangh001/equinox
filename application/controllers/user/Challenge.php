<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends CI_Controller {

	public function index()
	{
        $this->load->view('user/start-challenge');
	}
}
