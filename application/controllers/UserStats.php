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
                    'balance' => $balance
                ]);
        }

        $this->coinbaseSuccess();
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

     // coinbase success api call 

     public function coinbaseSuccess(){

        $coinbaseCode = $this->db->select('id,user_id,amount,product_id,payment_code')->where(['gateway'=>'coinbase','payment_status'=>0])->get('transactions')->result_array();

        foreach($coinbaseCode as $code){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.commerce.coinbase.com/charges/'.$code['payment_code'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'X-CC-Version: 2018-03-22',
                    'X-CC-Api-Key: 408fe58b-6bc2-428e-84b4-b87bd44e3a07'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $response = json_decode($response,true);
            $responseStatus = end($response['data']['timeline'])['status'];
            if($responseStatus == 'Completed'){
                $payment_code = $response['data']['code'];
                $this->db->where(['payment_code'=> $payment_code])->update('userproducts',['payment_status'=>1]);
                $this->db->where(['payment_code'=> $payment_code])->update('transactions',['payment_status'=>1]);

                $affiliate_by = $this->db->where(['user_id' => $code['user_id']])->get('user')->row_array()['reffered_by'];
                $affiliate_user = $this->db->where(['affiliate_code' => $affiliate_by])->get('user')->row_array();
                if(!empty($affiliate_user)){
                    $affiliate_user_count = $this->db->where(['user_id' => $affiliate_user['user_id'],'txn_type' => 3])->get('transactions')->num_rows();
                    $query = "SELECT percentage FROM affiliate_slab WHERE $affiliate_user_count BETWEEN min_range AND max_range";
                    $affiliate_percentage = $this->db->query($query)->row_array()['percentage'];
                    
                    $transaction = array(
                        'user_id'       =>  $affiliate_user['user_id'],
                        'amount'        =>  (($code['amount']*$affiliate_percentage)/100),
                        'product_id'    =>  $code['product_id'],
                        'flag'          =>  0,
                        'txn_type'      =>  3,
                        'ref_id'        =>  $code['id'],
                        'comments'      =>  'referral amount',
                        'purchase_date' =>  date('Y-m-d H:m:s'),
                        'updated_at'    =>  date('Y-m-d H:m:s'),
                    );
                    
                    $this->db->insert('transactions', $transaction);
                }
            }
        }
    }

    // coinbase success api call end 
}
?>