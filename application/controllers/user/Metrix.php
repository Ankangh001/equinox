<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metrix extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index(){
        $this->load->view('user/metrix');
    }
    
    public function accounts(){
        $response = base64_decode($this->input->post('r'));
        $decrypted = json_decode($response, true);
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$decrypted['ieqd'].'&password='.$decrypted['peqd'].'&host='.$decrypted['ieqp'].'&port='.$decrypted['peqt']);
        $accountSummary = $this->accountSummary($token);
        $orderHistory = $this->OrderHistory($token);
        $openedOrders = $this->OpenedOrders($token);
        $mergedArray = array_merge(json_decode($accountSummary, true),json_decode($orderHistory, true));
        $data = array_merge($mergedArray, array('openorders'=>json_decode($openedOrders, true)));
        echo json_encode($data, true);
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

    public function saveStartDate(){
        $start_date =  $this->input->post('date');
        $end_date = date('Y-m-d', strtotime($start_date. ' +30 days'));
        $data = array(
            'start_date' => $start_date,
            'end_date' => $end_date
        );
        $res = $this->db->where(['user_id'=>$_SESSION['user_id']])->update('userproducts', $data);
        if($res){
            $response = array(
                'status'=> 200,
                'message'=>'start date and end date added successfully'
            );
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Error adding start date and end date to database'
            );
        }
        echo json_encode($response);
    }

    public function checkIfFail(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '1']);
        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        //0 = failed
        //1 = pass
        if($check[0]['maxdd_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Failed'
            );
        }elseif($check[0]['maxdd_status'] == 1){
            $response = array(
                'status'=> 400,
                'message'=>'User Not Failed'
            );
        }

        echo json_encode($response);
    }
    

    public function userFailed(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        //0 = failed
        //1 = pass
        if($check[0]['maxdd_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Already Failed'
            );
        }elseif($check[0]['maxdd_status'] == 1){
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '0', 'product_status' => '3']);
            if($update){
                $response = array(
                    'status'=> 200,
                    'message'=>'User Made Failed'
                );
            }
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Server Error !'
            );
        }

        echo json_encode($response);
    }


    public function checkFailPt(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        
        //0 = failed
        //1 = pass
        if($check[0]['target_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Failed'
            );
        }elseif($check[0]['target_status'] == 1){
            $response = array(
                'status'=> 400,
                'message'=>'User Not Failed'
            );
        }
        echo json_encode($response);
    }
    

    public function userFailedPT(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        //0 = failed
        //1 = pass
        if($check[0]['maxdd_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Already Failed'
            );
        }elseif($check[0]['maxdd_status'] == 1){
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '0', 'product_status' => '3']);
            if($update){
                $response = array(
                    'status'=> 200,
                    'message'=>'User Made Failed'
                );
            }
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Server Error !'
            );
        }
        echo json_encode($response);
    }

    public function getEquity(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        $equity = $check[0]['equity'];
        
        //0 = failed
        //1 = pass
        if($check){
            $response = array(
                'status'=> 200,
                'message'=>'success',
                'equity'=>$equity
            );
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'error'
            );
        }
        echo json_encode($response);
    }
}
