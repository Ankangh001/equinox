<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $purchase['history'] = $this->db->where(['user_id' => $_SESSION['user_id']])->get('transactions')->result_array();

        $this->load->view('user/purchase-history', $purchase);
	}
}
