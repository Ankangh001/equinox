<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends APIMaster {

        public function __construct(){
                parent::__construct();
                $this->verifyAdminAuth();
        }

	public function index(){
                $this->load->view('admin/affiliate');
        }

        public function getAffiliateData(){
                $query = "SELECT user.user_id,user.first_name,user.last_name,user.email,IFNULL(SUM(CASE WHEN et.flag = 0 AND et.txn_type = 3 THEN et.amount END), 0) credit,user.affiliate_code FROM `user` LEFT JOIN transactions et on user.user_id = et.user_id where user.admin_type='Client' group by user.user_id";

                $res = $this->db->query($query)->result_array();
                if($res){
                        $response = array(
                                'status' => '200',
                                'data' => $res
                        );
                }else{
                        $response = array(
                                'status' => '400',
                                'message' => 'No record found',
                                'data' => []
                        );
                }
                echo json_encode($response);
        }

        public function getAffiliateUserData(){
                if($_GET['affiliate_code']){
                        $query = "SELECT user.user_id,user.first_name,user.last_name,user.email FROM `user` where user.admin_type='Client' AND reffered_by = '".$_GET['affiliate_code']."'";

                        $res = $this->db->query($query)->result_array();
                        if($res){
                                $response = array(
                                        'status' => '200',
                                        'data' => $res
                                );
                        }else{
                                $response = array(
                                        'status' => '400',
                                        'message' => 'No record found',
                                        'data' => []
                                );
                        }
                }else{
                        $response = array(
                                'status' => '400',
                                        'data' => [],
                                        'message' => 'No record found',
                        );
                }
            
                echo json_encode($response);
        }
}
