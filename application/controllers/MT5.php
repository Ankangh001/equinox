<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use Tarikh\PhpMeta\MetaTraderClient;



class MT5 extends CI_Controller {

	public function index()
	{
		$server = "8.208.91.123";
		$port = 443;
		$login = "30001";
		$password = "3jrgkcos";
		// $exampleLogin = 21001480007;


		$api = new MetaTraderClient($server, $port, $login, $password, false);
		// echo "<pre>";
		// var_dump($this->$api->chartGet());
		// die;
		$symbol = 'EURUSD';
		$from = 1677710460;
		$to = 1678576993;
		$chartBar = $api->chartGet($symbol, $from, $to);
		
		var_dump($chartBar);

	}
}
