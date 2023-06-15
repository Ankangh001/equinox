<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserStats extends CI_Controller {

    public function index()
	{
        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['product_status' => '1']);
        $check = $this->db->get()->result_array();

        // echo "<pre>";
        // print_r($check);

        // echo $check[0]['account_size'].'<br/>';
        // echo $check[0]['email'].'<br/>';
        // echo $check[0]['phase'].'<br/>';

        // exit;
        
        foreach ($check as $key => $value) {
            $res = $this->accounts($value['account_id'],  $value['account_password'], $value['ip'], $value['port']);
            $data = json_decode($res, true);
            $equity = $data['equity'];
            $balance = $data['balance']-$value['account_size'];
            $saveTodb = $this->db->where(['id'=>$value['id']])
                ->update('userproducts',[
                    'equity' => $equity,
                    'balance' => $equity
                ]);
        }
	}

    //---mt5 swagger api call to get account info----
    public function accounts($accountId, $password, $host, $port){
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$accountId.'&password='.$password.'&host='.$host.'&port='.$port);
        $accountSummary = $this->accountSummary($token);
        $orderHistory = $this->OrderHistory($token);
        $openedOrders = $this->OpenedOrders($token);
        $mergedArray = array_merge(json_decode($accountSummary, true),json_decode($orderHistory, true));
        $data = array_merge($mergedArray, array('openorders'=>json_decode($openedOrders, true)));
        return json_encode($data, true);
    }
    public function accountSummary($token){
        return $this->get_curl('https://mt5.mtapi.be/AccountSummary?id='.$token);
    }
    public function OpenedOrders($token){
        return $this->get_curl('https://mt5.mtapi.be/OpenedOrders?id='.$token);
    }
    public function OrderHistory($token){
        return $this->get_curl('https://mt5.mtapi.be/OrderHistory?id='.$token.'&from=1900-01-01T12%3A00%3A00&to=2100-09-01T01%3A00%3A00');
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
    //---mt5 swagger api call to get account info----

}
?>