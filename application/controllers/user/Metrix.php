<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metrix extends APIMaster {

	public function __construct(){
        parent::__construct();
        $this->verifyAuth();
    }
	public function index(){
        $this->load->view('user/metrix');
    }
    
    //----------- api call-------
    public function accounts(){
        $response = base64_decode($this->input->post('r'));
        $decrypted = json_decode($response, true);
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$decrypted['ieqd'].'&password='.$decrypted['peqd'].'&host='.$decrypted['ieqp'].'&port='.$decrypted['peqt']);
        $response = json_decode($token, JSON_PRETTY_PRINT);

        $file_path = 'accounts';
        $filename = 'accounts_'.date('Y-m-d H:m:s').'.log';
        $logsData = array(
            date('Y-m-d H:m:s') => array(
                'request'=>$token,
                'response'=>$response
            )
        );
        $this->createLog($file_path, $filename, $logsData);

        if(isset($response['message'])){
            echo json_encode(array('status'=> '400'));
        }else{
            $accountSummary = $this->accountSummary($token);
            $orderHistory = $this->OrderHistory($token);
            $openedOrders = $this->OpenedOrders($token);
            $mergedArray = array_merge(json_decode($accountSummary, true),json_decode($orderHistory, true));
            $data = array_merge($mergedArray, array('openorders'=>json_decode($openedOrders, true)));
            echo json_encode($data, true);
        }
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
    //----------- api call ends-------

    //----save start and end date---
    public function saveStartDate(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        
        $start_date =  $this->input->post('saveStartDate')['date'];
        $end_date = date('Y-m-d H:m:s', strtotime($start_date. ' +30 days'));
        $data = array(
            'start_date' => $start_date,
            'end_date' => $end_date
        );
        $res = $this->db->where(['id'=>$decrypted['eqid']])->update('userproducts', $data);
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

    //----save start and end date---
    public function check_account_expiry(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        
        $end_date = $check[0]['end_date'];
        $current_date = date('Y-m-d H:m:s');
        
        $res = 0;
        if($check[0]['product_status'] != '4'){
            if($current_date > $end_date){
                $res = $this->db->where(['id'=>$decrypted['eqid']])
                ->update('userproducts', ['product_status' => '4', 'account_status' => '0']);
            }
            if($res){
                $response = array(
                    'status'=> 200,
                    'message'=>'account expired, product status updated'
                );
            }else{
                $response = array(
                    'status'=> 400,
                    'message'=>'nothing changed'
                );
            }
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'not checking any more already expired!'
            );
        }
        
        echo json_encode($response);
    }

    //--- PASS MAXIMUM DRAWDOWN ---
    public function maxDDPass(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];

        //0 = failed
        //1 = initial pass
        //2 = permanent pass
        //3 = permanent fail
        //4 = fluctuate pass
        if($check[0]['maxdd_status'] == 3){
            $response = array(
                'status'=> 400,
                'message'=>'User permanently failed in Maximum drawdown'
            );
        }elseif($check[0]['maxdd_status'] == 1){
            // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '2']);
            $response = array(
                'status'=> 200,
                'message'=>'User still pass for Maximum Drawdown!'
            );
        }
        echo json_encode($response);
    } 
    // --- FAIL MAX DRAWDOWN ---
    public function make_userFail_for_maxDrawdown(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
 
        $this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];
        $name = $check2[0]['first_name'].' '.$check2[0]['last_name'];
        $account = $check2[0]['account_id'];
        //0 = failed
        //1 = pass
        //2 = permanent pass
        //3 = permanent fail
        if($check[0]['maxdd_status'] == 1 && $check[0]['metrics_status'] != 1){
            $update = $this->db->where(['id' => $decrypted['eqid']])
            ->update('userproducts', ['maxdd_status' => '3', 'product_status' => '3', 'target_status'=> '3']);
            $this->send_user_email($email, "FAIL", "1", $name, $account, "");
        }else{
            $update = 0;
        }
        
        if($update){
            $response = array(
                'status'=> 200,
                'message'=>'User Made Failed permanently !'
            );
        }else{
            $response = array(
                'status'=> 200,
                'message'=>'Server Error !, unable to fail user'
            );
        }

        echo json_encode($response);
    }


    public function makeUserPassProfitTarget(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        $this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];
        $name = $check2[0]['first_name'].' '.$check2[0]['last_name'];
        $account = $check2[0]['account_id'];

        //0 = failed
        //1 = pass
        //2 = permanent pass
        //3 = permanent fail

        if($check[0]['target_status'] == 3){
            $response = array(
                'status'=> 400,
                'message'=>'User permanently failed in profit target'
            );
        }else{
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['target_status' => '2']);
            $response = array(
                'status'=> 200,
                'message'=>'User made permanently pass for profit target!'
            );
        }
        echo json_encode($response);
    }
    public function userFailedPT(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];
        
        if($check[0]['target_status'] == 2 && $check[0]['metrics_status'] == 1){
            $response = array(
                'status'=> 200,
                'message'=>'User pass in profit target, cant be failed'
            );
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'no change in profit target'
            );
        }
        
        echo json_encode($response);
    }

    public function makeMaxDailylossFail(){
        
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
 
        $this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];
        $name = $check2[0]['first_name'].' '.$check2[0]['last_name'];
        $account = $check2[0]['account_id'];
        //0 = failed
        //1 = pass
        //2 = permanent pass
        //3 = permanent fail
        if($check[0]['maxDl_status'] == 1 && $check[0]['metrics_status'] != 1){
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxDl_status' => '3', 'product_status' => '3', 'target_status'=> '3']);
            $this->send_user_email($email, "FAIL", "2", $name, $account, "");
        }else{
            $update = 0;
        }
        
        if($update){
            $response = array(
                'status'=> 200,
                'message'=>'User Made Failed permanently !'
            );
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Server Error !, unable to fail user'
            );
        }
        echo json_encode($response);
    }
    public function pass_max_dailyLoass(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];

        //0 = failed
        //1 = initial pass
        //2 = permanent pass
        //3 = permanent fail
        //4 = fluctuate pass
        if($check[0]['maxDl_status'] == 3){
            $response = array(
                'status'=> 400,
                'message'=>'User permanently failed in Maximum drawdown'
            );
        }elseif($check[0]['maxDl_status'] == 1){
            // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxDl_status' => '2']);
            $response = array(
                'status'=> 200,
                'message'=>'User still pass for Maximum Drawdown!'
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
    // --not in use------
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

    //user status controller
    public function checkUserStatus(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        $this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check = $this->db->get()->result_array();

        // print_r($check);die;
        // $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        if($check){
            
            $maxdd_status = $check[0]['maxdd_status'];
            $maxDl_status = $check[0]['maxDl_status'];
            $target_status = $check[0]['target_status'];
            $metrics_status = $check[0]['metrics_status'];
            $phase = $check[0]['phase'];
            $product_category = $check[0]['product_category'];
            $email = $check[0]['email'];
            $name = $check[0]['first_name'].' '.$check[0]['last_name'];
            $account = $check[0]['account_id'];

            //0 = failed
            //1 = pass
            //2 = permanent pass
            //3 = permanent fail

            if($product_category == 'Aggressive'){
                if($phase == '1') {
                    if($maxdd_status == 1 && $target_status == 2 && $metrics_status == 0){
                        //--move to phse 2
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2', 'metrics_status'=> '1']);
                
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
                        
                        $deactiveAccount = $this->deactiveAccount($requestData);
                        $accountCreate = $this->autoAccountCreate($requestData, "");

                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '2',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '1',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'payment_status' => $check[0]['payment_status'],

                            'account_id' => $accountCreate['account_num'],
                            'account_password' =>  $accountCreate['password'],
                            'server' =>  $accountCreate['server'],
                            'ip' =>  $accountCreate['ip'],
                            'port' =>  $accountCreate['port'],
                            'equity' => $accountCreate['equity'],
                        );

                        $res = $this->db->insert('userproducts', $userProducts);

                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase-1 for aggressive product',
                        );                           
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'account not passed phase-1 yet',
                        );  
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2', 'metrics_status'=> '1']);
                       
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
                        
                        $accountCreate = $this->autoAccountCreate($requestData, "1");
                        $deactiveAccount = $this->deactiveAccount($requestData);

                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '3',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '1',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'payment_status' => $check[0]['payment_status'],

                            'account_id' => $accountCreate['account_num'],
                            'account_password' =>  $accountCreate['password'],
                            'server' =>  $accountCreate['server'],
                            'ip' =>  $accountCreate['ip'],
                            'port' =>  $accountCreate['port'],
                            'equity' => $accountCreate['equity'],
                        );

                        $res = $this->db->insert('userproducts', $userProducts);

                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase-2 for aggressive product',
                        );                           
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'User id: '.$check[0]['user_id'].' account not passed phase-2 yet',
                        );  
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1 && $metrics_status == 0){
                        // no phase after this
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        // $this->send_user_email($email, "PASS", "FUNDED", $name, $account);
                        
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed funded phase for aggressive product',
                        );                          
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'User id: '.$check[0]['user_id'].' account not passed phase-3 yet',
                        );  
                    }
                }
            }elseif ($product_category == 'Normal') {
                if($phase == '1') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status == 2 && $metrics_status == 0){
                        //--move to phse 2
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
                        
                        $deactiveAccount = $this->deactiveAccount($requestData);
                        $accountCreate = $this->autoAccountCreate($requestData, "");

                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '2',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '1',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'payment_status' => $check[0]['payment_status'],

                            'account_id' => $accountCreate['account_num'],
                            'account_password' =>  $accountCreate['password'],
                            'server' =>  $accountCreate['server'],
                            'ip' =>  $accountCreate['ip'],
                            'port' =>  $accountCreate['port'],
                            'equity' => $accountCreate['equity'],
                        );

                        $res = $this->db->insert('userproducts', $userProducts);

                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase1 for normal product',
                        );                             
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'account not passed phase-1 yet or normal',
                        );  
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
                        
                        $accountCreate = $this->autoAccountCreate($requestData, "1");
                        $deactiveAccount = $this->deactiveAccount($requestData);

                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '3',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '1',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'payment_status' => $check[0]['payment_status'],

                            'account_id' => $accountCreate['account_num'],
                            'account_password' =>  $accountCreate['password'],
                            'server' =>  $accountCreate['server'],
                            'ip' =>  $accountCreate['ip'],
                            'port' =>  $accountCreate['port'],
                            'equity' => $accountCreate['equity'],
                        );

                        $res = $this->db->insert('userproducts', $userProducts);


                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase2 for nonrmal product',
                        );                          
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'account not passed phase-1 yet',
                        );  
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $metrics_status == 0){
                        // no phase after this
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        // $this->send_user_email($email, "PASS", "FUNDED", $name, $account);
                        
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase3 he/she can do a payout now',
                        );                         
                    }else{
                        $response = array(
                            'status'=> 400,
                            'message'=>'account not passed phase-3 yet',
                        );  
                    }
                }
            }else{
                $response = array(
                    'status'=> 400,
                    'message'=>'User account no passed yet'
                );
            }
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Data not found user might be failed'
            );
        }
        echo json_encode($response);
    }


    //send mail for passing phases
    //violation_type = 0,1,2
	public function send_user_email($user_email, $stage, $violation_type, $name, $account){
		$this->load->helper('email_helper');
		$this->load->library('mailer');

        if ($stage == "PASS") {
            $body = file_get_contents(base_url('assets/mail/accountPassed.html'));

            if($violation_type == "FUNDED"){
                $content = '
                <tbody>
                    <tr>
                    <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;" align="left">
                        <div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 35.2px;">Hello '.$name.',</span></p><br>
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">Congratulations once again.</span></p><br>
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">We would like to congratulate you on achieving the target within time frame and with proper risk management.</span></p><br>
                        </div>
                    </td>
                    </tr>
                </tbody>
                ';
            }else{
                $content = '
                <tbody>
                    <tr>
                    <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;" align="left">
                        <div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 35.2px;">Hello '.$name.',</span></p><br>
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">Congratulations once again.</span></p><br>
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">We would like to congratulate you on achieving the target within time frame and with proper risk management.</span></p><br>
                            <p style="line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">We look forward to having you as part of our Funded Trader Program. Good luck!</span></p>
                        </div>
                    </td>
                    </tr>
                </tbody>
                ';
            }

		    $finaltemp = str_replace("{CONTENT}", $content, $body);
            $email = send_email($user_email, 'Congratulations for passing into equinox account', $finaltemp,'','',3);
        }elseif ($stage == "FAIL") {
            $body = file_get_contents(base_url('assets/mail/accountFailed.html'));
            $content = '
            <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;" align="left">
                <div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 20px; line-height: 35.2px;">Dear '.$name.',</span>
                    </p>
                    <br>
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 18px; line-height: 28.8px;">
                            We regret to inform you that your account '.$account.' has violated one of the rules of the program.
                        </span>
                    </p>
                    <br>
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 18px; line-height: 28.8px;">
                            For details of the violation please go to your dashboard.
                        </span>
                    </p>
                    <br>
                    <br>
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 14px; line-height: 28.8px;">
                            Account Number: <strong>'.$account.'</strong><br>
                            Message: '.(($violation_type ==1) ? "Maxdrawdown Violated" : "Daily Drawdown Violated" ).' on <strong>'.date('Y-m-d').'.</strong>
                        </span>
                    </p>
                    <br>
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 18px; line-height: 28.8px;">
                            Please take some time and review your strategy and what may have caused the violation before trying again.
                            <br>
                            <br>
                            <br>
                            As always, our support team are at your disposal should you need further assistance
                        </span>
                    </p>
                </div>
            </td>
            ';
		    $finaltemp = str_replace("{FAILED CONTENT}", $content, $body);
        
            $email = send_email($user_email, 'Account Breach Detected', $finaltemp,'','',3);
        }

		if($email){
			$response = array(
				"success" => 1,
				"message" => "Your Account has been made, please verify it by clicking the activation link that has been send to your email."
			);
		}	
		else{
			$response = array(
				"success" => 0,
				"message" => "Some error occured!"
			);
		}
	}



    public function connectManagerAccount(){
		$credentials = $this->db->get('mt_manager')->row_array();
		// $user = '30001';
		// $password = 'Nedr6b3ld';
		// $ip = '8.208.91.123';
		// $port = '443';
		// $server = $ip.'%3A'.$port;

		$user = $credentials['userID'];
		$password = $credentials['pass'];
		$ip = $credentials['ip'];
		$port = $credentials['port'];
		$server = $ip.'%3A'.$port;

        $token = $this->get_acc_curl('https://mt5mng.mtapi.io/Connect?user='.$user.'&password='.$password.'&server='.$server);
        return $token;
    }

    public function autoAccountCreate($requestData, $isLive){ 

        $account = $this->db->where(['product_id' => $requestData['product_id']])->get('products')->row_array();
        $user = $this->db->where(['user_id' => $requestData['user_id']])->get('user')->row_array();
        $account_size = $account['account_size'];
        $acc_type = $account['product_category'];        

        $master_password = $user['first_name'].substr($account_size,0,3).'K'; 
        $investor_password = $user['last_name'].substr($account_size,0,3).'K'; 
        if($isLive == '1'){
            $groupCode = "contest%5CLIVEProp%5CUSD";
        }else{
            $groupCode = "contest%5CFProp%5CFpropa%5CUSD";
        }

        try {
            $token = $this->connectManagerAccount();
            $path = 'https://mt5mng.mtapi.io/AccountCreate?id='.$token.
            '&master_pass='.$master_password.'&investor_pass='.$investor_password.
            '&enabled=true&FirstName='.$user['first_name'].'%20'.$user['last_name'].
            '%20-%20'.$acc_type.
            '%20-%20P1%20-%20&LastName=ETC&Group='.$groupCode.'&Rights=USER_RIGHT_CONFIRMED&Leverage=100&ApiDataClearAll=MT_RET_OK&ExternalAccountClear=MT_RET_OK';

            $json = $this->get_acc_curl($path);
            
            $response = json_decode($json, JSON_PRETTY_PRINT);
            // $response['login'] = '850952';
            
			//generate log
			$logsData = array(
                date('Y-m-d H:m:s') => array(
                    'Token' => $token,
                    'Request Url' => $path,
                    'Response' => $json,
                    'Decoded Response' => $response
                )
			);

			$file_path= 'accountCreate';
			$filename= date('Y-m-d').'_createAccount.log';
            $this->createLog($file_path, $filename, $logsData);

			if($response['login']){
                $account_num = $response['login'];
                $addBalanceUrl = 'https://mt5mng.mtapi.io/Deposit?id='.$token.'&login='.$account_num.'&amount='.$account_size.'&comment=Deposit&credit=false';
                if($this->get_acc_curl($addBalanceUrl)){
                    
                    $name = $user['first_name'].' '.$user['last_name'];
                    $servers = $this->db->get('servers')->row_array();
                    $responseData = array(
                        'status' => '200',
                        'account_num' => $account_num,
                        'password' => $master_password,
                        'ip' => $servers['sIp'],
                        'port' => $servers['sPort'],
                        'server' => $servers['serverName'],
                        'balance' => $account_size,
                        'equity' => $account_size,
                        'balance-added' => true
                    );

                    $sendEmail = $this->send_credentials_email(
                        $user['email'], 
                        $account_num, 
                        $master_password, 
                        $servers['serverName'],
                        $account_size,
                        $name,
                        '2'
                    );
                    
                }
            }else{
                $responseData = array(
                    'status' => '400'
                );
            }
			
			return $responseData;

		} catch (\Throwable $th) {
			return $th;
		}
	}

    public function deactiveAccount($requestData){ 

        $account_id = $requestData['account_id'];
        
        try {
            $token = $this->connectManagerAccount();
            $path = 'https://mt5mng.mtapi.io/AccountUpdate?id='.$token.'&enabled=false&Login='.$account_id;

            $response = $this->get_acc_curl($path);
            
			//generate log
			$logsData = array(
                date('Y-m-d H:m:s') => array(
                    'Token' => $token,
                    'Request Url' => $path,
                    'Response' => $response
                )
			);

			$file_path= 'deactiveAccount';
			$filename= date('Y-m-d').'_deactiveAccount.log';
            $this->createLog($file_path, $filename, $logsData);

			if($response == "OK"){
                $responseData = array(
                    'status' => '200'
                );
            }else{
                $responseData = array(
                    'status' => '400'
                );
            }
			
			return $responseData;

		} catch (\Throwable $th) {
			return $th;
		}
	}

    public function get_acc_curl($url){
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
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function send_credentials_email($user_email, $accountId,  $password, $server, $balance, $name, $phase){
		$this->load->helper('email_helper');
		$this->load->library('mailer');

		$body = file_get_contents(base_url('assets/mail/crdentialsEmail.html'));
		if($phase == '1'){
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">Hello '.$name.', </span>
								</p>
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 28.8px;">
										We are excited that you have decided to be a part of our ETC family and we wish you
										very best with the evaluation.<br /><br />
										You can monitor the performance of your account from the metrics section in your
										dashboard.
									</span>
								</p>
								<br />
								<br />
								<table style="font-size: 12px;width: 100%;text-align: center;" align="center">
									<tbody>
										<tr>
											<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong>Account Details:</strong>
														</td>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong></strong>
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Account
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$accountId.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Password
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$password.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Server
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$server.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Leverage
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															1:100
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Balance
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$balance.'
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>
							<br>
							<br>
							<br>
							<p style="font-size: 14px; line-height: 160%;">
							<span style="font-size: 16px; line-height: 28.8px;">
								Please test the above credentials right away and let us know if you have any issues.
								If you have any questions, please feel free to get in touch with us. Best of luck with
								your trading account!
							</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}elseif($phase == '2'){
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">Hello '.$name.', </span>
								</p>
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 28.8px;">
										Congratulations again on passing your Evaluation Phase-1. We wish you very best in your Phase 2 and on your path to a becoming part of the ETC live trader family.<br /><br />
										Always remember, “The Sky is the limit”.
									</span>
								</p>
								<br />
								<br />
								<table style="font-size: 12px;width: 100%;text-align: center;" align="center">
									<tbody>
										<tr>
											<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong>Account Details:</strong>
														</td>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong></strong>
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Account
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$accountId.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Password
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$password.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Server
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$server.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Leverage
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															1:100
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Balance
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$balance.'
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>
							<br>
							<br>
							<br>
							<p style="font-size: 14px; line-height: 160%;">
							<span style="font-size: 16px; line-height: 28.8px;">
								Please test the above credentials right away and let us know if you have any issues.
								If you have any questions, please feel free to get in touch with us. Best of luck with
								your trading account!
							</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}elseif($phase == '3'){
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">Hello '.$name.', </span>
								</p>
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 28.8px;">
										Congratulations again on passing your Evaluation Phase-2. Welcome to the ETC funded family.<br /><br />
									</span>
								</p>
								<br />
								<br />
								<table style="font-size: 12px;width: 100%;text-align: center;" align="center">
									<tbody>
										<tr>
											<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong>Account Details:</strong>
														</td>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong></strong>
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Account
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$accountId.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Password
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$password.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Server
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$server.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Leverage
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															1:100
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Balance
														</td>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$balance.'
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>
							<br>
							<br>
							<br>
							<p style="font-size: 14px; line-height: 160%;">
							<span style="font-size: 16px; line-height: 28.8px;">
								Please test the above credentials right away and let us know if you have any issues.
								If you have any questions, please feel free to get in touch with us. Best of luck with
								your trading account!
							</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}
		$finaltemp = str_replace("{CONTENT}", $content, $body);

		$email = send_email($user_email, 'Evaluation Account Credentials', $finaltemp,'','',3);

		if($email){
			$response = array(
				"success" => 1,
				"message" => "Credentials email sent to ".$user_email
			);
		}	
		else{
			$response = array(
				"success" => 0,
				"message" => "Some error occured!"
			);
		}
	}

    public function createLog($path, $filename, $data){
        
        $file_path= 'storage/'.$path;

        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }
        
        if(file_exists($file_path.'/'.$filename)){
            $res = write_file(FCPATH.$file_path.'/'.$filename, json_encode($data), 'a');
        }
        else{
            $res = write_file(FCPATH.$file_path.'/'.$filename, json_encode($data));
        }
    }
}
