<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	public function index()
	{     

        $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
        $country = '';
        $city = '';

        if ($query && $query['status'] == 'success') {
            $country = $query['country'];
            $city = $query['city'];
        }
        // foreach ($query as $data) {
        //     echo $data . "<br>";
        // }
   
        $data = array(
            'email' => $this->input->post('email'),
            'created_at' => date('Y-m-d H:m:s'),
            'country' => $country,
            'city' => $city,
        );

        $res = $this->db->insert('newsletter', $data);

        if($res){
            $response = array(
                "status" => 200,
                "message" => "Thank You for subscribing"
            );
        }	
        else{
            $response = array(
                "status" => 400,
                "message" => "Some error occured!"
            );
        }

        echo json_encode($response);
	}
}
