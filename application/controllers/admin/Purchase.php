<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends APIMaster {

	public function __construct(){
        parent::__construct();
        $this->verifyAdminAuth();
    }

	//----------servers starts--------------
	public function servers(){
        $this->load->view('admin/servers');
	}
	public function getServerDetails(){
		$iD = $this->input->post('id');
		$response = $this->db->where(['id' =>  $iD])->get('servers')->result_array();
		echo json_encode($response);
	}
	public function editServer(){
		$data = array(
			'serverName' =>  $this->input->post('server'),
			'sip' =>  $this->input->post('ip'),
			'sPort' =>  $this->input->post('port'),
			'p_type' =>  $this->input->post('cat'),
		);
		$iD = $this->input->post('id');
		$res = $this->db->where(['id' =>  $iD])->update('servers', $data);
		if($res){
			$response = array(
				'status' => '200',
				'message' => 'Added successfully',
			);
		}else{
			$response = array(
				'status' => '400',
				'message' => 'Unable to add data',
			);
		}
		echo json_encode($response);  
	}
	public function serversTable(){
		$response['data'] = $this->db->get('servers')->result_array();
		echo  json_encode($response);

	}
	//----------end servers--------------------------------



	//-----------credentials------------
	public function getCredentials(){
		$iD = $this->input->post('id');
		$response = $this->db->where(['id' =>  $iD])->get('userproducts')->result_array();
		echo json_encode($response);
	}
	public function addCredentials(){
		$addEquity = $this->accounts(
			$this->input->post('account_id'),
			$this->input->post('account_password'),
			$this->input->post('ip'),
			$this->input->post('port')
		);

		if($addEquity){
			$data = array(
				'account_id' => $this->input->post('account_id'),
				'account_password' =>  $this->input->post('account_password'),
				'server' =>  $this->input->post('server'),
				'ip' =>  $this->input->post('ip'),
				'port' =>  $this->input->post('port'),
				'product_status' =>  '1',
				'equity' => $addEquity['equity']
			);
	
			$iD = $this->input->post('id');
			
			$res = $this->db->where(['id' =>  $iD])->update('userproducts', $data);
	

			//semding credentials email to user
			$this->db->select('userproducts.user_id, user.email');
			$this->db->from('userproducts');
			$this->db->join('user', 'userproducts.user_id=user.user_id');
			$this->db->where(['id' => $iD, 'payment_status' => '1']);
			$check = $this->db->get()->result_array();

			$this->send_credentials_email($check[0]['email'], $this->input->post('account_id'), $this->input->post('account_password'), $this->input->post('server'), $addEquity['balance']);

			if($res){
				$response = array(
					'status' => '200',
					'message' => 'Added successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to add data',
				);
			}
			echo json_encode($response);  
		}else{
			$response = array(
				'status' => '401',
				'message' => 'Wrong Account Credentials',
			);
			echo json_encode($response);  
		}
	}

	//-------phase 1------
	public function phase1(){
		$response['servers'] = $this->db->get('servers')->result_array();
        $this->load->view('admin/phase-1',$response);
	}
	public function getPhase1Pending(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['phase'=> '1', 'product_status'=>'0'])->get()->result_array();
		echo  json_encode($response);
	}

	//-------phase 2------
	public function phase2(){
		$response['servers'] = $this->db->get('servers')->result_array();
        $this->load->view('admin/phase-2', $response);
	}
	public function getPhase2Pending(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['phase'=> '2', 'product_status'=>'0'])->get()->result_array();
		echo  json_encode($response);
	}

	//-------phase 3------
	public function phase3(){
		$response['servers'] = $this->db->get('servers')->result_array();
        $this->load->view('admin/phase-3', $response);
	}
	public function getPhase3Pending(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['phase'=> '3', 'product_status'=>'0'])->get()->result_array();
		echo  json_encode($response);
	}

	//completed
	public function completed(){
        $this->load->view('admin/completed');
	}
	public function getCompleted(){
        $this->db->select('*');
        $this->db->from('userproducts');
        $this->db->join('products', 'userproducts.product_id=products.product_id');
        $this->db->join('user', 'userproducts.user_id=user.user_id');
        $response['data'] = $this->db->where(['product_status'=>'1'])->get()->result_array();

		echo  json_encode($response);
	}

	//get equity
	public function accounts($accountId, $password, $host, $port){
        $token = $this->get_curl('https://mt5.mtapi.be/Connect?user='.$accountId.'&password='.$password.'&host='.$host.'&port='.$port);
        $accountSummary = $this->accountSummary($token);
        return json_decode($accountSummary, true);
    }
    public function accountSummary($token){
        return $this->get_curl('https://mt5.mtapi.be/AccountSummary?id='.$token);
    }
    public function get_curl($url){
        $curl = curl_init();
        curl_setopt_array(
			$curl, array(
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
			)
		);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

	//send mail for credentials
	public function send_credentials_email($user_email, $accountId,  $password, $server, $balance){
		$this->load->helper('email_helper');
		$this->load->library('mailer');

		$body = file_get_contents(base_url('assets/mail/crdentialsEmail.html'));
		$content = '<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
							<td align="left" bgcolor="#CCCCCC" width="75%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								<strong>Account Details:</strong></td>
							<td align="left" bgcolor="#CCCCCC" width="25%" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								<strong></strong>
							</td>
							</tr>
							<tr>
							<td align="left" width="75%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								Account</td>
							<td align="left" width="25%" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								'.$accountId.'</td>
							</tr>
							<tr>
							<td align="left" width="75%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								Password</td>
							<td align="left" width="25%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								'.$password.'</td>
							</tr>
							<tr>
							<td align="left" width="75%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								Server</td>
							<td align="left" width="25%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								'.$server.'</td>
							</tr>
							<tr>
							<td align="left" width="75%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								Leverage</td>
							<td align="left" width="25%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								1:100</td>
							</tr>
							<tr>
							<td align="left" width="75%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								Balance</td>
							<td align="left" width="25%"
								style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
								'.$balance.'</td>
							</tr>
						</table>
					</td>';
		$finaltemp = str_replace("{CONTENT}", $content, $body);

		$email = send_email($user_email, 'Equinox Account Credentials', $finaltemp,'','',2);

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
