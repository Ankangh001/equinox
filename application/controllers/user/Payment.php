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
				'product_status'=> '0',
				'payment_status'=> $status,
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
            // $productPrice = $this->db->select('product_price')->where(['product_id' => $requestData->product_id])->get('products')->row_array()['product_price'];
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
			$userProducts = array(
				'user_id'       => $requestData->user_id,
				'product_id'    => $requestData->product_id,
				'product_price' => $requestData->product_price,
				'product_discount' => $requestData->product_discount,
				'final_product_price' => $requestData->final_product_price,
				'phase'         => '1',
				'created_date'  => date('Y-m-d H:m:s'),
				'product_status'=> '0',
				'payment_status'=> 1,
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

        $content = '<td align="left" bgcolor="#ffffff" style="margin-auto; padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
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