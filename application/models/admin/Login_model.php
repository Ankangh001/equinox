<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function validate($email)
    {
        
        $info = $this->db->where('email', $email)->get('admin')->result();
        
        return $info;
    }
}