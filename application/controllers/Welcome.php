<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function faq()
	{
		$this->load->view('faq');
	}

	public function rules()
	{
		$this->load->view('rules');
	}
}
