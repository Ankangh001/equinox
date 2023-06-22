<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	
	public function pending(){
		$this->load->view('admin/pending');
	}

	public function getPendingPayouts(){
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'0'])->get()->result_array();
		echo  json_encode($response);
	}


	public function getPayout(){
		$payoutId = $this->input->post('payout_id');
		
		// $this->db->select('*');
        // $this->db->from('payout_history');
        // $this->db->join('user', 'payout_history.user_id=user.user_id');
        // $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		// $this->db->join('products', 'userproducts.product_id=products.product_id');
        // $response = $this->db->where(['payout_status'=>'0', 'payout_id'=>$payoutId])->get()->result_array();

        $response = $this->db->where(['payout_id'=>$payoutId])->get('payout_history')->result_array();
		echo json_encode($response);
	}

	public function approvePayout(){
		try {
			$get_payout = $this->db->where(['payout_id' => $this->input->post('payout_id') ])->get('payout_history')->result_array();
			
			$user_id = $get_payout[0]['user_id'];
			$account_number = $get_payout[0]['mt5_accountNum'];
			$payout_amount = $get_payout[0]['amount'];
			$payout_type = $get_payout[0]['payout_type'];

			if($payout_type == "Affiliate"){
				$check = $this->db->select('user.email, user.first_name, user.last_name')->where(['user_id' => $user_id])->get('user')->result_array();
				$email = $check[0]['email'];
				$name = $check[0]['first_name'].' '.$check[0]['last_name'];
				$affiliateAmount = $payout_amount;

				$transaction = array(
					'user_id'       => $user_id,
					'amount'        => $payout_amount,
					'flag'          =>  1,
					'txn_type'      => 3,
					'payment_status'=> '0',
					'purchase_date' => date('Y-m-d H:m:s'),
					'updated_at'    => date('Y-m-d H:m:s'),
				);
				
				$this->db->insert('transactions', $transaction);

				$this->send_payout_email($email, $name, "", "", "", $affiliateAmount, "APPROVED", "AFFILIATE");
			}else{
				$this->db->select('userproducts.*, products.*, user.email, user.first_name, user.last_name');
				$this->db->from('userproducts');
				$this->db->join('user', 'userproducts.user_id=user.user_id');
				$this->db->join('products', 'userproducts.product_id=products.product_id');
				
				$check = $this->db->where(['account_id' => $account_number])->get()->result_array();
				// print_r($check);
				
				$email = $check[0]['email'];
				$name = $check[0]['first_name'].' '.$check[0]['last_name'];
				$account_num = $check[0]['account_id'];
				$account_size = $check[0]['account_size'];
				$product_category = $check[0]['product_category'];
				$grossAmount = $payout_amount;
				
				$this->send_payout_email($email, $name, $product_category, $account_size, $account_num, $grossAmount, "APPROVED", "PROFIT");
			}
			
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->update('payout_history', ['payout_status' => '1']);
            
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to update kyc status',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function rejectPayout(){
		try {
			$get_payout = $this->db->where(['payout_id' => $this->input->post('payout_id') ])->get('payout_history')->result_array();
			$user_id = $get_payout[0]['user_id'];
			$account_number = $get_payout[0]['mt5_accountNum'];
			$payout_amount = $get_payout[0]['amount'];
			$payout_type = $get_payout[0]['payout_type'];

			if($payout_type == "Affiliate"){
				$check = $this->db->select('user.email, user.first_name, user.last_name')->where(['user_id' => $user_id])->get('user')->result_array();
				$email = $check[0]['email'];
				$name = $check[0]['first_name'].' '.$check[0]['last_name'];
				$affiliateAmount = $payout_amount;
				$this->send_payout_email($email, $name, "", "", "", $affiliateAmount, "REJECT", "AFFILIATE");
			}else{
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
				
				$this->send_payout_email($email, $name, $product_category, $account_size, $account_num, $grossAmount, "REJECT", "PROFIT");
        	}
			
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->update('payout_history', ['payout_status' => '2']);
			
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to update kyc status',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function deletetPayout(){
		try {
			$res = $this->db->where(['payout_id'=>$this->input->post('payout_id')])->delete('payout_history');
            
			if($res){
				$response = array(
					'status' => '200',
					'message' => 'User KYC Updated successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to update kyc status',
				);
			}
			echo json_encode($response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}


	//approved----------
	public function approved()
	{
		$this->load->view('admin/approved');
	}
	public function getApprovedPayouts()
	{
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'1'])->get()->result_array();
		echo  json_encode($response);
	}

	//declined-----------
	public function declined()
	{
        $this->load->view('admin/declined');
	}
	public function getDeclinedPayouts()
	{
		$this->db->select('*');
        $this->db->from('payout_history');
        $this->db->join('user', 'payout_history.user_id=user.user_id');
        $this->db->join('userproducts', 'userproducts.account_id=payout_history.mt5_accountNum');
		$this->db->join('products', 'userproducts.product_id=products.product_id');
        $response['data'] = $this->db->where(['payout_status'=>'2'])->get()->result_array();
		echo  json_encode($response);
	}

	//send mail for credentials
	public function send_payout_email($user_email, $name, $product_category, $account_size, $account_num, $grossAmount, $status, $type){
		$this->load->helper('email_helper');
		$this->load->library('mailer');

		if($status == 'APPROVED' && $type == "AFFILIATE"){
			$body = file_get_contents(base_url('assets/mail/crdentialsEmail.html'));
			$subject ='Affiliate account payout status';

			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">
										Dear '.$name.', <br/>
										Your payout has been approved
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
															Account Type
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Affiliate
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
									Feel free to contact us for assiatance regarding anything.
								</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}elseif ($status == 'APPROVED' && $type == "PROFIT") {
			$subject ='Funded account payout status';
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">
										Dear '.$name.', <br/>
										Your payout has been approved
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
									Feel free to contact us for assiatance regarding anything.
								</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}elseif($status == "REJECT" && $type == "AFFILIATE") {
			$subject ='Affiliate account payout status';
			$body = file_get_contents(base_url('assets/mail/payoutDenied.html'));
			$content = '
			<tbody>
				<tr>
					<td align="left">
						<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
							<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
								<p style="font-size: 14px; line-height: 160%;">
									<span style="font-size: 18px; line-height: 35.2px;">
										Dear '.$name.', <br/>
										Your payout has been rejected.
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
															Account Type
														</td>
														<td align="right" width="50%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
															Affiliate
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
									Feel free to contact us for assiatance regarding anything.
								</span>
							</p>
						</div>
					</td>
				</tr>
			</tbody>';
		}elseif($status == "REJECT" && $type == "PROFIT") {
			$subject ='Funded account payout status';
			$body = file_get_contents(base_url('assets/mail/payoutDenied.html'));
			$content = '
				<tbody>
					<tr>
						<td align="left">
							<div style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
								<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;">
									<p style="font-size: 14px; line-height: 160%;">
										<span style="font-size: 18px; line-height: 35.2px;">
											Dear '.$name.', <br/>
											Your payout has been rejected
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
										Feel free to contact us for assiatance regarding anything.
									</span>
								</p>
							</div>
						</td>
					</tr>
				</tbody>';
		}
		$finaltemp = str_replace("{CONTENT}", $content, $body);

		$email = send_email($user_email, $subject, $finaltemp,'','',3);

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
