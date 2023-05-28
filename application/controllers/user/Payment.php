<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends APIMaster {

	public function __construct()
    {
        parent::__construct();
        $this->verifyAuth();
    }

	public function index()
	{
        $this->load->view('user/payment');
	}

    public function coinbaseCreateCharge()
	{        
        $curl = curl_init();
        // $post = ``;

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.commerce.coinbase.com/charges',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "local_price":{
                "amount":1,
                "currency":"USD"
            },
            "metadata":{
                "customer_id":"customer1",
                "customer_name":"Person1"
            },
            "name":"Example1",
            "description":"Create Charge using PHP",
            "pricing_type":"fixed_price",
            "redirect_url":"http://localhost/coinbase/s.php",
            "cancel_url":"http://localhost/coinbase/cancel.php"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json',
            'X-CC-Version: 2018-03-22',
            'X-CC-Api-Key: 408fe58b-6bc2-428e-84b4-b87bd44e3a07'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_decode($response)->data->hosted_url;
        // header('Location:'.json_decode($response)->data->hosted_url);
	}

    public function success()
	{        
        try {
			$data = array(
				'product_name' => $this->input->post('product-name'),
				'product_desc' => $this->input->post('description'),
				'product_category' => $this->input->post('product-type'),
				'product_price' => $this->input->post('product-price'),
				'created_at' => date('Y-m-d H:m:s'),
				'created_by' => 'admin',
				'status' => $this->input->post('status'),
			);
			
			$res = $this->db->insert('userproducts', $data);
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
			echo $response;  

		} catch (\Throwable $th) {
			$res = $th;
		}
	}
}


