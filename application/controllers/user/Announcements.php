<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

	public function index()
	{
        $this->load->view('user/announcements');
	}
}
