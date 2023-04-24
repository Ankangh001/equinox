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

	public function quotes()
	{
		$this->load->view('quotes');
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

	public function contact()
	{
		$this->load->view('contact');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function scalingPlan()
	{
		$this->load->view('scalingPlan');
	}
	public function maerketData()
	{
		$this->load->view('maerketData');
	}

	public function calculators()
	{
		$this->load->view('calculators');
	}
}
