<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function faq()
	{
		$this->load->view('faq');
	}

	public function rules()
	{
		$this->load->view('rules');
	}
	
	public function testimonial()
	{
		$this->load->view('testimonial');
	}

	public function notice()
	{
		$this->load->view('notice');
	}

	public function symbol()
	{
		$this->load->view('symbol');
	}

	public function calender()
	{
		$this->load->view('calender');
	}

	public function client()
	{
		$this->load->view('client');
	}

	public function clientSignup()
	{
		$this->load->view('client-signup');
	}

	public function affiliate()
	{
		$this->load->view('affiliate');
	}

	public function payouts()
	{
		$this->load->view('payouts');
	}
}
