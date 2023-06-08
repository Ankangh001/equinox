<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    public function index()
	{
		$equity = array(
            'equity' => '999'
        );
        
        $res = $this->db->where(['user_id' => '3'])->update('user', $equity);
	}
}
?>