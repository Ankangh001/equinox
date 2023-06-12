<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Square extends CI_Controller {

	public function index()
	{
		$this->load->view('square');
	}

    public function pay(){
        $accessToken = 'EAAAEJdTHMCu2J4gUK2q_hL7EuRKJFdtcPiIlAhrrsjvDuF8hAf7Lep_y-UT7Xjc';

        $apiClient = new \Square\SquareClient([
            'accessToken' => $accessToken,
            'environment' => \Square\Environment::PRODUCTION,
        ]);

        $data = json_decode(file_get_contents('php://input'), true);

        echo "<pre>"; print_r($data); die;
        $nonce = $data['nonce'];

        $requestBody = [
            'source_id' => $nonce,
            'amount_money' => [
                'amount' => 100, // Amount in cents ($1.00)
                'currency' => 'USD'
            ],
            'idempotency_key' => uniqid()
        ];

        try {
            $apiClient->getPaymentsApi()->createPayment($requestBody);
            $response = ['success' => true];
        } catch (\Square\Exceptions\ApiException $e) {
            $error = $e->getResponseBody()->errors[0]->detail;
            $response = ['success' => false, 'error' => $error];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
}