<?php
	class Affiliate_model extends CI_Model{

		public function getAffiliateData($reffered_by,$userId){
			$stmt = $this->db->where(['reffered_by' => $reffered_by])->get('user');
			$data['count'] = $stmt->num_rows()??0;
			$data['referredUser'] = $stmt->result_array();
			if($data['count'] > 0){
				foreach($data['referredUser'] as $key => $val){
					$query = "SELECT sum(amount) as amount FROM transactions where ref_id in (SELECT id FROM transactions WHERE user_id = {$val['user_id']} AND flag = 1) AND flag=0 AND txn_type=3 AND user_id = '{$userId}'";
					// print_r($query);
					$data['referredUser'][$key]['amount'] = $this->db->query($query)->row_array()['amount']??0;
				}	
				// die;
			}
			return $data;
		}

		public function getAffiliateAmount($userId){
			$query = "SELECT IFNULL(SUM(CASE WHEN et.flag = 0 AND et.txn_type = 3 THEN et.amount END), 0) credit, IFNULL(SUM(CASE WHEN et.flag = 1 AND et.txn_type = 3 THEN et.amount END), 0) debit FROM transactions et where user_id = {$userId}";
			return $this->db->query($query)->row_array();
		}
    }


?>