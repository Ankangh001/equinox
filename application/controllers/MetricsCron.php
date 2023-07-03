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
        $this->db->where(['account_id!=""',  'account_status' => '1', 'payment_status' => '1']);
        $check = $this->db->get()->result_array();
        
        foreach ($check as $key => $value) {

            $res = $this->accounts($value['account_id'],  $value['account_password'], $value['ip'], $value['port']);
            // echo "<pre>";
            // print_r(json_decode($res, true));
            // die;
            $accounts_data = json_decode($res, true);
            // $accounts_data['equity'] = null;
            // $accounts_data['balance'] = null;

            if(isset(json_decode($res,true)['status']) == '400'){
                echo "---////////////------/////////////////---<br/>";
                continue;
            }elseif($accounts_data['equity'] != null && $accounts_data['balance'] != null){
                echo "Account ID - ".$value['account_id']."<br />";
                echo "Account PASSWORD - ".$value['account_password']."<br />";
                echo "Account IP - ".$value['ip']."<br />";
                echo "Account PORT - ".$value['port']."<br />";
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

                echo "<br/>USER CURRENT PROFIT TARGET IS ".$profit_target."<br/><br/>";
                $logsData['current_profitTarget'] = $profit_target;
                
                //checking user status 
                echo "<br/>checking user stats<br/>";
                echo $this->checkUserStatus($value['id'])."<br />"; 
                $logsData['first_checkUserStatus'] = $this->checkUserStatus($value['id']); //storing message in db


                echo "<br/><br/>checking max dd <br/>";
                echo "<br/>If ".$service_equity." is greater than >  (".$account_size." - ".$max_drawdown.") which is (".$account_size-$max_drawdown.")";

                //------check max drawdown fail or pass || equity from api > accountSize - max drawdown
                if($service_equity > ($account_size - $max_drawdown)){
                    //user still passed for max drawdown
                    echo $this->maxDDPass($value['id']);
                    $logsData['maximum_drawdown_message'] = "equity from swagger is : ".$service_equity.", and current account size is : ".$account_size.", and maximum_drawdown is : ".$max_drawdown." || Hence : ".$service_equity." is greater than ".($account_size - $max_drawdown)."[account size -  max drawdown]";
                    $logsData['maxDDStatus_pass'] = $this->maxDDPass($value['id']);
                }else{
                    //user made failed for max drawdown and full account goes to fail
                    $this->make_userFail_for_maxDrawdown($value['id']);
                    $logsData['maximum_drawdown_message'] = "equity from swagger is : ".$service_equity.", and current account size is : ".$account_size.", and maximum_drawdown is : ".$max_drawdown." || Hence : ".$service_equity." is not greater than ".($account_size - $max_drawdown)."[account size -  max drawdown]";
                    $logsData['maxDDStatus_fail'] = $this->make_userFail_for_maxDrawdown($value['id']);
                    $logsData['failed_Time_MaxDD'] = date('Y-m-d H:m:s');
                }
                //------check max drawdown fail or pass-------
            
            
            
            
                echo "<br/><br/>checking max daily loss <br/>";
                echo "<br/>EQUITY FROM API IS ".$service_equity.",  EQUITY SAVED IN DB ".$equity.",  DAILY DRAWDOWN ".$daily_drawdown."<br/>";
                echo "<br/>If ".$service_equity." greater than ".$equity." - ".$daily_drawdown." i.e ".$equity-$daily_drawdown."<br/>";
                
                if($value['product_category'] == 'Normal'){
                    if($service_equity != 'null' || $service_equity != 'NULL'){
                        //------check max daily loss fail or pass || equity from api > savedEquity - max daily drawdown
                        if($service_equity > ($equity - $daily_drawdown)){
                            //user still passed for max drawdown
                            echo "<br/>calling pass_max_dailyLoass<br/>";
                            echo $this->pass_max_dailyLoass($value['id']);
                            $logsData['maximum_daily_loss_message'] = "As product is normal category equity from swagger is : ".$service_equity.", and current equity in Database is : ".$equity.", and daily drawdown is : ".$daily_drawdown." || Hence : ".$service_equity." is greater than ".($equity - $daily_drawdown)."[database equity -  daily drawdown]";
                            $logsData['maxDLStatus_pass'] = $this->pass_max_dailyLoass($value['id']);
                        }else{
                            //user made failed for max drawdown and full account goes to fail
                            echo "<br/>calling make_userFail_for_maxDrawdown<br/>";
                            $this->makeMaxDailylossFail($value['id']);
                            $logsData['maximum_daily_loss_message'] = "As product is normal category equity from swagger is : ".$service_equity.", and current equity in Database is : ".$equity.", and daily drawdown is : ".$daily_drawdown." || Hence : ".$service_equity." is not greater than ".($equity - $daily_drawdown)."[database equity -  daily drawdown]";
                            $logsData['maxDLStatus_fail'] = $this->makeMaxDailylossFail($value['id']);
                            $logsData['failTimeMaxDL'] = date('Y-m-d H:m:s');
                        }
                        //------check max daily loss fail or pass------------------------
                    }
                }
                
                
                echo "<br/><br/>checking profit trget <br/>";
                echo "BALANCE FROM SERVICE ".$service_balance.", ACCOUNT SIZE ".$value['account_size'].", profit target ".$profit_target." service_equity ".$service_equity."<br/>";
                echo "If BALANCE FROM SERVICE ".$service_balance." - ".$value['account_size']." > ".$profit_target."<br/>";

                if($value['phase'] != '3'){
                    if($service_balance != 'null' || $service_balance != 'NULL'){
                        //------check max daily loss fail or pass || equity from api > savedEquity - max daily drawdown
                        if(($service_balance - $account_size) >= $profit_target){
                            //user still passed for max drawdown
                            echo "<br/>makeUserPassProfitTarget<br/>";
                            echo $this->makeUserPassProfitTarget($value['id']);
                            $logsData['profit_target_message'] = "balance from swagger is : ".$service_balance.", and current account size is : ".$account_size.", and profit target is : ".$profit_target." || Hence : ".$service_balance." - ".$account_size." is the closed profit : ".($service_balance - $account_size)." which is greater than and equal to current profit target ".$profit_target;
                            $logsData['profitTargetStatus'] = $this->makeUserPassProfitTarget($value['id']);
                            $logsData['passTimeProfitTarget'] = date('Y-m-d H:m:s');
                        }else{
                            //user made failed for max drawdown and full account goes to fail
                            echo "<br/>userFailedPT<br/>";
                            echo $this->userFailedPT($value['id']);
                            $logsData['profit_target_message'] = "balance from swagger is  ".$service_balance.", and current account size is : ".$account_size.", and profit target is : ".$profit_target." || Hence : (balance from swagger the closed profit : ".$service_balance.") - (account size : ".$account_size.") is : ".($service_balance - $account_size)." which is not greater than or equal to current profit target ".$profit_target;
                            $logsData['profitTargetStatus'] = $this->userFailedPT($value['id']);
                        }
                        //------check max daily loss fail or pass------------------------
                    }
                }
                echo "<br/>";
                

                echo "checking user stats again <br/>";
                //checking user status 
                $this->checkUserStatus($value['id']); 
                $logsData['userEndStats'] = $this->checkUserStatus($value['id']); //storing message in db

                // $this->db->insert('metrics_cron_job', $logsData);
                $this->load->helper('file');


                //generate log
                $file_path= 'logs/'.date('Y-m-d').'_'.$value['account_id'].'.txt';

                if(file_exists($file_path)){
                    $res = write_file(FCPATH.$file_path, json_encode($logsData), 'a');
                }
                else
                {
                    $res = write_file(FCPATH.$file_path, json_encode($logsData));
                }


                if(!$res){
                    echo 'Unable to write the file';
                }
                else{
                    echo 'File written!';
                }
            }
        }
    }
    



    //---mt5 swagger api call to get account info----
    public function accounts($accountId, $password, $host, $port){
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$accountId.'&password='.$password.'&host='.$host.'&port='.$port);
        // echo "<pre>";
        $response = json_decode($token, JSON_PRETTY_PRINT);
        // print_r($response['message']);
        // print_r((json_decode($token)), 0, 12);
        // exit;
        // return json_decode($token['message']);

        if(isset($response['message'])){
            return json_encode(array('status'=> '400'));
        }else{
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
    public function check_account_expiry(){
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
            $response = 'User still pass for Maximum Drawdown!';
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
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '3', 'product_status' => '3', 'target_status'=> '3']);
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
    //--------PASS PROFIT TARGET-------
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
                
                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '2',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '0',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'equity' => '0.0',
                            'payment_status' => $check[0]['payment_status']
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase-1 for aggressive product',
                        );                           
                    }else{
                        $response = "account not passed phase-1 yet";
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2', 'metrics_status'=> '1']);
                        
                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '3',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '0',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'equity' => '0.0',
                            'payment_status' => $check[0]['payment_status'],
                            'payoutDate' => date('Y-m-d H:m:s'),
                            'phase3_issue_date' => date('Y-m-d H:m:s')
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $response = 'User id: '.$check[0]['user_id'].' account is passed phase-2 for aggressive product';  
                    }else{
                        $response = 'User id: '.$check[0]['user_id'].' account not passed phase-2 yet';
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1 && $metrics_status == 0){
                        // no phase after this
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        $this->send_user_email($email, "PASS", "FUNDED", $name, $account);
                        
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
                
                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '2',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '0',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'equity' => '0.0',
                            'payment_status' => $check[0]['payment_status']
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $response = "User id: '.$check[0]['user_id'].' account is passed phase1 for normal product";
                    }else{
                        $response = "Account not passed phase-1 yet or normal";  
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status == 2 && $metrics_status == 0){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        
                        $userProducts = array(
                            'user_id' => $check[0]['user_id'],
                            'product_id' => $check[0]['product_id'],
                            'phase' => '3',
                            'created_date' => date('Y-m-d H:m:s'),
                            'product_status' => '0',

                            'product_price' => $check[0]['product_price'],
                            'product_discount' => $check[0]['product_discount'],
                            'final_product_price' => $check[0]['final_product_price'],
                            'equity' => '0.0',
                            'payment_status' => $check[0]['payment_status'],
                            'payoutDate' => date('Y-m-d H:m:s'),
                            'phase3_issue_date' => date('Y-m-d H:m:s')
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($email, "PASS", "", $name, $account);
                        $response = "User id: '.$check[0]['user_id'].' account is passed phase2 for nonrmal product";
                    }else{
                        $response = "Account not passed phase-1 yet";
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $metrics_status == 0){
                        // no phase after this
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])
                        ->update('userproducts', ['product_status'=>'2','metrics_status'=> '1']);
                        $this->send_user_email($email, "PASS", "FUNDED", $name, $account);
                        
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
}
