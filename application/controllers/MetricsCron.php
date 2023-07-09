<?php
set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class MetricsCron extends APIMaster {

	public function index(){
        date_default_timezone_set('Asia/Calcutta');
        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['account_id !=' => '',  'account_status' => '1', 'payment_status' => '1']);
        $check = $this->db->get()->result_array();
        
        foreach ($check as $key => $value) {            
            $res = $this->accounts($value['account_id'],  $value['account_password'], $value['ip'], $value['port']);
            $accounts_data = json_decode($res, true);

            
            if(isset(json_decode($res,true)['status']) == '400'){
                echo "---////////////------/////////////////---<br/>";
                continue;
            }elseif(isset($accounts_data['equity']) != null && $accounts_data['balance'] != null){
                echo "Account ID - ".$value['account_id']."<br />";
                echo "PHASE - ".$value['phase']."<br />";
                echo "STATUS - ".$value['metrics_status']."<br />";

                $service_equity = $accounts_data['equity'];
                $service_balance = $accounts_data['balance'];
                
                //save to db
                $logsData = array(
                    'accountNum' => $value['account_id'],
                    'userName' => $value['email'],
                    'password' => $value['account_password'],
                    'ip' => $value['ip'],
                    'port' => $value['port'],
                    'phase' => $value['phase'],

                    'maxDD' => $value['max_drawdown'],
                    'maxDL' => $value['daily_drawdown'],
                    'p1_ProfitTarget' => $value['p1_target'],
                    'p2_ProfitTarget' => $value['p2_target'],
                    
                    'equity' => $service_equity,
                    'balance' => $service_balance,

                    'dbEquity' => $value['equity'],
                    'db_ClosedProfit' => $value['balance'], 
                    
                    'accountSize' => $value['account_size'],
                    'category' => $value['product_category'],

                    'date_time' => date('Y-m-d H:m:s'),
                );


                //store values
                $account_size = $value['account_size'];
                $max_drawdown =  $value['max_drawdown'];
                $daily_drawdown = $value['daily_drawdown'];
                $p1_target = $value['p1_target'];
                $p2_target = $value['p2_target'];
                $equity = $value['equity'];
                $product_category = $value['product_category'];


                if($value['phase'] == '1'){
                    $profit_target = $value['p1_target'];
                }else {
                    $profit_target = $value['p2_target'];
                }

                $logsData['current_profitTarget'] = $profit_target;
                
                //checking user status 
                $logsData['first_checkUserStatus'] = $this->checkUserStatus($value['id']); //storing message in db
                
                if(isset($accounts_data['openorders'][0]['openTime'])){
                    $sDate =  substr(($accounts_data['openorders'][0]['openTime']),0,10).' '.substr(($accounts_data['openorders'][0]['openTime']),11,-4);
                    $logsData['start_date'] = $sDate;
                    //save date
                    $logsData['start_date_status'] = $this->saveStartDate($value['id'], $sDate);
                    //check expiry
                }
                $logsData['check_expiry'] = $this->check_account_expiry($value['id']);

                //------check max drawdown fail or pass || equity from api > accountSize - max drawdown
                if($service_equity > ($account_size - $max_drawdown)){
                    $logsData['maximum_drawdown_message'] = "equity from swagger is : ".$service_equity.", and current account size is : ".$account_size.", and maximum_drawdown is : ".$max_drawdown." || Hence : ".$service_equity." is greater than ".($account_size - $max_drawdown)."[account size -  max drawdown]";
                    $logsData['maxDDStatus_pass'] = $this->maxDDPass($value['id']);
                }else{
                    //user made failed for max drawdown and full account goes to fail
                    $logsData['maximum_drawdown_message'] = "equity from swagger is : ".$service_equity.", and current account size is : ".$account_size.", and maximum_drawdown is : ".$max_drawdown." || Hence : ".$service_equity." is not greater than ".($account_size - $max_drawdown)."[account size -  max drawdown]";
                    $logsData['maxDDStatus_fail'] = $this->make_userFail_for_maxDrawdown($value['id']);
                    $logsData['failed_Time_MaxDD'] = date('Y-m-d H:m:s');
                }
                //------check max drawdown fail or pass-------
            
                if($value['product_category'] == 'Normal'){
                    if($service_equity != null){
                        //------check max daily loss fail or pass || equity from api > savedEquity - max daily drawdown
                        if($service_equity > ($equity - $daily_drawdown)){
                            //user still passed for max drawdown
                            $logsData['maximum_daily_loss_message'] = "As product is normal category equity from swagger is : ".$service_equity.", and current equity in Database is : ".$equity.", and daily drawdown is : ".$daily_drawdown." || Hence : ".$service_equity." is greater than ".($equity - $daily_drawdown)."[database equity -  daily drawdown]";
                            $logsData['maxDLStatus_pass'] = $this->pass_max_dailyLoass($value['id']);
                        }else{
                            //user made failed for max drawdown and full account goes to fail
                            $logsData['maximum_daily_loss_message'] = "As product is normal category equity from swagger is : ".$service_equity.", and current equity in Database is : ".$equity.", and daily drawdown is : ".$daily_drawdown." || Hence : ".$service_equity." is not greater than ".($equity - $daily_drawdown)."[database equity -  daily drawdown]";
                            $logsData['maxDLStatus_fail'] = $this->makeMaxDailylossFail($value['id']);
                            $logsData['failTimeMaxDL'] = date('Y-m-d H:m:s');
                        }
                        //------check max daily loss fail or pass------------------------
                    }
                }
                
                if($value['phase'] != '3'){
                    if($service_balance != null){
                        //------check profit target fail or pass
                        if(1){
                            $logsData['profit_target_message'] = "balance from swagger is : ".$service_balance.", and current account size is : ".$account_size.", and profit target is : ".$profit_target." || Hence : ".$service_balance." - ".$account_size." is the closed profit : ".($service_balance - $account_size)." which is greater than and equal to current profit target ".$profit_target;
                            $logsData['profitTargetStatus'] = $this->makeUserPassProfitTarget($value['id']);
                            $logsData['passTimeProfitTarget'] = date('Y-m-d H:m:s');
                        }else{
                            //user made failed for max drawdown and full account goes to fail
                            $logsData['profit_target_message'] = "balance from swagger is  ".$service_balance.", and current account size is : ".$account_size.", and profit target is : ".$profit_target." || Hence : (balance from swagger the closed profit : ".$service_balance.") - (account size : ".$account_size.") is : ".($service_balance - $account_size)." which is not greater than or equal to current profit target ".$profit_target;
                            $logsData['profitTargetStatus'] = $this->userFailedPT($value['id']);
                        }
                        //------check max daily loss fail or pass------------------------
                    }
                }

                //checking user status 
                $logsData['userEndStats'] = $this->checkUserStatus($value['id']); //storing message in db

                // $this->db->insert('metrics_cron_job', $logsData);

                //generate log
                $file_path= 'logs';
                $filename= date('Y-m-d').'_'.$value['account_id'].'.log';

                $this->createLog($file_path, $filename, $logsData);
            }
        }
    }
    



    //---mt5 swagger api call to get account info----
    public function accounts($accountId, $password, $host, $port){
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$accountId.'&password='.$password.'&host='.$host.'&port='.$port);
        $response = json_decode($token, JSON_PRETTY_PRINT);

        // print_r($token);
        // die;

        if(isset($response['message'])){
            return json_encode(array('status'=> '400'));
        }else{
            $file_path = 'accounts';
            $filename = 'accounts_'.date('Y-m-d').'.log';
            $logsData = array(
                date('Y-m-d H:m:s') => array(
                    'request'=>$token,
                    'response'=>$response
                )
            );
            $logd= $this->createLog($file_path, $filename, $logsData);
            // print_r($logd);

            $accountSummary = $this->accountSummary($token);
            $orderHistory = $this->OrderHistory($token);
            $openedOrders = $this->OpenedOrders($token);
            $mergedArray = array_merge(json_decode($accountSummary, true),json_decode($orderHistory, true));
            $data = array_merge($mergedArray, array('openorders'=>json_decode($openedOrders, true)));
            return json_encode($data, true);
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
    //---END mt5 swagger api call to get account info----



    //----save start and end date---
    public function saveStartDate($id, $sDate){
        $decrypted['eqid'] = $id;
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        $start_date =  $sDate;
        $end_date = date('Y-m-d H:m:s', strtotime($start_date. ' +30 days'));
        $data = array(
            'start_date' => $start_date,
            'end_date' => $end_date
        );
        $res = $this->db->where(['user_id'=>$_SESSION['user_id']])->update('userproducts', $data);
        if($res){
            $response = 'start date and end date added successfully';
        }else{
            $response = 'Error adding start date and end date to database';
        }
        return $response;
    }

    //----save start and end date---
    public function check_account_expiry($id){
        $decrypted['eqid'] = $id;
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
                $response = 'account expired, product status updated';
            }else{
                $response = 'nothing changed';
            }
        }else{
            $response = 'not checking any more already expired!';
        }
        
        return json_encode($response);
    }

    
    //--- PASS MAXIMUM DRAWDOWN ---
    public function maxDDPass($id){
        $decrypted['eqid'] = $id;
        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check2 = $this->db->get()->result_array();
        $email = $check2[0]['email'];

        //0 = initial failed -- profit target
        //1 = initial pass   -- profit target

        //2 = permanent pass -- max ddd, max dl
        //3 = permanent fail -- max ddd, max dl

        if($check[0]['maxdd_status'] == 3){
            $response = "User already failed in Maximum drawdown !";
        }elseif($check[0]['maxdd_status'] == 1){
            // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '2']);
            $response = 'User still pass for Maximum Drawdown';
        }
        return ($response);
    } 
    //--- FAIL MAX DRAWDOWN ---
    public function make_userFail_for_maxDrawdown($id){
        $decrypted['eqid'] = $id;

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
            ->update('userproducts', ['maxdd_status' => '3', 'product_status' => '3', 'target_status'=> '3', 'account_status' => '0']);
            
            $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
            $deactiveAccount = $this->deactiveAccount($requestData);
            
            $this->send_user_email($email, "FAIL", "1", $name, $account, "");
        }else{
            $update = 0;
        }
        
        if($update){
            $response = "'User Made Failed permanently !";
        }else{
            $response = "Server Error !, unable to fail user";
        }

        return ($response);
    }


    //--------PASS PROFIT TARGET-------
    public function makeUserPassProfitTarget($id){
        $decrypted['eqid'] = $id;

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
            $response = "User permanently failed in profit target";
        }else{
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['target_status' => '2']);
            $response = "User made permanently pass for profit target!";
        }
        return ($response);
    }
    //--------FAIL PROFIT TARGET-------
    public function userFailedPT($id){
        $decrypted['eqid'] = $id;

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
            $response = "no change in profit target";
        }
        return ($response);
    }


    //--------PASS DAILY DRAWDOWN-------
    public function pass_max_dailyLoass($id){
        $decrypted['eqid'] = $id;

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
            $response = "User permanently failed in Maximum Daily loss";
        }elseif($check[0]['maxDl_status'] == 1){
            // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxDl_status' => '2']);
            $response = "User still pass for Maximum Daily Loss!";
        }
        return ($response);
    }
    //--------FAIL DAILY DRAWDOWN-------
    public function makeMaxDailylossFail($id){
        
        $decrypted['eqid'] = $id;

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
            $update = $this->db->where(['id' => $decrypted['eqid']])
            ->update('userproducts', ['maxDl_status' => '3', 'product_status' => '3', 'target_status'=> '3', 'account_status' => '0']);
            $requestData = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->row_array();
            $deactiveAccount = $this->deactiveAccount($requestData);
            $this->send_user_email($email, "FAIL", "2", $name, $account, "");
        }else{
            $update = 0;
        }
        
        if($update){
            $response = "User Made Failed permanently in Maximum Daily loss";
        }else{
            $response = "Server Error !, unable to fail user";
        }
        return ($response);
    }


    //user status controller
    public function checkUserStatus($rowId){
        $decrypted['eqid'] = $rowId;

        $this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check = $this->db->get()->result_array();

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
                        ->update('userproducts', ['product_status'=>'2', 'metrics_status'=> '1', 'account_status' => '0']);
                        
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

                        $response = 'User id: '.$check[0]['user_id'].' account is passed phase-1 for aggressive product';
                    }else{
                        $response = "Account not passed phase-1 yet";
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2', 'metrics_status'=> '1',  'account_status' => '0']);
                        
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
                        
                        $response = 'User id: '.$check[0]['user_id'].' account is passed phase-2 for aggressive product';  
                    }else{
                        $response = 'User id: '.$check[0]['user_id'].' account not passed phase-2 yet';
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
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1',  'account_status' => '0']);
                        
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

                        $response = 'User id: '.$check[0]['user_id'].' account is passed phase1 for normal product';
                    }else{
                        $response = "Account not passed phase-1 yet or normal";  
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1', 'account_status' => '0']);
                        
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

                        $response = "User id: '.$check[0]['user_id'].' account is passed phase2 for nonrmal product";
                    }else{
                        $response = "Account not passed phase-1 yet";
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
                $response = "User account no passed yet";
            }
        }else{
            $response = "Data not found user might be failed";
        }
        return ($response);
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
            <td style="overflow-wrap:break-word;word-break:break-word;padding:55px;font-family:"Cabin",sans-serif;" align="left">
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
        $this->load->helper('file');
        
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

        
        if(!$res){
            echo 'Unable to write the '.$filename.' file on path '.$file_path.'/'.$filename.'<br/><br/>';
        }
        else{
            echo $filename.' File written!<br/><br/>';
        }
    }
}
