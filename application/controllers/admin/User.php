<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('user/index');
	}
    
    public function accountOverview()
    {
        $this->load->view('user/account-overview');
        
    }
}
