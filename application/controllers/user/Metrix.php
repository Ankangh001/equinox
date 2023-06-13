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
    
    //-api call-------
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
        // print_r($token);
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
    //-api call ends-------

    //----save start and end date---
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
                'message'=>'User was peviouly failed in max drawdown, cannot be made pass!'
            );
        }elseif($check[0]['maxdd_status'] == 1){
            $response = array(
                'status'=> 400,
                'message'=>'User not failed yet'
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
            $email = $this->db->where(['id' => $_SESSION['user_id']])->get('user')->result_array();
            $this->send_user_email($email[0]['email'], "FAIL", "DRAWDOWN");  
            if($update){
                $response = array(
                    'status'=> 200,
                    'message'=>'User Made Failed for max draw down!'
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
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['target_status' => '1']);
            $response = array(
                'status'=> 200,
                'message'=>'User made the criteria and made pass in profit target'
            );
        }elseif($check[0]['target_status'] == 1){
            $response = array(
                'status'=> 200,
                'message'=>'User was already passed.'
            );
        }elseif($check[0]['target_status'] == 2){
            $response = array(
                'status'=> 400,
                'message'=>'User previously failed once, so he cannot be pass'
            );
        }
        echo json_encode($response);
    }

    public function userFailedPT(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);
        
        $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['target_status' => '2', 'product_status' => '3']);
        if($update){
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '0', 'product_status' => '3']);
            $email = $this->db->where(['id' => $_SESSION['user_id']])->get('user')->result_array();
            $this->send_user_email($email[0]['email'], "FAIL", "PROFITTARGET");  

            $response = array(
                'status'=> 200,
                'message'=>'User Made Failed due to profit target'
            );
        }else{
            $response = array(
                'status'=> 400,
                'message'=>'Server Error !, unable to fail user'
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

    public function makeMaxDailylossFail(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        //0 = failed
        //1 = pass
        if($check[0]['maxDl_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Already Failed'
            );
        }elseif($check[0]['maxDl_status'] == 1){
            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxDl_status' => '0', 'product_status' => '3']);

            $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '0', 'product_status' => '3']);
            $email = $this->db->where(['id' => $_SESSION['user_id']])->get('user')->result_array();
            $this->send_user_email($email[0]['email'], "FAIL", "DAILYLOSS");  

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

    public function checkIfMaxDailyLossFail(){
        $request = base64_decode($this->input->post('r'));
        $decrypted = json_decode($request, true);

        // $update = $this->db->where(['id' => $decrypted['eqid']])->update('userproducts', ['maxdd_status' => '1']);
        
        $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();
        //0 = failed
        //1 = pass
        if($check[0]['maxDl_status'] == 0){
            $response = array(
                'status'=> 200,
                'message'=>'User Failed'
            );
        }elseif($check[0]['maxDl_status'] == 1){
            $response = array(
                'status'=> 400,
                'message'=>'User Not Failed'
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

        $this->db->select('userproducts.*, products.*, user.email');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status!=0']);
        $check = $this->db->get()->result_array();

        print_r($check);die;
        // $check = $this->db->where(['id' => $decrypted['eqid']])->get('userproducts')->result_array();

        if(!empty($check[0])){
            $maxdd_status = $check[0]['maxdd_status'];
            $maxDl_status = $check[0]['maxDl_status'];
            $target_status = $check[0]['target_status'];
            $phase = $check[0]['phase'];
            $product_category = $check[0]['product_category'];
            $email = $check[0]['email'];
            
            if($product_category == 'Aggressive'){
                if($phase == '1') {
                    if($maxdd_status == 1 && $target_status ==1){
                        //--move to phse 2
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])->update('userproducts', ['product_status'=>'2']);
                
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
                        $this->send_user_email($email); 
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase-1 for aggressive product',
                        );                           
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $target_status ==1){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'2'])->update('userproducts', ['product_status'=>'3']);
                        
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
                            'payment_status' => $check[0]['payment_status']
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($emai, "PASS"l); 
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase-2 for aggressive product',
                        );                           
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1){
                        // Only send passing email
                        $this->send_user_email($email, "PASS");  
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed funded phase for aggressive product',
                        );                          
                    }
                }
            }elseif ($product_category == 'Normal') {
                if($phase == '1') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status ==1){
                        //--move to phse 2
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'1'])->update('userproducts', ['product_status'=>'2']);
                
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
                        $this->send_user_email($email, "PASS");  
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase1 for normal product',
                        );                             
                    }
                }elseif($phase == '2') {
                    if($maxdd_status == 1 && $maxDl_status == 1 && $target_status ==1){
                        // move to phase3
                        $this->db->where(['id' => $decrypted['eqid'], 'payment_status' => '1', 'product_status'=>'2'])->update('userproducts', ['product_status'=>'3']);
                        
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
                            'payment_status' => $check[0]['payment_status']
                        );
                        $res = $this->db->insert('userproducts', $userProducts);
                        $this->send_user_email($email, "PASS");  
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed phase2 for nonrmal product',
                        );                          
                    }
                }elseif($phase == '3') {
                    if($maxdd_status == 1 && $maxDl_status == 1){
                        // Only send passing email
                        $this->send_user_email($email, "PASS");  
                        $response = array(
                            'status'=> 200,
                            'message'=>'User id: '.$check[0]['user_id'].' account is passed funded phase for aggressive product',
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
	public function send_user_email($user_email, $stage){
		$this->load->helper('email_helper');
		$this->load->library('mailer');

        if ($stage == "PASS") {
            $body = file_get_contents(base_url('assets/mail/accountPassed.html'));
            $email = send_email($user_email, 'Congratulations for passing into equinox account ', $body,'','',3);
        }elseif ($stage == "FAIL") {
            $body = file_get_contents(base_url('assets/mail/accountFailed.html'));
            $content = '
            <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;" align="left">
                <div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 20px; line-height: 35.2px;">Dear User,</span>
                    </p>
                    <br>
                    <p style="font-size: 14px; line-height: 160%;">
                        <span style="font-size: 18px; line-height: 28.8px;">
                            We regret to inform you that your account {ACCOUNT_NUM} has violated one of the rules of the program.
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
                            Account Number: <strong>{ACCOUNT_NUM}</strong><br>
                            Message: {DYNAMIC BREACH MESSAGE}, <br>
                            Daily Equity Breach on <strong>02/20/2023 01:39:56 AM.</strong>
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

		    $finaltemp = str_replace("{CONTENT}", $content, $body);
        
            $email = send_email($user_email, 'Sorry! You have failed.', $body,'','',3);
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
