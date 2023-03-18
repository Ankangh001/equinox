<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_admin($data)
    {
        $this->db->insert('admin', $data);
    }

    public function admin()
    {
    	$query = $this->db->get('admin');
        $info = $query->result();
        return $info;
    }

    public function delete_admin($id)
    {
    	$this->db->where('id', $id);
        $this->db->delete('admin');
    }

    public function admin_info($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->select('email,name,role')->get('admin');
        $info = $query->result();
        return $info;
    }

    public function update_admin_info($id, $fields)
    {
        $this->db->where('id', $id);
        $this->db->update('admin', $fields);
    }
    public function change_password($id, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('id', $id);
        $this->db->update('admin');
    }
    
   
    public function application()
    {
        $this->db->order_by('app_id', 'DESC');
        $query = $this->db->get('application');
        $info = $query->result();
        return $info;       
    }
}