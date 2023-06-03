<?php
	class Affiliate_model extends CI_Model{

		public function getAffiliateData($reffered_by){
			$stmt = $this->db->where(['reffered_by' => $reffered_by])->get('user');
			$data['count'] = $stmt->num_rows()??0;
			$data['referredUser'] = $stmt->result_array();
			return $data;
		}
    }


?>