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
                
                $resultTransaction = $this->db->where(['payment_code'=> $payment_code])->get('userproducts')->row_array();
                // echo "<pre>";
                // print_r($resultTransaction);
                // die;
                if($resultTransaction){
                    $requestData = array(
                        'user_id' => $resultTransaction['user_id'],
                        'product_id' => $resultTransaction['product_id']
                    );
                    $accountCreate = $this->autoAccountCreate($requestData);
                    $userProducts = array(
                        'payment_status' => 1,
                        'account_id' => $accountCreate['account_num'],
                        'account_password' =>  $accountCreate['password'],
                        'server' =>  $accountCreate['server'],
                        'ip' =>  $accountCreate['ip'],
                        'port' =>  $accountCreate['port'],
                        'equity' => $accountCreate['equity']
                    );
    
                    $this->db->where(['payment_code'=> $payment_code])->update('userproducts',$userProducts);
                    $this->db->where(['payment_code'=> $payment_code])->update('transactions',['payment_status'=>1]);

                    $email = $this->db->where(['user_id' =>  $requestData->user_id])->get('user')->result_array();
                    $productName = $this->db->where(['product_id' =>  $requestData->product_id])->get('products')->result_array();
                    $final_product_name = $productName[0]['product_name'].' '. $product_category['product_category'];
                    $userName = $email[0]['first_name'].' '.$email[0]['last_name'];

                    $this->send_user_email($email[0]['email'], $userName, $orderId, $requestData->product_price, $final_product_name, $requestData->final_product_price );
                }

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

    public function connectManagerAccount(){
		$credentials = $this->db->get('mt_manager')->row_array();
		$user = $credentials['userID'];
		$password = $credentials['pass'];
		$ip = $credentials['ip'];
		$port = $credentials['port'];
		$server = $ip.'%3A'.$port;
		$url = 'https://mt5mng.mtapi.io/Connect?user='.$user.'&password='.$password.'&server='.$server;
        $token = $this->get_curl($url);
        return $token;
    }

    public function autoAccountCreate($requestData){  
        $account = $this->db->where(['product_id' => $requestData['product_id']])->get('products')->row_array();
        $user = $this->db->where(['user_id' => $requestData['user_id']])->get('user')->row_array();
		$groupCode = $this->db->get('group_code')->row_array();
        $account_size = $account['account_size']/1000;
        $acc_type = $account['product_category'];        

        $master_password = $user['first_name'].$account_size.'K'; 
        $investor_password = $user['last_name'].$account_size.'K'; 
		$newGroupCode = str_replace("\\","%5C",$groupCode['code']);

		try {
            $token = $this->connectManagerAccount();
            $path = 'https://mt5mng.mtapi.io/AccountCreate?id='.$token.
            '&master_pass='.$master_password.'&investor_pass='.$investor_password.
            '&enabled=true&FirstName='.$user['first_name'].'%20'.$user['last_name'].
            '%20-%20'.$acc_type.
            '%20-%20P1%20-%20&LastName=ETC&Group='.$newGroupCode.
			'&Rights=USER_RIGHT_CONFIRMED&Leverage=100&ApiDataClearAll=MT_RET_OK&ExternalAccountClear=MT_RET_OK';

            $json = $this->get_curl($path);
            
            $response = json_decode($json, JSON_PRETTY_PRINT);
			            
			//generate log
			$logsData = array(
				'Token' => $token,
				'Request Url' => $path,
				'Response' => $json,
				'Decoded Response' => $response,
				'date_time' => date('Y-m-d H:m:s'),
			);

			$file_path= 'storage/accountCreate/'.date('Y-m-d').'_coinbase_createAccount.log';

			if(file_exists($file_path)){
				$res = write_file(FCPATH.$file_path, json_encode($logsData), 'a');
			}
			else{
				$res = write_file(FCPATH.$file_path, json_encode($logsData));
			}
			
			if($response['login']){
                $account_num = $response['login'];
                $addBalanceUrl = 'https://mt5mng.mtapi.io/Deposit?id='.$token.'&login='.$account_num.'&amount='.$account_size.'&comment=Deposit&credit=false';
                if($this->get_curl($addBalanceUrl)){
                    
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
                        '1'
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

    public function send_user_email($user_email, $userName, $orderId, $product_Price, $productName, $priceAfterDiscount){
		$this->load->helper('email_helper');
		$this->load->library('mailer');
        
        $body = file_get_contents(base_url('assets/mail/receipt.html'));

        $content = '<td align="left" bgcolor="#ffffff" style="margin-auto; padding: 50px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="left" bgcolor="#D2C7BA" width="75%"
                            style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <strong>Order #</strong></td>
                            <td align="left" bgcolor="#D2C7BA" width="25%"
                            style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <strong>'.$orderId.'</strong></td>
                        </tr>
                        <tr>
                            <td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                '.$productName.'
                            </td>
                            <td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                $'.$product_Price.'
                            </td>
                        </tr>
                        <tr>
                            <td align="left" width="75%"
                            style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            Sales Tax</td>
                            <td align="left" width="25%"
                            style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            $0.00</td>
                        </tr>
                        <tr>
                            <td align="left" width="75%"
                            style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            Discount</td>
                            <td align="left" width="25%"
                            style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            -$'.$product_Price-$priceAfterDiscount.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="75%"
                            style="padding: 12px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA; border-bottom: 2px dashed #D2C7BA;">
                            <strong>Total</strong></td>
                            <td align="left" width="25%"
                            style="padding: 12px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA; border-bottom: 2px dashed #D2C7BA;">
                            <strong>$'.$priceAfterDiscount.'</strong></td>
                        </tr>
                        </table>
                    </td>';
        $finaltemp = str_replace("{PAYMENT}", $content, $body);
        // echo $finaltemp;die;

        $email = send_email($user_email, 'Payment Receipt', $finaltemp,'','',3);

        if($email){
			$response = array(
				"success" => 1,
				"message" => "Account receipt has been sent."
			);
		}	
		else{
			$response = array(
				"success" => 0,
				"message" => "Some error occured! to dend receipt email"
			);
		}
	}

}
?>