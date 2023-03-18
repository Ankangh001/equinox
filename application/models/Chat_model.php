
<?php
class Chat_model extends CI_Model
{
 function search_user_data($user_id, $query)
 {
  $where = "user_id != '".$user_id."' AND (name LIKE '%".$query."%' OR email LIKE '%".$query."%')";

  $this->db->where($where);

  return $this->db->get('user');
 }
 
     //--------------------------------------------------------------------
    public function get_user_by_email($email){
        $this->db->where('email',$email);
    	$query = $this->db->get('user');
    	return $query->row_array();
    }
    
    	//--------------------------------------------------------------------
	public function get_confirmation($id){
	    $info = $this->db->select('*')->from('txn_request')->where('sender_id',$id)->where('status','1')->count_all_results();
	    return $info;
	}

 function Check_request_status($sender_id, $receiver_id)
 {
  $this->db->where('(sender_id = "'.$sender_id.'" OR sender_id = "'.$receiver_id.'")');
  $this->db->where('(receiver_id = "'.$receiver_id.'" OR receiver_id = "'.$sender_id.'")');
  $this->db->order_by('chat_request_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('chat_request');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
    return $row->chat_request_status;
   }
  }
 }

 function Insert_chat_request($data)
 {
  $this->db->insert('chat_request', $data);
 }

 function Fetch_notification_data($receiver_id)
 {
  $this->db->where('receiver_id', $receiver_id);
  $this->db->where('chat_request_status', 'Pending');
  return $this->db->get('chat_request');
 }

 function Get_user_data($user_id)
 {
  $this->db->where('user_id', $user_id);
  $data = $this->db->get('user')->result();
  $output = array();
  foreach($data as $row)
  {
   $output['name'] = $row->name;
   $output['email'] = $row->email;
   $output['profile_picture'] = $row->profile_picture;
   $output['status'] = $row->online;
   $output['phone'] = $row->phone;
   $output['wallet'] = $row->wallet;
   $output['verified'] = $row->verified;
   $output['confirmation'] = @$row->confirmation;
   $output['share_email'] = $row->share_email;
   $output['share_mobile'] = $row->share_mobile;
   $output['share_wallet'] = $row->share_wallet;
   $output['share_confirmation'] = @$row->share_confirmation;
  }
  return $output;
 }

 function Update_chat_request($chat_request_id, $data)
 {
  $this->db->where('chat_request_id', $chat_request_id);
  $this->db->update('chat_request', $data);
 }
 
  function Update_chat_request_by_id($receiver_id,$sender_id,$data)
 {
    $this->db->where('(sender_id = "'.$sender_id.'" AND receiver_id = "'.$receiver_id.'")');
  $this->db->update('chat_request', $data);
 }
 
  function Update_txn_request($txn_id, $data)
 {
  $this->db->where('txn_id', $txn_id);
  $this->db->update('txn_request', $data);
 }

 function Fetch_chat_user_data($user_id)
 {
  $this->db->where('chat_request_status', 'Accept');
  $this->db->where('(sender_id = "'.$user_id.'" OR receiver_id = "'.$user_id.'")');
  $this->db->order_by('chat_request_id', 'DESC');
  return $this->db->get('chat_request');
 }
 
  function Fetch_blocked_user_data($user_id)
 {
    $this->db->where('status', '1');
    $this->db->where('blocked_by', $user_id);
    $this->db->order_by('blocked_id', 'DESC');
    return $this->db->get('blocked');
 }
 
    function blocked_status($sender_id,$receiver_id)
    {
        $this->db->where('status', '1');
        $this->db->where('(blocked_by = "'.$sender_id.'" OR blocked_by = "'.$receiver_id.'")');
        $this->db->where('(blocked_user = "'.$receiver_id.'" OR blocked_user = "'.$sender_id.'")');
        $this->db->order_by('blocked_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('blocked');
        if($query->num_rows() > 0)
        {
           foreach($query->result() as $row)
           {
            return $row->status;
           }
         }
        // $this->db->where('status', '1');
        // $this->db->where('(blocked_by = "'.$user_id.'" OR blocked_user = "'.$user_id.'")');
        // return $this->db->get('blocked');
    }
 
         //----------------------------------------------
    public function delete_chat_request($id)
    {
       $this->db->where('chat_request_id', $id);
        $this->db->delete('chat_request');
    }
    
    public function unblock_user($id)
    {
       $this->db->where('blocked_id', $id);
        $this->db->delete('blocked');
    }

    function block_user($data)
    {
        $this->db->insert('blocked', $data);
    }


    function Insert_chat_message($data)
    {
      $this->db->insert('chat_messages', $data);
    }

    function Update_chat_message_status($user_id)
    {
      $data = array(
       'chat_messages_status'  => 'yes'
      );
      $this->db->where('receiver_id', $user_id);
      $this->db->where('chat_messages_status', 'no');
      $this->db->update('chat_messages', $data);
    }

 function Fetch_chat_data($sender_id, $receiver_id)
 {
     $this->db->select('
			chat_messages.chat_messages_id,
			chat_messages.sender_id,
			chat_messages.receiver_id,
			chat_messages.chat_messages_text,
			chat_messages.chat_messages_status,
			chat_messages.chat_messages_datetime,
			user.profile_picture as senderpicture
		');
  $this->db->from('chat_messages')->join('user','user.user_id=chat_messages.sender_id');
  $this->db->where('(chat_messages.sender_id = "'.$sender_id.'" OR chat_messages.sender_id = "'.$receiver_id.'")');
  $this->db->where('(chat_messages.receiver_id = "'.$receiver_id.'" OR chat_messages.receiver_id = "'.$sender_id.'")');
  $this->db->order_by('chat_messages.chat_messages_id', 'ASC');
  return $this->db->get();
 }

 function Count_chat_notification($sender_id, $receiver_id)
 {
  $this->db->where('sender_id', $sender_id);
  $this->db->where('receiver_id', $receiver_id);
  $this->db->where('chat_messages_status', 'no');
  $query = $this->db->get('chat_messages');
  return $query->num_rows();
 }

 function Update_login_data()
 {
  $data = array(
   'last_activity'  => date('Y-m-d H:i:s'),
   'is_type'   => $this->input->post('is_type'),
   'receiver_user_id' => $this->input->post('receiver_id')
  );
  $this->db->where('login_data_id', $this->session->userdata('login_id'));
  $this->db->update('login_data', $data);
 }

 function User_last_activity($user_id)
 {
  $this->db->where('user_id', $user_id);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->last_activity;
  }
 }

 function Check_type_notification($sender_id, $receiver_id, $current_timestamp)
 {
  $this->db->where('receiver_user_id', $receiver_id);
  $this->db->where('user_id', $sender_id);
  $this->db->where('last_activity >', $current_timestamp);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->is_type;
  }
 }
}
?>