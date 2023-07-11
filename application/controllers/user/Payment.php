<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php'; 
use Square\SquareClient;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;
use Ramsey\Uuid\Uuid;
use Amazon\Pay\API\Client;
use Amazon\Pay\Api\CheckoutSession;
use AmazonPay\ResponseParser;
use CoinbaseCommerce\ApiClient;

class Payment extends APIMaster {

    var $currency;
    var $country;
    var $location_id;
  
    function __construct() {
        parent::__construct();
        $this->verifyAuth();
        $access_token =  SQUARE_ACCESS_TOKEN;
        $square_client = new SquareClient([
            'accessToken' => $access_token,  
            'environment' => SQUARE_ENVIRONMENT
        ]);
        $location = $square_client->getLocationsApi()->retrieveLocation(SQUARE_LOCATION_ID)->getResult()->getLocation();
        $this->location_id = $location->getId();
        $this->currency = $location->getCurrency();
        $this->country = $location->getCountry();  
    }
  
    public function getCurrency() {
      return $this->currency;
    }
  
    public function getCountry() {
      return $this->country;
    }
  
    public function getId() {
      return $this->location_id;
    }

	public function index()
	{
        if(!empty($_GET)){
            $data['product_details'] = $this->db->where(['product_id' => $_GET['product-code']])->get('products')->row_array();
            $data['squareData'] = [
                'currency' => $this->getCurrency(),
                'country' => $this->getCountry(),
                'idempotencyKey' => Uuid::uuid4() 
            ];
            $this->load->view('user/payment',$data);
        }
	}

