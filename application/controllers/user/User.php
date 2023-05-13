<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends APIMaster {

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->validateUserSession();
    // }

	public function index()
	{
		$this->load->view('user/index');
	}
    
    public function accountOverview()
    {
        $this->load->view('user/account-overview');
        
    }
}
