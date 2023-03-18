<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //-------------------------------------------------------------------
    public function delete_notification($id,$user_id)
    {
    	$this->db->where('id', $id)->where('user_id', $user_id);
        $this->db->update('notification', array('seen' => '1'));
    }

    //--------------------------------------------------------------------
	public function get_users(){
		$query = $this->db->get('user');
		return $query->result_array();
	}
	
	//--------------------------------------------------------------------
	public function get_confirmation($id){
	    $info = $this->db->select('*')->from('txn_request')->where('sender_id',$id)->where('status','1')->count_all_results();
	    return $info;
	}
	//--------------------------------------------------------------------
	public function messages($user_id){
	    $this->db->where('(user_id = "0" OR user_id = "'.$user_id.'")')->where('seen','0');
	    $query = $this->db->order_by('id','DESC')->get('notification');
		return $query->result_array();
	}

		//-------------------------------------------------------------------
	public function profile_verification($field)
    {
       $query = $this->db->insert('verification',$field);
       return true;
    }
	
	            //--------------------------------------------------------------------
	public function track_txn_id($id){
	    
	    $this->db->select('txn_request.*,user.email as sender_email');
        $this->db->from('txn_request');
        $this->db->join('user', 'user.user_id = txn_request.sender_id');
        $this->db->where('txn_id',$id); 
        $query = $this->db->get();
// 		$query = $this->db->where('txn_id',$id)->get('txn_request');
		return $query->result_array();
	}
    
    //--------------------------------------------------------------------
	public function user_log(){
		$query = $this->db->where('user_id',$this->session->user_id)->limit(4)->order_by('log_id', 'DESC')->get('user_log');
		return $query->result_array();
	}
	
	//-------------------------------------------------------------------
	public function add_address($data)
    {
       $query = $this->db->insert('address',$data);
       return true;
    }
    
        //--------------------------------------------------------------------
	public function get_address(){
		$query = $this->db->where('user_id',@$_SESSION['user_id'])->order_by('add_id','DESC')->get('address');
		return $query->result_array();
	}
	
	        //--------------------------------------------------------------------
	public function get_active_address(){
		$query = $this->db->where('user_id',@$_SESSION['user_id'])->where('status','1')->get('address');
		return $query->result_array();
	}
	   //--------------------------------------------------------------------
	public function get_user(){
		$query = $this->db->where('user_id',@$_SESSION['user_id'])->get('user');
		return $query->row_array();
	}
		   //--------------------------------------------------------------------
	public function get_user_by_email($email){
		$query = $this->db->select('user_id')->where('email',$email)->get('user');
		return $query->row_array();
	}
	
			   //--------------------------------------------------------------------
	public function get_user_by_id($id){
		$query = $this->db->select('name,email,profile_picture')->where('user_id',$id)->get('user');
		return $query->row_array();
	}
	
				   //--------------------------------------------------------------------
	public function get_shared_user($id){
		$query = $this->db->select('name,email,profile_picture,phone,wallet,share_email,share_mobile,share_confirmation,share_wallet')->where('user_id',$id)->get('user');
		return $query->row_array();
	}
	
		//-------------------------------------------------------------------
	public function send_txn_request($field)
    {
       $query = $this->db->insert('txn_request',$field);
       return true;
    }
    
        //--------------------------------------------------------------------
	public function get_my_txn_request(){
		$query = $this->db->where('sender_id',@$_SESSION['user_id'])->order_by('id','DESC')->get('txn_request');
		return $query->result_array();
	}
	
	        //--------------------------------------------------------------------
	public function receive_txn_request(){
		$query = $this->db->where('receiver_email',@$_SESSION['email'])->order_by('id','DESC')->get('txn_request');
		return $query->result_array();
	}
	
			        //--------------------------------------------------------------------
	public function load_txn_request(){
		$query = $this->db->where('receiver_email',@$_SESSION['email'])->where('accepted','0')->order_by('id','DESC')->get('txn_request');
		return $query;
	}
	
	    //--------------------------------------------------------------------
    public function edit_address($id, $fields)
    {
        $this->db->where('user_id', @$_SESSION['user_id'])->where('add_id', $id);
        $this->db->update('address', $fields);
    }
    
        //----------------------------------------------
    public function delete_address($id)
    {
    	$this->db->where('add_id', $id)->where('user_id', @$_SESSION['user_id']);
        $this->db->delete('address');
    }
    
    	    //--------------------------------------------------------------------
    public function edit_user($fields)
    {
        $this->db->where('user_id', @$_SESSION['user_id']);
        $this->db->update('user', $fields);
    }
    
     function Check_request_status($data)
    {
        $sender_id = $data['sender_id'];
        $receiver_id = $data['receiver_id'];
        $this->db->select('chat_request_status');
        $this->db->where('(sender_id = "'.$sender_id.'" OR sender_id = "'.$receiver_id.'")');
        $this->db->where('(receiver_id = "'.$receiver_id.'" OR receiver_id = "'.$sender_id.'")');
        $this->db->limit(1);
        $query = $this->db->get('chat_request');
        $result = $query->row_array();
        if($query->row_array() >0 ){
            if($result['chat_request_status'] == 'Reject'){
                $fields = ['chat_request_status' => 'Pending'];
                $this->db->where('(sender_id = "'.$sender_id.'" OR sender_id = "'.$receiver_id.'")');
                $this->db->where('(receiver_id = "'.$receiver_id.'" OR receiver_id = "'.$sender_id.'")');  
                $this->db->update('chat_request', $fields);
            }
        }else{
             $query = $this->db->insert('chat_request',$data);
        }
        return true;
    }
}