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
		$res['announcements'] = $this->db->get('announcements')->result_array();
		$this->load->view('notice', $res);
	}

	public function quotes()
	{
		$this->load->view('quotes');
	}

	public function calender()
	{
		$this->load->view('calender');
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

	public function tools()
	{
		$this->load->view('tools');
	}

	public function webTerminal()
	{
		$this->load->view('webTerminal');
	}

	public function complaints()
	{
		$this->load->view('complaints');
	}

	public function advanceChart()
	{
		$this->load->view('advance-chart');
	}

	public function promotion()
	{
		$res['promotions'] = $this->db->get('promotions')->result_array();
		$this->load->view('promotion', $res);
	}

	public function service()
	{
		$this->load->view('service');
	}

	public function policy()
	{
		$this->load->view('policy');
	}

	public function refund()
	{
		$this->load->view('refund');
	}

	public function disclosure()
	{
		$this->load->view('disclosure');
	}

	public function liveAccount()
	{
		$this->load->view('liveAccount');
	}

	public function cookie()
	{
		$this->load->view('cookie');
	}

	public function test()
	{
		$url = "https://www.fxblue.com/users/51634880/overviewscript";
		$response = file_get_contents($url);
		$pattern = '/document.MTIntelligenceAccounts.push\((.*?)\);/s';
		preg_match($pattern, $response, $matches);

		if (isset($matches[1])) {
			$json = $matches[1];
			$data = json_decode($json, true);
			$userId = $data['userid'];
			$balance = $data['balance'];
			$equity = $data['equity'];
			echo "User ID: $userId\n";
			echo "Balance: $balance\n";
			echo "Equity: $equity\n";
		}
	}

	public function gettest()
	{
		$this->load->view('test');
	}
}
