<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends APIMaster {

	public function __construct(){
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index(){
        $query = 'SELECT user.user_id,user.email,
                    IFNULL(SUM(CASE WHEN et.flag = 0 AND et.txn_type = 3 THEN et.amount END), 0) affilaiteAmount 
                    FROM `user` LEFT JOIN transactions et on user.user_id = et.user_id 
                    where user.admin_type=1 group by user.user_id';

        $res['res'] = $this->db->query($query)->row_array();
        // print_r($res);die;
        $this->load->view('admin/affiliate',$res);
	}
}
