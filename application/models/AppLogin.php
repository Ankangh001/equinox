<?PHP
class AppLogin extends CI_Model
{

    public function validateUserEmail($emailId)
    {
        try {
            $pass_enc = pass_enc;
            $query = "select user_id,email,aes_decrypt(password,'{$pass_enc}')  as password,(select if(count(1)>=1,'0','1') from login_analytics where user_id=emp.user_id limit 1) as first_time_user from user as emp where email='{$emailId}' and status = 1 and admin_type = 'Client'";
            $data  = $this->db->query($query)->row_array();
            if ($data) {
                $response['success'] = 1;
                $response['data'] = $data;
            } else {
                $response['success'] = 0;
                $response['message'] = "Data Not Found";
            }
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function register($data){
		$this->db->insert('ci_admin', $data);
		return true;
	}

    public function insertRegData($data)
    {
        try {
            if ($this->db->insert('user',$data)) {
                $response = array(
                    "success" => 1,
                    "message" => "Thank You for Registration.",
                    "last_id" => $this->db->insert_id()
                );
            } else {
                $response = array(
                    "success" => 0,
                    "message" => "Cannot store data"
                );
            }
        } catch (Exception $ex) {
            $response = array(
                "success" => 0,
                "message" => $ex->getMessage()
            );
        }
        return $response;
    }

    function validateUserSession($login_token)
    {
        try {
            $sql = "SELECT user_id, REPLACE(CONCAT(first_name,' ',last_name),'  ',' ') user_name, email, number FROM user where user_id = (SELECT user_id FROM login_analytics where token = '{$login_token}' AND status =1)";
            $result = $this->db->query($sql)->row_array();
            if ($result) {
                $response['success'] = 1;
                $response['data'] = $result;
            } else {
                $response['success'] = 0;
                $response['message'] = "Invalid Token";
            }
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    function PanelLogin($email, $password,$admin_type)
    {
        try {
            $pass_enc = pass_enc;
            $sql = "SELECT  user_id,client_id,concat(first_name,' ',last_name) as user_name,email,password,admin_type,affiliate_code,email_verified,reffered_by,kyc_status FROM user where email = '{$email}' and admin_type = '{$admin_type}'";
            $result = $this->db->query($sql)->row_array();
            if ($result) :
                if ($result['email_verified']==1) :
                    if (!empty($result['password'])) :
                        $response['success'] = 1;
                        $response['message'] = "USER_VALIDATED";
                        $response['data'] = $result;
                    else :
                        $response['success'] = 0;
                        $response['message'] = "Password has not been set yet, contact Admin";
                    endif;
                else :
                    $response['success'] = 0;
                    $response['message'] = "Email is not verified yet, contact Admin";
                endif;
            else :
                $response['success'] = 0;
                $response['message'] = "Invalid username";
            endif;
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function email_verification($code){
		$this->db->select('email, verification_key, email_verified, first_name, last_name');
		$this->db->from('user');
		$this->db->where('verification_key', $code);
		$query = $this->db->get();
		$result= $query->result_array();
        $fullName = $result[0]['first_name'].' '.$result[0]['last_name'];
    

		$match = count($result);
		if($match > 0){
            $this->load->helper('email_helper');
            $this->load->library('mailer');
            $body = file_get_contents(base_url('assets/mail/welcomeEmail.html'));

            $content = '<div style="font-size: 14px; line-height: 160%; text-align: left; word-wrap: break-word;"><p style="font-size: 14px; line-height: 160%;"><span style="font-size: 20px; line-height: 35.2px;">Welcome to the Family <br />Hello '.$fullName.',</span></p><br> <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">Equinox Trading Capital is delighted to welcome you into our family. We applaud your decision and look forward to learning more about your trading style.</span></p><br> <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">Feel free to look around and let us know if you have any questions!</span></p><br><p style="font-size: 14px; line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">Ready to show your skills and earn profit with <strong>Equinox Trading Capital?</strong></span></p> <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">We wish you a profitable trading journey with us and encourage you to go through our terms & conditions to be on the same page with us always.</span></p></div>';
			$finaltemp = str_replace("{CONTENT}", $content, $body);


            $email = send_email($result[0]['email'], 'Welcome to Equinox Family ', $finaltemp,'','',2);

			$this->db->where('verification_key', $code);
			$this->db->update('user', array('email_verified' => 1, 'verification_key'=> ''));
			return true;
		}
		else{
			return false;
		}
	}

    public function check_user_mail($email)
    {
    	$result = $this->db->get_where('user', array('email' => $email));

    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }

        //============ Update Reset Code Function ===================
        public function update_reset_code($reset_code, $user_id){
            $data = array('password_reset_code' => $reset_code);
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
        }
    
        //============ Activation code for Password Reset Function ===================
        public function check_password_reset_code($code){
    
            $result = $this->db->get_where('user',  array('password_reset_code' => $code ));
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        //============ Reset Password ===================
        public function reset_password($id, $new_password){
            $data = array(
                'password_reset_code' => '',
                'password' => $new_password
            );
            $this->db->where('password_reset_code', $id);
            $this->db->update('user', $data);
            return true;
        }
}