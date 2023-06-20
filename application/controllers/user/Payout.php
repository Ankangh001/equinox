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
					'message' => "Sorry! You can't request two payouts within a month.",
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
		// $this->send_credentials_email();

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
										<span style="font-size: 18px; line-height: 35.2px;">Payout Request
										Dear , '.$name.', </span>
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
															<td align="left" bgcolor="#CCCCCC" width="75%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong>Account Details:</strong>
															</td>
															<td align="left" bgcolor="#CCCCCC" width="25%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong></strong>
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Account
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$accountId.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Password
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$password.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Server
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$server.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Leverage
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																1:100
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Balance
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
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
															<td align="left" bgcolor="#CCCCCC" width="75%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong>Account Details:</strong>
															</td>
															<td align="left" bgcolor="#CCCCCC" width="25%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong></strong>
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Account
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$accountId.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Password
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$password.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Server
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$server.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Leverage
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																1:100
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Balance
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
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
															<td align="left" bgcolor="#CCCCCC" width="75%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong>Account Details:</strong>
															</td>
															<td align="left" bgcolor="#CCCCCC" width="25%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																<strong></strong>
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Account
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$accountId.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Password
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$password.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Server
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																'.$server.'
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Leverage
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																1:100
															</td>
														</tr>
														<tr>
															<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																Balance
															</td>
															<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
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
	
			$email = send_email($user_email, 'Evaluation Account Credentials', $finaltemp,'','',2);
	
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
