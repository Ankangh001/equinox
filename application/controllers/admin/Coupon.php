<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAdminAuth();
    }

	public function index()
	{
        $this->load->view('admin/coupon');
	}

    public function getAllCoupons()
	{
        $data['data']=$this->db->order_by('created_at', 'DSC')->get('coupons')->result_array();
        echo json_encode($data);  
	}

    public function save()
	{
        try {
			$data = array(
				'code' => $this->input->post('coupon-code'),
				'percentage' => $this->input->post('coupon-percentage'),
				'created_at' => date('Y-m-d H:m:s')
			);

			$res = $this->db->insert('coupons',$data);

			if($res){
				$response = array(
					'status' => '200',
					'message' => 'Added successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to add data',
				);
			}
			echo json_encode($response);  

		} catch (\Throwable $th) {
			$res = $th;
		}

	}

	public function edit()
	{
        try {
			$last_segment = $this->uri->segment($this->uri->total_segments());
			$response['res'] = $this->db->where(['product_id' =>$last_segment])->get('products')->result_array();
        	$this->load->view('admin/edit-challenge', $response);
		} catch (\Throwable $th) {
			$res = $th;
		}
	}

	public function deleteCoupon()
	{
        try {
			$id = $this->input->post('id');		
			$res = $this->db->where(['id' =>$id])->delete('coupons');

			if($res){
				$response = array(
					'status' => '200',
					'message' => 'Deleted successfully',
				);
			}else{
				$response = array(
					'status' => '400',
					'message' => 'Unable to delete data',
				);
			}
			echo json_encode($response);

		} catch (\Throwable $th) {
			$res = $th;
		}

	}

}
