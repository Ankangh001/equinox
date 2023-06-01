<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $this->load->view('user/certificates');
	}
}
