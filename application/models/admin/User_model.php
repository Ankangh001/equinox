<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_notification($data){
        $this->db->insert('notification', $data);
    }
    
    public function delete_notification($id)
    {
    	$this->db->where('id', $id);
        $this->db->delete('notification');
    }
    
    public function notification()
    {
         $this->db->select('
		    notification.*,
		    user.name,
		    user.email
		');
        $this->db->from('notification')->join('user','user.user_id=notification.user_id','left');
        $query =  $this->db->order_by('id','DESC')->get();
        $info = $query->result();
        return $info;
    }

    public function request()
    {
         $this->db->select('
		    address.add_id,
		    address.user_id,
		    address.add_name,
		    address.add_wallet,
		    address.add_file,
		    address.add_date,
		    address.status,
		    address.verified_date,
			user.name
		');
        $this->db->from('address')->join('user','user.user_id=address.user_id');
        $query =  $this->db->order_by('add_id', 'DESC')->get();
        $info = $query->result();
        return $info;
    }

    public function txn_request()
    {
        $this->db->select('
		    txn_request.*,
			user.email as sender_email
		');
        $this->db->from('txn_request')->join('user','user.user_id=txn_request.sender_id');
        $query =  $this->db->order_by('id','DESC')->get();
        $info = $query->result();
        return $info;
    }

    public function delete_request($id)
    {
    	$this->db->where('add_id', $id);
        $this->db->delete('address');
    }

    public function delete_verified_request($id)
    {
    	$this->db->where('id', $id);
        $this->db->delete('verification');
    }

    public function change_request_status($id)
    {
    	$this->db->where('add_id', $id);
        $query =  $this->db->select('status')->from('address')->get();
        $info = $query->row_array();
        if($info['status']==1){
            $status = 0;            
        }else{
            $status = 1;
        }
        $this->db->where('add_id', $id);
		$this->db->update('address', array('status' => $status,'verified_date' => date('d-m-Y')));
    }

    public function delete_user($id)
    {
    	$this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function change_user_status($id)
    {
    	$this->db->where('user_id', $id);
        $query =  $this->db->select('email,is_active')->from('user')->get();
        $info = $query->row_array();
        
        if($info['is_active']==1){
            $status = 0;            
        }else{
            $status = 1;
        }
        $this->db->where('user_id', $id);
		$this->db->update('user', array('is_active' => $status));

		return $info;
    }

    public function change_verified_status($id)
    {
    	$this->db->where('user_id', $id);
        $query =  $this->db->select('email,verified')->from('user')->get();
        $info = $query->row_array();
        
        if($info['verified']==1){
            $status = 0;            
        }else{
            $status = 1;
        }
        $this->db->where('user_id', $id);
		$this->db->update('user', array('verified' => $status));

		return $info;
    }

    public function user()
    {
        $this->db->order_by('user_id', 'DESC');
        $query = $this->db->get('user');
        $info = $query->result();
        return $info;
    }
    
    public function new_user()
    {
        $this->db->where('is_active','0')->order_by('user_id', 'DESC');
        $query = $this->db->get('user');
        $info = $query->result();
        return $info;
    }

    public function user_detail($user_id)
    {
        $info['user'] = $this->db->where('user_id',$user_id)->get('user')->row_array();
        $info['confirmation'] = $this->db->select('*')->from('txn_request')->where('sender_id',$user_id)->where('status','1')->count_all_results();
        $info['address'] = $this->db->where('user_id',$user_id)->order_by('add_id','DESC')->get('address')->result();
        $info['txn_sended'] = $this->db->where('sender_id',$user_id)->order_by('id','DESC')->get('txn_request')->result();
        $info['txn_received'] = $this->db->where('receiver_email',$info['user']['email'])->order_by('id','DESC')->get('txn_request')->result();
        $info['blocked'] = 
         $this->db->select('
        		    blocked.*,
        			user.name as blocked_name,
        			user.email as blocked_email,
        		')->from('blocked')->join('user','user.user_id=blocked.blocked_user')->where('blocked_by',$user_id)->order_by('blocked_id', 'DESC')->get()->result();
                
        return $info;
    }
    
    public function edit_user($id,$data)
    {
        $this->db->where('user_id', $id);
		$this->db->update('user',$data);
    }

    public function verification_request()
    {
         $this->db->select('verification.*,
		        user.verified
		');
        $this->db->from('verification')->join('user','user.user_id=verification.user_id');
        $query =  $this->db->order_by('id', 'DESC')->get();
        $info = $query->result();
        return $info;
    }
}
?>