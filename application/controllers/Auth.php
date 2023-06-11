<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends APIMaster {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->CI =& get_instance();
	}

	public function index(){

		if($this->session->has_userdata('is_admin_login')){
			redirect('dashboard');
		}
		else{
			redirect('client-login');
		}
	}

	//--------------------------------------------------------------
    public function login()
    {
        if (empty($this->input->post())):
            $this->returnResponse(0, "Invalid request!");
        endif;
        $user = $this->input->post('email');
        $pass = $this->input->post('password');
        $type = $this->input->post('type');

        if (empty($user) || empty($pass)):
            $this->returnResponse(0, "All param required!");
        endif;

        $res = $this->AppLogin->PanelLogin($user, $pass,$type);
        if ($res['success'] == 1) {
			if ($this->decryptAES($res['data']['password']) == $pass){
				$user_data = $res['data'];
				$this->session->set_userdata("user_id", $user_data['user_id']);
				$this->session->set_userdata("email", $user_data['email']);
				$this->session->set_userdata("admin_type", $user_data['admin_type']);
				$this->session->set_userdata("user_name", $user_data['user_name']);
				$this->session->set_userdata("affiliate_code", $user_data['affiliate_code']);
	
				//store data in login analaytics
				$generateToken = rand(10,100).$user_data['user_id'].''.$user_data['user_id'].''.$user_data['email'];
				$generateToken = base64_encode($generateToken);
				$insertData['user_id'] 	= $user_data['user_id'];
				$insertData['device'] 	= $_SERVER['HTTP_USER_AGENT'];
				$insertData['device_id'] = 1;
				$insertData['token'] 	= $generateToken;
				$insertData['status'] 	= 1;
				$insertData['created_date'] = date('Y-m-d H:i:s');
				$this->session->set_userdata("token", $generateToken);
	
				$this->db->insert('login_analytics',$insertData);
				$lastId = $this->db->insert_id();
				$this->db->query("update login_analytics set status=0 where auto_id!='$lastId' and user_id='{$user_data['user_id']}'");
	
				//set token in cookie
				$cookie_name = "API_TOKEN";
				$cookie_value = $generateToken;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
				if( $user_data['admin_type']=='Client'){
					$res['data']['redirect_url']=base_url('user');
				}else if( $user_data['admin_type']=='Admin'){
					$res['data']['redirect_url']=base_url('admin');
				}
			}else{
				$res['success'] = 0;
				$res['message'] = "Your password is incorrect, enter valid password!";
			}
        }

        $this->jsonOutput($res);
    }

    public function logout()
    {
        //update status and destroy cookie
        $API_TOKEN = $_COOKIE['API_TOKEN'];
        $this->db->where('token',$API_TOKEN);
        $result = $this->db->update('login_analytics', array('status'=>0));
        if($result){
            setcookie("API_TOKEN", "", time()-3600);
            unset($_COOKIE['API_TOKEN']);
        }

        session_destroy();
        header("Location: " . base_url('client-login'));
    }

	//-------------------------------------------------------------------------
	public function register(){
		$body = '<table border="0" cellspacing="0" cellpadding="0" align="center" id="m_-7626415423304311386email_table" style="border-collapse:collapse">
		<tbody>
		  <tr>
			<td id="m_-7626415423304311386email_content" style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
			  <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
				<tbody>
				  <tr>
					<td height="20" style="line-height:20px" colspan="3">&nbsp;</td>
				  </tr>
				  <tr>
					<td height="1" colspan="3" style="line-height:1px"></td>
				  </tr>
				  <tr>
					<td>
					  <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;text-align:center;width:100%">
						<tbody>
						  <tr>
							<td width="15px" style="width:15px"></td>
							<td style="line-height:0px;max-width:600px;padding:0 0 15px 0">
							  <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
								<tbody>
								  <tr>
									<td style="width:100%;text-align:left;height:33px"><img height="33" src="https://ci4.googleusercontent.com/proxy/H-WMBt20rSRWwIK0YLwC8Uyi1mnXWEEEiUT0twBA78N4_Rbri9VuqAL_Azd6xVjLkSiTQ6r1RjyDJ2Hx1O_3UqLo4H_LxG1o8LHL4yDfZw=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yb/r/QTa-gpOyYBa.png" style="border:0" class="CToWUd" data-bit="iit"></td>
								  </tr>
								</tbody>
							  </table>
							</td>
							<td width="15px" style="width:15px"></td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td>
					  <table border="0" width="430" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto">
						<tbody>
						  <tr>
							<td>
							  <table border="0" width="430px" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto;width:430px">
								<tbody>
								  <tr>
									<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td>
								  </tr>
								  <tr>
									<td>
									  <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
										<tbody>
										  <tr>
											<td>
											  <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
												<tbody>
												  <tr>
													<td width="20" style="display:block;width:20px">&nbsp;&nbsp;&nbsp;</td>
													<td>
													  <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
														<tbody>
														  <tr>
															<td>
															  <p style="margin:10px 0 10px 0;color:#565a5c;font-size:18px">Hi Jane Doe!</p>
															  <p style="margin:10px 0 10px 0;color:#565a5c;font-size:18px">You updated your <span class="il">email</span> address to <span style="color:#2b5a83" id="m_-7626415423304311386body_email"><a href="mailto:jane@gmail.com" target="_blank">Jdoe@gmail.com</a></span>. <span class="il">Confirm</span> your <span class="il">email</span> address to continue capturing and sharing your moments with the world.</p>
															</td>
														  </tr>
														  <tr>
															<td height="20" style="line-height:20px">&nbsp;</td>
														  </tr>
														  <tr>
															<td><a href="https://instagram.com/accounts/confirm_email/S5s9GbL6/cnVhc2luZ2hlMDFAZ21haWwuY29t/?app_redirect=False" style="color:#1b74e4;text-decoration:none;display:block;width:370px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://instagram.com/accounts/confirm_email/S5s9GbL6/cnVhc2luZ2hlMDFAZ21haWwuY29t/?app_redirect%3DFalse&amp;source=gmail&amp;ust=1658914278556000&amp;usg=AOvVaw1eF_-1j16FhP8HtQVHGD6s">
																<table border="0" width="390" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
																  <tbody>
																	<tr>
																	  <td style="border-collapse:collapse;border-radius:3px;text-align:center;display:block;border:solid 1px #009fdf;padding:10px 16px 14px 16px;margin:0 2px 0 auto;min-width:80px;background-color:#47a2ea"><a href="https://instagram.com/accounts/confirm_email/S5s9GbL6/cnVhc2luZ2hlMDFAZ21haWwuY29t/?app_redirect=False" style="color:#1b74e4;text-decoration:none;display:block" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://instagram.com/accounts/confirm_email/S5s9GbL6/cnVhc2luZ2hlMDFAZ21haWwuY29t/?app_redirect%3DFalse&amp;source=gmail&amp;ust=1658914278556000&amp;usg=AOvVaw1eF_-1j16FhP8HtQVHGD6s">
																		  <center>
																			<font size="3"><span style="font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#fdfdfd;font-size:16px;line-height:16px"><span class="il">Confirm</span>&nbsp;<span class="il">email</span>&nbsp;address</span></font>
																		  </center>
																		</a></td>
																	</tr>
																  </tbody>
																</table>
															  </a></td>
														  </tr>
														  <tr>
															<td height="20" style="line-height:20px">&nbsp;</td>
														  </tr>
														</tbody>
													  </table>
													</td>
												  </tr>
												</tbody>
											  </table>
											</td>
										  </tr>
										</tbody>
									  </table>
									</td>
								  </tr>
								  <tr>
									<td height="10" style="line-height:10px" colspan="1">&nbsp;</td>
								  </tr>
								</tbody>
							  </table>
							</td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td>
					  <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto;width:100%;max-width:600px">
						<tbody>
						  <tr>
							<td height="4" style="line-height:4px" colspan="3">&nbsp;</td>
						  </tr>
						  <tr>
							<td width="15px" style="width:15px"></td>
							<td width="20" style="display:block;width:20px">&nbsp;&nbsp;&nbsp;</td>
							<td style="text-align:center">
							  <div style="padding-top:10px;display:flex">
								<div style="margin:auto"><img src="https://ci6.googleusercontent.com/proxy/pRYI2TbhM8BeN9HOPOYG04uysXDTQaVWXj0x5Vm1EjWRwm5wgY4_f0FRkYjitTikR83zOf1Y-QJdSnN4WuF7agW7ThCWfKM8ZPkTdH3Xtg=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yX/r/myE1ua6bwfE.png" height="26" width="52" alt="" class="CToWUd" data-bit="iit"></div><br>
							  </div>
							  <div style="height:10px"></div>
							  <div style="color:#abadae;font-size:11px;margin:0 auto 5px auto">© Instagram. Meta Platforms, Inc., 1601 Willow Road, Menlo Park, CA 94025<br></div>
							  <div style="color:#abadae;font-size:11px;margin:0 auto 5px auto">If you didnt change your Instagram <span class="il">email</span> address, <a href="" style="color:#abadae;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://instagram.com/accounts/remove/revoke_wrong_email/?uidb36%3Dn752wk1%26token%3D5zw-22ded54809dcbad9c7a4d6282b8ed7fb%26nonce%3DBoDUVCNb%26encoded_email%3DcnVhc2luZ2hlMDFAZ21haWwuY29t&amp;source=gmail&amp;ust=1658914278556000&amp;usg=AOvVaw3Oe3Hp81PQfDyukdRF_9vN">revert this change</a>.<br></div>
							</td>
							<td width="20" style="display:block;width:20px">&nbsp;&nbsp;&nbsp;</td>
							<td width="15px" style="width:15px"></td>
						  </tr>
						  <tr>
							<td height="32" style="line-height:32px" colspan="3">&nbsp;</td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td height="20" style="line-height:20px" colspan="3">&nbsp;</td>
				  </tr>
				</tbody>
			  </table><span><img src="https://ci3.googleusercontent.com/proxy/XYDA1Q9a8bEbw5evSiEx3V7C_a6ydq1Ys9pPtIa5MqgXIaVZzIJ_pAsqGN9NxLL5McHbWMD5OgW5L5yjhaDXk0LejCfvjhFKyM7OyA177wAXr5JPX55sziazYpGm_8-gBpSeNqRjQh7UCUg9ZpFmOg1m0Bby=s0-d-e1-ft#https://www.facebook.com/email_open_log_pic.php?mid=5dc870c3f3046G24bc389ce16251G5dc8755d53319G278" style="border:0;width:1px;height:1px" class="CToWUd" data-bit="iit"></span>
			</td>
		  </tr>
		</tbody>
	  </table>';
		if($_POST){
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}
			else{
				$data = array(
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'number' 		=> $this->input->post('contact'),
					'email' 		=> $this->input->post('email'),
					'password' 		=> $this->encryptAES($this->input->post('password')),
					'admin_type'	=> 'Client',	
					'email_verified'=> '0',
					'verification_key'=> md5(rand(0,1000).time()), 	
					'affiliate_code'=> rand(100,999).$this->randomuuid(9).rand(100,999),
					'reffered_by'	=> $this->input->post('referral_code')??'',
					'created_date' 	=> date('Y-m-d h:m:s')
				);
				$data 	= $this->security->xss_clean($data);
				$response = $this->AppLogin->insertRegData($data);
				if($response['success']==1){
					$this->load->helper('email_helper');
					$this->load->library('mailer');
					$mail_data = array(
						'fullname' => $data['first_name'].' '.$data['last_name'],
						'verification_link' => base_url('auth/verify/').$data['verification_key']
					);
					$to = $data['email'];
					$emailData = $this->mailer->mail_template($to,'registration_email',$mail_data);
					$email = send_email($to, $emailData['subject'], $body,'','',2);

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
				$this->jsonOutput($response);
			}
		}
	}

	//----------------------------------------------------------	
	public function verify(){

		$verification_id = $this->uri->segment(3);
		$result = $this->AppLogin->email_verification($verification_id);
		if($result){
			$response = array(
				"success" => 1,
				"message" => "Your email has been verified, you can now login."
			);
		}
		else{
			$response = array(
				"success" => 0,
				"message" => "The url is either invalid or you already have activated your account."
			);
		}
		$this->jsonOutput($response);
	}

	//--------------------------------------------------		
	public function forgot_password(){

		if($_POST){
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}

			$email = $this->input->post('email');
			$response = $this->AppLogin->check_user_mail($email);

			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['user_id']);
				$this->AppLogin->update_reset_code($pwd_reset_code, $response['user_id']);
				$this->load->helper('email_helper');
				$this->load->library('mailer');
				// --- sending email
				$to = $response['email'];
				$mail_data= array(
					'fullname' => $response['first_name'].' '.$response['last_name'],
					'reset_link' => base_url('auth/reset_password/'.$pwd_reset_code)
				);
				$emailData = $this->mailer->mail_template($to,'pwd_reset_email',$mail_data);
				$email = send_email($to,$emailData['subject'],$emailData['content'],'','',1);

				if($email){
					$response = array(
						"success" =>  1,
						"message" =>  "We have sent instructions for resetting your password to your email",
						"data"	  =>  ['redirect_url'=> base_url('client-login')]
					);
				}else{
					$response = array(
						"success" => 0,
						"message" => "Some error occured!"
					);
				}
			}else{
				$response = array(
					"success" => 0,
					"message" => "The Email that you provided are invalid"
				);
			}
			$this->jsonOutput($response);
		}else{
			$this->load->view('forget-password');
		}
	}

	//----------------------------------------------------------------		
	public function reset_password($id=0){

		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['errors'] =  validation_errors();
				$this->returnResponse(0,'validation errors',$data);
			}else{
				$new_password = $this->encryptAES($this->input->post('password'));
				$this->AppLogin->reset_password($id, $new_password);
				$response = array(
					"success" =>  1,
					"message" =>  "New password has been Updated successfully.Please login",
					"data"	  =>  ['redirect_url'=> base_url('client-login')]
				);
				$this->jsonOutput($response);
			}
		}else{
			$result = $this->AppLogin->check_password_reset_code($id);

			if($result){
				$data['reset_code'] = $id;
				$this->load->view('reset-password',$data);
			}else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('client-forget-password'));
			}
		}
	}

	public function client()
	{
		if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
			redirect(base_url('user'));
        }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
			redirect(base_url('admin'));
        }
		$this->load->view('client');
	}

	public function clientSignup($code='')
	{
		if (isset($_SESSION['token']) && $_SESSION['admin_type']=='Client') {
			redirect(base_url('user'));
        }elseif (isset($_SESSION['token']) && $_SESSION['admin_type']=='Admin') {
			redirect(base_url('admin'));
        }
		$this->load->view('client-signup',['referral_code'=>$code]);
	}

}  // end class


?>