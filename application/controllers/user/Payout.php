<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index(){
        $res['res'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('user')->result_array();
        $this->load->view('user/payout', $res);
	}

    public function getAccounts(){
        $user_id = $this->input->post('user_id');
        $res = $this->db->where(['user_id' => $user_id, 'phase' => '3', 'product_status' => '2', 'metrics_status' => '1'])->get('userproducts')->result_array();

        if($res){
			$response = array(
				'status' => '200',
				'message' => 'Added successfully',
                'data' => $res
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'You dont have any funded accounts yet.',
			);
		}
		echo json_encode($response);  
    }

	public function getAccountBalance(){
        $accountId = $this->input->post('number');
        $res = $this->db->where(['account_id' => $accountId, 'phase' => '3'])->get('userproducts')->result_array();

        if($res){
			$last_payout_date = $res[0]['payoutDate'];
			$add30days = date('Y-m-d H:m:s', strtotime($last_payout_date. ' +30 days'));
	
			$current_date = date('Y-m-d H:m:s');
	
			if($current_date > $add30days){ //can take payout
				$response = array(
					'status' => '200',
					'message' => 'success',
					'data' => $res
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => "Sorry! You can't request payout now.",
					'data' => $res
				);
			}
		}else{
			$response = array(
				'status' => '400',
				'message' => 'You dont have any funded accounts yet.',
			);
		}
		
		echo json_encode($response);  
    }

	public function getPayouts(){
        $res['data'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('payout_history')->result_array();
		echo json_encode($res);  
    }

	public function requestPayout()
	{
		// print_r($this->input->post());die;
		$data = array(
			'user_id' => $this->input->post('user_id'),
			
			'payout_type' =>  $this->input->post('payoutType'),
			'mt5_accountNum' =>  $this->input->post('mt5Acc'),
			'payment_mode' =>  $this->input->post('paymentMode'),
			'amount' =>  $this->input->post('payoutAmount'),
			'wallet_address' =>  $this->input->post('emailWalletAddress'),
			
			//for bank transfer
			'receipant_name' =>  $this->input->post('receipantName'),
			'receipant_address' =>  $this->input->post('receipantAddress'),
			'account_iban' =>  $this->input->post('accountNumber'),
			'sort_code' =>  $this->input->post('sortCode'),
			'swift_code' =>  $this->input->post('swiftCode'),
			'bank_name' =>  $this->input->post('bankName'),
			'branch_address' =>  $this->input->post('branchAddress'),
			
			'payout_date' =>  date('Y-m-d H:m:s'),
		);

		
		$res = $this->db->insert('payout_history', $data);
		$id = $this->db->insert_id();
		
        $get_payout = $this->db->where(['payout_id' => $id])->get('payout_history')->result_array();

		$user_id = $get_payout[0]['user_id'];
		$account_number = $get_payout[0]['mt5_accountNum'];
		$payout_amount = $get_payout[0]['amount'];
		
		
		
		$this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
        $this->db->from('userproducts');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
		
        $check = $this->db->where(['account_id' => $account_number])->get()->result_array();
		
		
        $email = $check[0]['email'];
        $name = $check[0]['first_name'].' '.$check[0]['last_name'];
        $account_num = $check[0]['account_id'];
        $account_size = $check[0]['account_size'];
        $product_category = $check[0]['product_category'];
		$grossAmount = $payout_amount;

		
		$this->send_credentials_email($email, $name, $product_category, $account_size, $account_num, $grossAmount);
		
		$res2 = $this->db->where(['account_id'=>$this->input->post('mt5Acc')])
		->update('userproducts',['payoutDate'=>date('Y-m-d H:m:s')]);

		if($res){
			$response = array(
				'status' => '200',
				'message' => 'Payout Added successfully',
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'Unable to add payout',
			);
		}
		echo json_encode($response);  
	}


		//send mail for credentials
		public function send_credentials_email($user_email, $name, $product_category, $account_size, $account_num, $grossAmount){
			$this->load->helper('email_helper');
			$this->load->library('mailer');
	
			$body = file_get_contents(base_url('assets/mail/crdentialsEmail.html'));
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">
										Payout Request<br/>
										Dear '.$name.', 
									</span>
								</p>
								<br />
								<br />
								<table style="font-size: 12px;width: 100%;text-align: center;" align="center">
									<tbody>
										<tr>
											<td align="left" bgcolor="#ffffff" style="padding: 0px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td align="left" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong>Your account details:</strong>
														</td>
														<td align="right" bgcolor="#CCCCCC" width="50%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															<strong></strong>
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Phase
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Evaluation Funded
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Account Type
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$product_category.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Account Size
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															$'.number_format($account_size, 0, '.',',').'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															MT5 Account Number
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															'.$account_num.'
														</td>
													</tr>
													<tr>
														<td align="left" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Payout Amount
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															$'.round($grossAmount, 2).'
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
								<span style="font-size: 18px; line-height: 28.8px;">
									We have received your request and it will be processed within 3 Business days.<br/>
									Feel free to contact us for assiatance regarding anything.
								</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
			$finaltemp = str_replace("{CONTENT}", $content, $body);
	
			$email = send_email($user_email, 'Funded account payout request', $finaltemp,'','',3);
	
			if($email){
				$response = array(
					"success" => 1,
					"message" => "Your payout mail is send."
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
