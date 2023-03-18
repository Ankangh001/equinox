<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
        $this->load->helper('url');
	}
	public function index()
	{
        $key="1880552eee07498a602ac7b6fbcd94b2c256b163";
        $country = "USD";
        $link="https://api.nomics.com/v1/currencies/ticker?key=".$key."&ids=BTC,ETH&interval=1h,30d&convert=".$country."&per-page=100&page=1";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$link);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        print_r($result);
        exit;
     
    }
    
}