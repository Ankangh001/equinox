<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kyc extends CI_Controller {

	public function index()
	{
        $this->load->view('user/account-kyc');
	}
}
