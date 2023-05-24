<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metrix extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index(){
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user=62333850&password=tecimil4&host=78.140.180.198&port=443');

        $accountSummary = $this->accountSummary($token);
        $orderHistory = $this->OrderHistory($token);
        $openedOrders = $this->OpenedOrders($token);

        $mergedArray = array_merge(json_decode($accountSummary, true),json_decode($orderHistory, true));
        
        $data['res'] = array_merge($mergedArray, json_decode($openedOrders, true));
        
        $this->load->view('user/metrix', $data);
    }

    public function accountSummary($token){
        return $this->get_curl('https://mt5.mtapi.be/AccountSummary?id='.$token);
    }

    public function OpenedOrders($token){
        return $this->get_curl('https://mt5.mtapi.be/OpenedOrders?id='.$token);
    }

    public function OrderHistory($token){
        return $this->get_curl('https://mt5.mtapi.be/OrderHistory?id='.$token.'&from=2022-01-01T12%3A00%3A00&to=2022-09-01T01%3A00%3A00');
    }

    public function userMetrix()
	{
        
        $account =  $this->input->post('num');
        $url = "https://www.fxblue.com/users/".$account."/overviewscript";
        $response = file_get_contents($url);
        $pattern = '/document.MTIntelligenceAccounts.push\((.*?)\);/s';
        preg_match($pattern, $response, $matches);

        if (isset($matches[1])) {
            $json = $matches[1];
            $data = json_decode($json, true);
            $userId = $data['userid'];
            $balance = $data['balance'];
            $equity = $data['equity'];
            echo $json;
            // echo "User ID: $userId\n";
            // echo "Balance: $balance\n";
            // echo "Equity: $equity\n";
        }
	}

    public function get_curl($url){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
        'content-type: text/plain; charset=utf-8 ',
        'date: Wed24 May 2023 04:41:15 GMT ',
        'strict-transport-security: max-age=15724800; includeSubDomains'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
