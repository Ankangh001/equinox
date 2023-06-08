<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
        $this->load->model('Affiliate_model','Affiliate');
    }

	public function index()
	{
        $data = [];
        if($_SESSION['affiliate_code'] != ''){
            $data['userData'] = $this->Affiliate->getAffiliateData($_SESSION['affiliate_code'],$_SESSION['user_id']);
            $data['transaction'] = $this->Affiliate->getAffiliateAmount($_SESSION['user_id']);
        }
        $this->load->view('user/affiliate',$data);
	}
}