    public function coinbaseCreateCharge()
	{
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.commerce.coinbase.com/charges',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "local_price":{
                    "amount":"'.$_POST['final_product_price'].'",
                    "currency":"USD"
                },
                "metadata":{
                    "customer_id":"customer1",
                    "customer_name":"Person1"
                },
                "name":"Payment for",
                "description":"Evaluation Product",
                "pricing_type":"fixed_price",
                "redirect_url":"'.base_url().'user/payment/coinbaseSuccess",
                "cancel_url":"'.base_url().'user/payment/coinbaseFailure"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'X-CC-Version: 2018-03-22',
                'X-CC-Api-Key: 408fe58b-6bc2-428e-84b4-b87bd44e3a07'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response  = json_decode($response,true);
        $this->coinbaseDataInsert($_POST,$response,0);
        echo $response['data']['hosted_url'];
        // header('Location:'.json_decode($response)->data->hosted_url);
	}

    public function coinbaseSuccess(){
        redirect(base_url('user/account-overview'));
    }

    public function coinbaseFailure(){
        redirect(base_url('user/account-overview'));
    }

    public function coinbaseDataInsert($requestData,$dump,$status=0)
	{        
        try {
            $product_category = $this->db->where(['product_id' => $requestData['product_id']])->get('products')->row_array();
			$userProducts = array(
				'user_id'       => $requestData['user_id'],
				'product_id'    => $requestData['product_id'],
				'product_price' => $requestData['product_price'],
				'product_discount' => $requestData['product_discount'],
				'final_product_price' => $requestData['final_product_price'],
				'phase'         => '1',
				'created_date'  => date('Y-m-d H:m:s'),
				'product_status'=> '1',
				'payment_status'=> $status,
				'payment_code'  => $dump['data']['code']
			);

            $transaction = array(
				'user_id'       => $requestData['user_id'],
				'amount'        => $requestData['final_product_price'],
				'product_id'    => $requestData['product_id'],
				'product_category' => $product_category['product_category'],
				'gateway'       => 'coinbase',
                'flag'          =>  1,
                'txn_type'      => 1,
				'payment_status'=> $status,
				'payment_code'  => $dump['data']['code'],
				'purchase_date' => date('Y-m-d H:m:s'),
				'updated_at'    => date('Y-m-d H:m:s'),
                'dump'          =>  json_encode($dump)
			);
			
			if($this->db->insert('userproducts', $userProducts)){
                if( $this->db->insert('transactions', $transaction)){
                    $response = array(
                        'status' => '200',
                        'message' => 'User Poduct Added successfully',
                    );
                }else{
                    $response = array(
                        'status' => '400',
                        'message' => 'Unable to add data',
                    );
                }
            }else{
                $response = array(
					'status' => '400',
					'message' => 'Unable to add data',
				);
            }
			return $response;  

		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function success()
	{        
        try {
            $product_category = $this->db->where(['product_id' => $this->input->post('product_id')])->get('products')->result_array();
			$userProducts = array(
				'user_id' => $this->input->post('user_id'),
				'product_id' => $this->input->post('product_id'),
				'phase' => '1',
				'created_date' => date('Y-m-d H:m:s'),
				'product_status' => '0',
			);

            $transaction = array(
				'user_id' => $this->input->post('user_id'),
				'amount' => $product_category[0]['product_price'],
				'product_id' => $this->input->post('product_id'),
				'product_category' => $product_category[0]['product_category'],
				'gateway' => 'coinbase',
				'purchase_date' => date('Y-m-d H:m:s'),
				'updated_at' => date('Y-m-d H:m:s'),
			);
			
			$res = $this->db->insert('userproducts', $userProducts);
			$res2 = $this->db->insert('transactions', $transaction);
			if($res && $res2){
				$response = array(
					'status' => '200',
					'message' => 'User Poduct Added successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to add data',
				);
			}
			echo json_encode($response);  

		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function squarePayment(){
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            error_log('Received a non-POST request');
            echo 'Request not allowed';
            http_response_code(405);
            return;
          }
          $json     = file_get_contents('php://input');
          $data     = json_decode($json);
          $token    = $data->token;
          $idempotencyKey = $data->idempotencyKey;
          $requestData = $data->requestData;
          if(isset($requestData->product_id) && $requestData->product_id !=''){
            $productPrice = $requestData->final_product_price;
            $square_client = new SquareClient([
                'accessToken'   => SQUARE_ACCESS_TOKEN,
                'environment'   => SQUARE_ENVIRONMENT,
                'userAgentDetail' => 'sample_app_php_payment',
            ]);
            
            $payments_api = $square_client->getPaymentsApi();
                        
            $money = new Money();
            $money->setAmount($productPrice*100);
            $money->setCurrency($this->getCurrency());
            
            try {
                $create_payment_request = new CreatePaymentRequest($token, $idempotencyKey, $money);
                $create_payment_request->setLocationId($this->getId());
            
                $response = $payments_api->createPayment($create_payment_request);
            
                if ($response->isSuccess()) {
                    $this->squareSuccess($requestData,$response->getResult());
                    echo json_encode($response->getResult());
                } else {
                    echo json_encode(array('errors' => $response->getErrors()));
                }
            } catch (ApiException $e) {
                echo json_encode(array('errors' => $e));
            }
        }else{
            echo json_encode(array('errors' => 'Invalid Request'));
        }
    }

    public function squareSuccess($requestData,$dump)
	{        
        try {
            $product_category = $this->db->where(['product_id' => $requestData->product_id])->get('products')->row_array();
            $accountCreate = $this->autoAccountCreate($requestData);
			$userProducts = array(
				'user_id'       => $requestData->user_id,
				'product_id'    => $requestData->product_id,
				'product_price' => $requestData->product_price,
				'product_discount' => $requestData->product_discount,
				'final_product_price' => $requestData->final_product_price,
				'phase'         => '1',
				'created_date'  => date('Y-m-d H:m:s'),
				'product_status'=> '1',
				'payment_status'=> 1,

                'account_id' => $accountCreate['account_num'],
				'account_password' =>  $accountCreate['password'],
				'server' =>  $accountCreate['server'],
				'ip' =>  $accountCreate['ip'],
				'port' =>  $accountCreate['port'],
				'equity' => $accountCreate['equity'],
			);

            $transaction = array(
				'user_id'       => $requestData->user_id,
				'amount'        => $requestData->final_product_price,
				'product_id'    => $requestData->product_id,
				'product_category' => $product_category['product_category'],
				'gateway'       => 'square',
                'flag'          =>  1,
                'txn_type'      => 1,
				'payment_status'=> 1,
				'purchase_date' => date('Y-m-d H:m:s'),
				'updated_at'    => date('Y-m-d H:m:s'),
                'dump'          =>  json_encode($dump)
			);
			
			if($this->db->insert('userproducts', $userProducts)){
                if( $this->db->insert('transactions', $transaction)){
                    $lastTxnId = $this->db->insert_id();
                    $orderId = 'EQ'.$lastTxnId.'LTD';
                    if(isset($_SESSION['affiliate_by']) && ($_SESSION['affiliate_by'] != '')){
                        $this->addAffilatePoint($requestData,$_SESSION['affiliate_by'],$lastTxnId);
                    }
                    $response = array(
                        'status' => '200',
                        'message' => 'User Poduct Added successfully',
                    );
                    $email = $this->db->where(['user_id' =>  $requestData->user_id])->get('user')->result_array();
                    $productName = $this->db->where(['product_id' =>  $requestData->product_id])->get('products')->result_array();
                    $final_product_name = $productName[0]['product_name'].' '. $product_category['product_category'];
                    $userName = $email[0]['first_name'].' '.$email[0]['last_name'];

                    $this->send_user_email($email[0]['email'], $userName, $orderId, $requestData->product_price, $final_product_name, $requestData->final_product_price );
                }else{
                    $response = array(
                        'status' => '400',
                        'message' => 'Unable to add data',
                    );
                }
            }else{
                $response = array(
					'status' => '400',
					'message' => 'Unable to add data',
				);
            }
			return $response;  

		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function addAffilatePoint($requestData,$affiliate_by,$refId)
	{        
        try {
            $affiliate_user = $this->db->where(['affiliate_code' => $affiliate_by])->get('user')->row_array();
            if(!empty($affiliate_user)){
                $affiliate_user_count = $this->db->where(['user_id' => $affiliate_user['user_id'],'txn_type' => 3])->get('transactions')->num_rows();
                $query = "SELECT percentage FROM affiliate_slab WHERE $affiliate_user_count BETWEEN min_range AND max_range";
                $affiliate_percentage = $this->db->query($query)->row_array()['percentage'];
                
                $transaction = array(
                    'user_id'       =>  $affiliate_user['user_id'],
                    'amount'        =>  (($requestData->final_product_price*$affiliate_percentage)/100),
                    'product_id'    =>  $requestData->product_id,
                    'flag'          =>  0,
                    'txn_type'      =>  3,
                    'ref_id'        =>  $refId,
                    'comments'      =>  'referral amount',
                    'purchase_date' =>  date('Y-m-d H:m:s'),
                    'updated_at'    =>  date('Y-m-d H:m:s'),
                );
                
                $this->db->insert('transactions', $transaction);
            }
            return true;
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

    public function amazonPay(){

        $amazonpay_config = array(
            'public_key_id' => 'SANDBOX-AE4FD7KU2KXHY6UEW3HI3QBB',
            'private_key'   => 'sandbox.pem',
            'region'        => 'US',
            'sandbox'       => true,
            'algorithm'     => 'AMZN-PAY-RSASSA-PSS-V2'
        );

        $payload = array(
            'webCheckoutDetail' => array(
                'checkoutReviewReturnUrl' => 'https://localhost/store/checkout_review',
                'checkoutResultReturnUrl' => 'https://localhost/store/checkout_result'
            ),
            'storeId' => 'amzn1.application-oa2-client.3f77e56a623e45ca8fcece1d8045c39f'
        );

        $payload = json_encode($payload);

        $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        try {
            $client = new Amazon\Pay\API\Client($amazonpay_config);
            $result = $client->createCheckoutSession($payload, $headers);
            if ($result['status'] === 201) {
                // created
                $response = json_decode($result['response'], true);
                $checkoutSessionId = $response['checkoutSessionId'];
                echo "checkoutSessionId=$checkoutSessionId\n";
            } else {
                // check the error
                echo 'status=' . $result['status'] . '; response=' . $result['response'] . "\n";
            }
        } catch (\Exception $e) {
            // handle the exception
            echo $e . "\n";
        }







        // $config = [
        //     'merchant_id' => 'A2EN18MJPAR45R',
        //     'access_key' => 'AKIAJSIU4KMNQOU5SYZQ',
        //     'secret_key' => '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',
        //     'region' => 'us',
        //     'sandbox' => true, // Set to false for production environment
        // ];
        
        // $client = new Client($config);

        // $payload = [
        //     'webCheckoutDetails' => [
        //         'checkoutReviewReturnUrl' => 'https://example.com/checkout-review',
        //         'checkoutResultReturnUrl' => 'https://example.com/checkout-result',
        //     ],
        //     'paymentDetails' => [
        //         'paymentIntent' => 'AuthorizeAndCapture',
        //         'canHandlePendingAuthorization' => true,
        //         'chargeAmount' => [
        //             'amount' => '10.00',
        //             'currencyCode' => 'USD',
        //         ],
        //     ],
        // ];
        // $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        // $response =  $client->createCheckoutSession($payload, $headers);
        // print_r($response); die;

        // if ($response->getStatusCode() === 201) {
        //     $checkoutSessionId = $response->getCheckoutSessionId();
        //     // Redirect the user to the Amazon Pay checkout page or perform additional actions
        // } else {
        //     // Handle the error
        //     $error = $response->getBody();
        //     echo 'Error creating checkout session: ' . $error['message'];
        // }







        // $result = $client->instoreMerchantScan($payload);

        // $response = json_decode($result['response'], true);
        // print_r($response); die;
        // if (isset($_GET['access_token'])) {
        //     $response = $client->getBuyerToken($_GET['access_token']);

        //     if ($response->isSuccess()) {
        //         $buyerToken = $response->getToken();
        //         // Process the buyer token and complete the payment flow
        //         // You can access the buyer's details using $response->getBuyerDetails()
        //         // and perform additional actions as needed
        //         // For example, you might want to store the buyer's information in your database

        //         // Retrieve the amount and additional data
        //         $amount = $_GET['amount'];
        //         $additionalData = $_GET['additionalData'];

        //         // Use the amount and additional data in your payment processing logic
        //         // ...

        //         // Example: Log the amount and additional data
        //         echo "Amount: $amount<br>";
        //         echo "Additional Data: $additionalData<br>";
        //     } else {
        //         echo 'An error occurred: ' . $response->getErrorMessage();
        //     }
        // }
    }

    public function checkCoupon(){
        $code = $this->input->post('code');
        $product_price = $this->input->post('product_price');
        
        $res = $this->db->where(['code' => $code])->get('coupons')->result_array();
        
        if($res){
            $product_discount = round($product_price *  ($res[0]['percentage']/100));
            $final_product_price = round($product_price - ($product_price *  ($res[0]['percentage']/100)));
			$response = array(
				'status' => '200',
				'message' => 'Coupon Code Valid',
                'percentage' => $res[0]['percentage'],
                'final_product_price' => $final_product_price,
                'product_discount' => $product_discount,
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'Invalid coupon code',
			);
		}
		echo json_encode($response);  
    }
    
    //send mail for passing phases
    //violation_type = 0,1,2
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
        $account = $this->db->where(['product_id' => $requestData->product_id])->get('products')->row_array();
        $user = $this->db->where(['user_id' => $requestData->user_id])->get('user')->row_array();
		$groupCode = $this->db->get('group_code')->row_array();
        $account_size = $account['account_size'];
        $passAcc_size = $account['account_size']/1000;
        $acc_type = $account['product_category'];        

        $master_password = $user['first_name'].$passAcc_size.'K'; 
        $investor_password = $user['last_name'].$passAcc_size.'K'; 
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

			$file_path= 'storage/accountCreate/'.date('Y-m-d').'_createAccount.log';

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
}