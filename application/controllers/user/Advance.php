<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advance extends CI_Controller {

	public function index()
	{
        $this->load->view('user/advance-chart');
	}
}
