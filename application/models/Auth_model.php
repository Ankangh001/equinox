<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($data){

		$this->db->from('user'); 
		$this->db->where('email', $data['email']);

		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
                $result = $query->row_array();
                $this->db->where('user_id', $result['user_id']);
			    $this->db->update('user', array('online' => 1));
		        return $result;
		    }
		}
	}

    	//--------------------------------------------------------------------
	public function signup($data){
		$this->db->insert('user', $data);
		return true;
	}

    	//--------------------------------------------------------------------
	public function user_log($data){
		$this->db->insert('user_log', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from('user');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('user', array('is_verify' => 1, 'token'=> ''));
			return true;
		}
		else{
            return false;
        }
	}

	public function user_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from('user');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('user', array('is_verify' => 1, 'token'=> ''));
			return true;
		}
		else{
			return false;
			}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('ci_admin', array('email' => $email));

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
    	$this->db->where('admin_id', $user_id);
    	$this->db->update('ci_admin', $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){

    	$result = $this->db->get_where('ci_admin',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password,$current_password){
	    $this->db->from('user');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			$result = $query->row_array();
		    $validPassword = password_verify($current_password, $result['password']);
		    if($validPassword){
		        $data = array(
        			'token'     => md5(rand(0,1000)),
        			'password'  => $new_password,
        			'old_password' => $result['password'],
        			'is_verify'     => '0',
        			'pass_change_date' => date('Y-m-d : h:m:s')
        	    );
        		$this->db->where('user_id', $id);
        		$this->db->update('user', $data);
		        return $data;
		    }else{
		 		return false;       
		    }
		}
    }

    //--------------------------------------------------------------------
	public function get_admin_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_admin($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}

    //--------------------------------------------------------------------
	public function logout(){
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id', $id);
        $this->db->update('user', array('online' => 0,'last_login' => date('Y-m-d : h:m:s')));
		return true;
	}

}