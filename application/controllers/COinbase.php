<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COinbase extends CI_Controller {
     // coinbase success api call 

    public function index(){
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
            if($responseStatus == 'COMPLETED'){
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