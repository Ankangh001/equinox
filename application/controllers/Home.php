<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('home_model');
	}
	
	public function delete_notification()
	{
	    if(!$this->session->name){
            header('Location:home');
        }
        $query = $_POST['id'];
		$this->home_model->delete_notification($query,$this->session->user_id);
		echo "success";
	    exit;
	}

	public function index()
	{
        $this->load->view('partials/header');
		$this->load->view('home');
        $this->load->view('partials/footer');
	}

	public function track_txn_id(){
	    if(!$this->session->name){
            header('Location:home');
        }
	     $query = $_POST['txn_id'];
	     $result = $this->home_model->track_txn_id($query);
	     echo json_encode($result);
	     exit;
	}
	
	public function messages(){
	   $result = $this->home_model->messages($this->session->user_id);
	   echo json_encode($result);
	   exit;
	}

    function dashboard()
    {
        if(!$this->session->name){
            header('Location:home');
        }
        $data['result'] = $this->home_model->get_address();
        $data['active_address'] = $this->home_model->get_active_address();
        $data['sended'] = $this->home_model->get_my_txn_request();
        $data['received'] = $this->home_model->receive_txn_request();
        $this->load->view('partials/header');
        $this->load->view('dashboard',$data);
        $this->load->view('partials/footer');
    }

	public function settings()
	{
	    if(!$this->session->name){
            header('Location:home');
        }
        $data['active_address'] = $this->home_model->get_active_address();
	    $data['row'] = $this->home_model->get_user();
	    $data['confirmation'] = $this->home_model->get_confirmation($this->session->user_id);
        $this->load->view('partials/header');
		$this->load->view('settings',$data);
        $this->load->view('partials/footer');
	}

	public function api()
	{
        $this->load->view('partials/header');
		$this->load->view('api',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}

    public function security()
	{
	    if(!$this->session->name){
            header('Location:home');
        }
        $data['row'] = $this->home_model->get_user();
	    $data['active'] = $this->home_model->user_log();
        $this->load->view('partials/header');
		$this->load->view('security',$data);
        $this->load->view('partials/footer');
	}
	
	public function learn()
	{
	     $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('learn',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function stats()
	{
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('stats',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function opensource()
	{
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('opensource',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function research()
	{
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('research',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}

	public function privacy()
	{
	   // if(!$this->session->name){
    //         header('Location:home');
    //     }
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('privacy',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function support()
	{
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('support',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function associate_detail()
	{
	    if(!$this->session->name){
            header('Location:home');
        }
	    $data = $this->home_model->get_shared_user($user_id);
        echo json_encode($data);
        exit;
	}
	
	public function associate()
	{
	   // if(!$this->session->name){
    //         header('Location:home');
    //     }
	    $data['row'] = $this->home_model->get_user();
        $this->load->view('partials/header');
		$this->load->view('associate',$data);
		$this->load->view('partials/footer');
        $this->load->view('home_footer/footer');
	}
	
	public function search()
	{
	    $query = $_POST['search_query'];
        $url = "https://api.blockcypher.com/v1/btc/main/addrs/" . $query . "/full";
        $curl = curl_init();
        $apiKey = "42ffd41960db43c08d34277de19d0df5";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $data['response'] = json_decode($response, true);
        $this->load->view('partials/header');
		$this->load->view('search',$data);
        $this->load->view('partials/footer');
	}
	
	public function price()
	{
	    $url = "https://api.blockchain.info/stats";
	    $apiKey = "c7e7cf6d-e484-4256-b0eb-b330ebeaacd6";
	    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // $response = json_decode($response, true);
        echo $response;
        exit;
	}

    //latest blocks
	public function latest_block()
	{
	    $time=round(microtime(true) * 1000);
	    $url = "https://blockchain.info/blocks/".$time."?format=json";
	    $apiKey = "c7e7cf6d-e484-4256-b0eb-b330ebeaacd6";
	    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $response = json_decode($response, true);
        // echo "<pre>";
        // print_r($response);
        // exit;
        // $response2=[];
        // for($i=0; $i<5; $i++){
        //   $hash= $response[$i]['hash'];
        //   $url2 = "https://blockchain.info/rawblock/".$hash;
    	   // $apiKey2 = "c7e7cf6d-e484-4256-b0eb-b330ebeaacd6";
    	   // $curl2 = curl_init();
        //     curl_setopt_array($curl2, array(
        //         CURLOPT_URL => $url2,
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_TIMEOUT => 30,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => "GET",
        //         CURLOPT_HTTPHEADER => array(
        //             'Authorization: ' . $apiKey2,
        //             "cache-control: no-cache"
        //         ),
        //     ));
        //     $response2 = curl_exec($curl2);
        //     $err2 = curl_error($curl2);
        //     $httpcode2 = curl_getinfo($curl2, CURLINFO_HTTP_CODE);
        //     curl_close($curl2);
        //     $responses = json_decode($response2, true);
        //     $response = 
        // }
        // echo "<pre>";
        // print_r($response2);
        // exit;
        
        $hash ="00000000000000000011887153e72e26b17aec913c7999b267234e6186965a44";
	    $url2 = "https://blockchain.info/rawblock/".$hash;
	    
	    
	    
          if (!@$response['error']) {
                                $data = '<table>
                                              <thead>
                                                <tr>
                                                  <th class="home-th" style="width:40%;">Height</th>
                                                  <th class="home-th p-left">Mined</th>
                                                  <th class="home-th p-left">Size</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'.@$response[0]['height'] .'</a></span></td>
                                                  <td class="p-left">'.date("i",$response[0]['time']) .' minute</td>
                                                  <td class="p-left">145,022 bytes</td>
                                                </tr>
                                                <tr>
                                                  <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'.@$response[1]['height'] .'</a></span></td>
                                                  <td class="p-left">'.date("i",$response[1]['time']) .' minute</td>
                                                  <td class="p-left">54620 bytes</td>
                                                </tr>
                                                <tr>
                                                  <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'.@$response[2]['height'] .'</a></span></td>
                                                  <td class="p-left">'.date("i",$response[2]['time']) .' minute</td>
                                                  <td class="p-left">144,522 bytes</td>
                                                </tr>
                                                <tr>
                                                  <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'.@$response[3]['height'] .'</a></span></td>
                                                  <td class="p-left">'.date("i",$response[3]['time']) .' minute</td>
                                                  <td class="p-left">1452 bytes</td>
                                                </tr>
                                                <tr>
                                                  <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'.@$response[4]['height'] .'</a></span></td>
                                                  <td class="p-left">'.date("i",$response[4]['time']) .' minute</td>
                                                  <td class="p-left">54620 bytes</td>
                                                </tr>
                                            </tbody>
                                        </table>';
                              
                        }else{
                            $data = $response['error'];
                        }
                        echo $data;
                        exit; 
	}
	
	//latest transaction
	public function latestTransaction()
	{
	    $url = "https://blockchain.info/unconfirmed-transactions?format=json";
	    $apiKey = "c7e7cf6d-e484-4256-b0eb-b330ebeaacd6";
	    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $txn = json_decode($response, true);
        //echo "<pre>";
        //print_r($txn['txs'][0]["inputs"][0]['prev_out']['value']);
        //exit;
        //print_r($txn['txs'][0]['out'][1]['value']);
	    
	   // exit;
          if (!@$txn['error']) {
               
                   $data = '<tr>
                              <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'. @$txn['txs'][0]["hash"].'</a></span></td>
                              <td class="p-left">'.@$txn['txs'][0]["inputs"][0]['prev_out']['value'].'</td>
                              <td class="p-left">'.@$txn['txs'][0]['out'][1]['value'].'</td>
                            </tr>
                            
                            <tr>
                              <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'. @$txn['txs'][1]["hash"].'</a></span></td>
                              <td class="p-left">'.@$txn['txs'][1]["inputs"][0]['prev_out']['value'].'</td>
                              <td class="p-left">'.@$txn['txs'][1]['out'][1]['value'].'</td>
                            </tr>
                            
                            <tr>
                              <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'. @$txn['txs'][2]["hash"].'</a></span></td>
                              <td class="p-left">'.@$txn['txs'][2]["inputs"][0]['prev_out']['value'].'</td>
                              <td class="p-left">'.@$txn['txs'][2]['out'][1]['value'].'</td>
                            </tr>
                            
                            <tr>
                              <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'. @$txn['txs'][3]["hash"].'</a></span></td>
                              <td class="p-left">'.@$txn['txs'][3]["inputs"][0]['prev_out']['value'].'</td>
                              <td class="p-left">'.@$txn['txs'][3]['out'][1]['value'].'</td>
                            </tr>
                            
                            <tr>
                              <td class="ellipsis"><span><a class="m-hov" style="text-decoration:none"  href="#">'. @$txn['txs'][4]["hash"].'</a></span></td>
                              <td class="p-left">'.@$txn['txs'][4]["inputs"][0]['prev_out']['value'].'</td>
                              <td class="p-left">'.@$txn['txs'][4]['out'][1]['value'].'</td>
                            </tr>';
               
                }else{
                    $data = $response['error'];
                }
                 echo $data;
                exit; 
	    }
	public function search_txn_address()
	{
        $query = $_POST['search_query'];
        //$user_wallet = "bc1qk8u9u92e7t0qp3nggg05rdr3ed9fqk2uqv4rwn";
        $url = "https://api.blockcypher.com/v1/btc/main/addrs/" . $query . "/full";
        $curl = curl_init();
        $apiKey = "42ffd41960db43c08d34277de19d0df5";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $response = json_decode($response, true);
          if (!@$response['error']) {
                        $data = "<h3 class='custom-pad' style='font-size: 1.4rem; color: #797979; padding:0;'>Account<br /><span style='font-size: 1.2rem;'>Details</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; color: #8c8b8b;'>Address</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;' id='text-long'>".@$response['address'] ."<i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i></td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Transactions</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['n_tx'] ."</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Received</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_received'] / 100000000 ."BTC</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Sent</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_sent'] / 100000000 ."BTC</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Final Balance</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['final_balance'] / 100000000 ."BTC</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method='POST' action='".base_url('search')."'>
                            <input type='hidden' name='search_query' value=".@$response['address'] .">
                            <p style='color:#848282;margin: 2rem 0;text-align:left;font-size: 0.9rem;font-weight: 500;'>To view Hash transactions and all other transactions on this wallet address,
                             <button class='click-btn' type='submit'> click here</button></p>
                            </form>";
                        }else{
                            $data = $response['error'];
                        }
                         echo $data;
                        exit;
	}
	
    public function search_address()
	{
        $query = $_POST['search_query'];
        //$user_wallet = "bc1qk8u9u92e7t0qp3nggg05rdr3ed9fqk2uqv4rwn";
        $url = "https://api.blockcypher.com/v1/btc/main/addrs/" . $query . "/full";
        $curl = curl_init();
        $apiKey = "42ffd41960db43c08d34277de19d0df5";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apiKey,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $response = json_decode($response, true);
        
        // $convert= $this->convert('USD');
        
          if (!@$response['error']) {
                        $data1 = "<h3 class='custom-pad' style='font-size: 1.4rem; color: #797979; padding-top: 2.2rem;'>Account<br /><span style='font-size: 1.2rem;'>Details</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; color: #8c8b8b;'>Address</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;' id='text-long'>".@$response['address'] ."<i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i></td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Transactions</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['n_tx'] ."</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Received</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_received'] / 100000000 ."BTC</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Total Sent</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['total_sent'] / 100000000 ."BTC</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 0 1.2rem 0 0; border: none ;    color: #8c8b8b;'>Final Balance</td>
                                        <td  style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>".@$response['final_balance'] / 100000000 ."BTC</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3 class='custom-pad' style='font-size: 1.4rem; color: #797979; padding-top: 2.2rem;'>TRANSACTIONS</h3>";
                            foreach ($response['txs'] as $txn) :
                                $data2 = " <table class='custom-pad'>
                                      <tbody>
                                          <tr>
                                              <td style='padding: 0 1.2rem 0 0;border: none;color: #8c8b8b;'>Hash</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right; font-size: 12px;padding-bottom: 1rem;  color: #8c8b8b;' id='text-long'>". @$txn['hash'] ." <i id='copy' style='margin-left: 1.2rem;' class='fas fa-clone'></i></td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Fees</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". @$txn['fees']/ 100000000 ."</td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Confirmed Date</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". substr(@$txn['confirmed'], 0, 10)  ."</td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Confirmed Time</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;'>". substr(@$txn['confirmed'], 11)  ."</td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Received Date</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;    color: #8c8b8b;'>". substr(@$txn['received'], 0, 10)  ."</td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Received Time</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". substr(@$txn['received'], 11, 18)  ."</td>
                                          </tr>
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Size</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ; float: right;   color: #8c8b8b;'>". @$txn['size'] ."</td>
                                          </tr>
  
                                          <tr>
                                              <td style='padding: 0 1.2rem 1rem 0; border: none ;    color: #8c8b8b;'>Included in Block</td>
                                              <td style='padding: 0 1.2rem 0 0; border: none ;float: right;color: #8c8b8b;'>".@$txn['block_height'] ."</td>
                                          </tr>
  
                                      </tbody>
                                  </table>
                                  <form method='POST' action='".base_url('search')."'>
                                    <input type='hidden' name='search_query' value=".@$response['address'] .">
                                    <button class='custom-btn' type='submit'> Show More >></button></p>
                                  </form>";
                                //   <p style='text-align: center;'><buttonz type='button' name='show-more' class='custom-btn'>Show More >></button></p>";
                              endforeach;
                              $data = $data1.$data2;
                        }else{
                            $data = $response['error'];
                        }
                         echo $data;
                        exit;
	}
	
	
	public function convert()
	{
	    $country = $_POST['search_query'];
        $key="1880552eee07498a602ac7b6fbcd94b2c256b163";
        // $country = "USD";
        $link="https://api.nomics.com/v1/currencies/ticker?key=".$key."&ids=BTC,ETH&interval=1h,30d&convert=".$country."&per-page=100&page=1";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$link);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        echo $result[0]->price;
        exit;
     
    }
	
	public function add_address(){
	    if(!$this->session->name){
            header('Location:home');
        }
	    $this->form_validation->set_rules('add_name', 'Name', 'required');
        $this->form_validation->set_rules('add_wallet', 'Wallet', 'required');
		if ($this->form_validation->run() == false) {
           $data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('dashboard'),'refresh');
        }
        else{
			$config['upload_path'] =        'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|JPG|PNG|GIF';
			$config['max_size']             = 5000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('add_file')){
                $data = array('errors' => $this->upload->display_errors());
				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('dashboard'),'refresh');
            }
            $this->upload->do_upload('add_file');
            $add_file = array('add_file' => $this->upload->data());
            $add_name = filter_var($this->input->post('add_name'), FILTER_SANITIZE_STRING);
            $add_wallet = filter_var($this->input->post('add_wallet'), FILTER_SANITIZE_STRING);
			$add_date = filter_var($this->input->post('add_date'), FILTER_SANITIZE_STRING);
			$fields = [
			    'user_id' => @$_SESSION['user_id'],
                'add_name' => $add_name,
                'add_wallet' => $add_wallet,
                'add_date' => $add_date,
                'add_file' => $add_file['add_file']['file_name'],
            ];
            
			$this->home_model->add_address($fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect(base_url('dashboard'));
		}
	}
	
	public function edit_address(){
	    if(!$this->session->name){
            header('Location:home');
        }
	    $this->form_validation->set_rules('add_name', 'Name', 'required');
        $this->form_validation->set_rules('add_wallet', 'Wallet', 'required');
		if ($this->form_validation->run() == false) {
           $data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('dashboard'),'refresh');
        }
        else{
            if($_FILES['add_file']['name']){
    			$config['upload_path'] =        'uploads/';
    			$config['allowed_types']        = 'gif|jpg|png|pdf|JPG|PNG|GIF';
    			$config['max_size']             = 5000;
    			$config['encrypt_name'] = TRUE;
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			if (!$this->upload->do_upload('add_file')){
                    $data = array('errors' => $this->upload->display_errors());
    				$this->session->set_flashdata('form_data', $this->input->post());
    				$this->session->set_flashdata('errors', $data['errors']);
    				redirect(base_url('dashboard'),'refresh');
                }
                $this->upload->do_upload('add_file');
                $add_file = array('add_file' => $this->upload->data());
                $add_file = $add_file['add_file']['file_name'];
            }else{
                $add_file = filter_var($this->input->post('prev_add_file'), FILTER_SANITIZE_STRING);
            }
            $add_name = filter_var($this->input->post('add_name'), FILTER_SANITIZE_STRING);
            $add_wallet = filter_var($this->input->post('add_wallet'), FILTER_SANITIZE_STRING);
			$add_date = filter_var($this->input->post('add_date'), FILTER_SANITIZE_STRING);
			$add_id = filter_var($this->input->post('add_id'), FILTER_SANITIZE_STRING);
			
			$fields = [
                'add_name' => $add_name,
                'add_wallet' => $add_wallet,
                'add_date' => $add_date,
                'add_file' => $add_file,
            ];
            
			$this->home_model->edit_address($add_id,$fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect(base_url('dashboard'));
		}
	}
	
	public function delete_address()
   {
       if(!$this->session->name){
            header('Location:home');
        }
       $this->home_model->delete_address($this->uri->segment(2));
       echo 'Deleted successfully.';
   }
	
	public function send_txn_request(){
	    if(!$this->session->name){
            header('Location:home');
        }
	    $this->form_validation->set_rules('txn_id', 'Transaction Id', 'required');
        $this->form_validation->set_rules('txn_wallet_address', 'Wallet Address', 'required');
        $this->form_validation->set_rules('receiver_email', 'Associate Email', 'required');
        $this->form_validation->set_rules('txn_date', 'Transaction Date', 'required');
		if ($this->form_validation->run() == false) {
           $data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('dashboard'),'refresh');
        }
        else{
		    $txn_id = filter_var($this->input->post('txn_id'), FILTER_SANITIZE_STRING);
            $txn_wallet_address = filter_var($this->input->post('txn_wallet_address'), FILTER_SANITIZE_STRING);
            $receiver_email = filter_var($this->input->post('receiver_email'), FILTER_SANITIZE_EMAIL);
			$txn_date = filter_var($this->input->post('txn_date'), FILTER_SANITIZE_STRING);
			
			$fields = [
			    'sender_id' => @$_SESSION['user_id'],
                'txn_id' => $txn_id,
                'txn_wallet_address' => $txn_wallet_address,
                'txn_date' => $txn_date,
                'receiver_email' => $receiver_email,
            ];
            $email = $this->home_model->get_user_by_email($receiver_email);
            $data = array(
                        'sender_id'  => @$_SESSION['user_id'],
                        'receiver_id' => $email['user_id'],
                        'type'      =>  'transaction'
                       );
			$this->home_model->send_txn_request($fields,$data);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect(base_url('dashboard'));
		}
	}
	
	public function edit_user(){
        if(!$this->session->name){
            header('Location:home');
        }
	    $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
		if ($this->form_validation->run() == false) {
           $data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('settings'),'refresh');
        }
        else{
            if($_FILES['user_image']['name']){
    			$config['upload_path'] =        'uploads/';
    			$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|JPG|JPEG|PNG|GIF';
    			$config['max_size']             = 5000;
    			$config['encrypt_name'] = TRUE;
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			if (!$this->upload->do_upload('user_image')){
                    $data = array('errors' => $this->upload->display_errors());
    				$this->session->set_flashdata('form_data', $this->input->post());
    				$this->session->set_flashdata('errors', $data['errors']);
    				redirect(base_url('settings'),'refresh');
                }
                $this->upload->do_upload('user_image');
                $add_file = array('user_image' => $this->upload->data());
                $add_file = $add_file['user_image']['file_name'];
            }else{
                $add_file = filter_var($this->input->post('profile_picture'), FILTER_SANITIZE_STRING);
            }
            $name = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
            $country = filter_var($this->input->post('country'), FILTER_SANITIZE_STRING);
			$add_date = filter_var($this->input->post('dob'), FILTER_SANITIZE_STRING);
			$phone = filter_var($this->input->post('phone'), FILTER_SANITIZE_STRING);
			
			$fields = [
                'name' => $name,
                'country' => $country,
                'dob' => $add_date,
                'phone' => $phone,
                'profile_picture' => 'uploads/'.$add_file,
                'verified'      =>  '0'
            ];
            
            $user_data = array(
					'user_image'    => 'uploads/'.$add_file,
				);
			$this->session->set_userdata($user_data);
            
			$this->home_model->edit_user($fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect(base_url('settings'));
		}
	}
	
	public function update_account(){
        if(!$this->session->name){
            header('Location:home');
        }
        
            $lang = filter_var($this->input->post('lang'), FILTER_SANITIZE_STRING);
			$currency = filter_var($this->input->post('currency'), FILTER_SANITIZE_STRING);
			$email_notification = filter_var($this->input->post('email_notification'), FILTER_SANITIZE_STRING);
			$share_email = filter_var(@$this->input->post('share_email'), FILTER_SANITIZE_STRING);
			$wallet = filter_var(@$this->input->post('primary_wallet_address'), FILTER_SANITIZE_STRING);
			
			$fields = [
                'lang' => $lang,
                'currency' => $currency,
                'email_notification' => $email_notification,
                'share_email' => @$share_email,
                'wallet' => $wallet,
            ];
            
			$this->home_model->edit_user($fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			redirect(base_url('settings'));
	}
	
	public function update_two_step(){
        if(!$this->session->name){
            header('Location:home');
        }
        
            $two_step_verification = filter_var(@$this->input->post('two_step_verification'), FILTER_SANITIZE_STRING);
            if(!@$two_step_verification){
                $two_step_verification = 0;
            }
			$fields = [
                'two_step_verification' => @$two_step_verification,
            ];
            
			$info = $this->home_model->edit_user($fields);
         	$response['status'] = 1;
			$response['message'] = 'Your data is updated!';    
		    echo json_encode($response);
			exit;
	}
	
	public function update_share_account(){
        if(!$this->session->name){
            header('Location:home');
        }
        
            $share_email = filter_var(@$this->input->post('share_email'), FILTER_SANITIZE_STRING);
			$share_wallet = filter_var(@$this->input->post('share_wallet'), FILTER_SANITIZE_STRING);
			$share_confirmation = filter_var(@$this->input->post('share_confirmation'), FILTER_SANITIZE_STRING);
			$share_number = filter_var(@$this->input->post('share_mobile'), FILTER_SANITIZE_STRING);
			
			$fields = [
                'share_email' => @$share_email,
                'share_wallet' => @$share_wallet,
                'share_confirmation' => @$share_confirmation,
                'share_mobile' => @$share_number,
            ];
            
			$info = $this->home_model->edit_user($fields);
         	$response['status'] = 1;
			$response['message'] = 'Your data is updated!';    
		    echo json_encode($response);
			exit;
	}
	
	public function profile_verification(){
        if(!$this->session->name){
            header('Location:home');
        }
	    $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		if ($this->form_validation->run() == false) {
           $data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('errors', $data['errors']);
				// redirect(base_url('dashboard'),'refresh');
        
		    $response['message'] = 'Required fields are empty!'; 
            $response['errors'] = $data;
            echo json_encode($response);
			exit;
		}
        else{
            if($_FILES['selfie']['name']){
    			$config['upload_path'] =        'uploads/';
    			$config['allowed_types']        = 'gif|jpg|png|pdf|JPG|PNG|GIF';
    			$config['max_size']             = 5000;
    			$config['encrypt_name'] = TRUE;
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			if (!$this->upload->do_upload('selfie')){
                    $data = array('errors' => $this->upload->display_errors());
    				$this->session->set_flashdata('form_data', $this->input->post());
    				$this->session->set_flashdata('errors', $data['errors']);
    				 $response['message'] = 'Sorry, there was an error uploading your file.'; 
    				// redirect(base_url('dashboard'),'refresh');
                }
                $this->upload->do_upload('selfie');
                $add_file = array('selfie' => $this->upload->data());
                $add_file = $add_file['selfie']['file_name'];
            }
            $name       = filter_var($this->input->post('name'), FILTER_SANITIZE_STRING);
            $email       = filter_var($this->input->post('email'), FILTER_SANITIZE_STRING);
            $country    = filter_var($this->input->post('country'), FILTER_SANITIZE_STRING);
			$add_date   = filter_var($this->input->post('dob'), FILTER_SANITIZE_STRING);
			$phone      = filter_var($this->input->post('phone'), FILTER_SANITIZE_STRING);
			$verification_code = filter_var($this->input->post('verification_code'), FILTER_SANITIZE_STRING);
			$account_type       = filter_var($this->input->post('account_type'), FILTER_SANITIZE_STRING);
			$address       = filter_var(@$this->input->post('address1'), FILTER_SANITIZE_STRING)." ".filter_var(@$this->input->post('address2'), FILTER_SANITIZE_STRING);
			$city       = filter_var($this->input->post('city'), FILTER_SANITIZE_STRING);
			$state       = filter_var($this->input->post('state'), FILTER_SANITIZE_STRING);
			$zipcode       = filter_var($this->input->post('zipcode'), FILTER_SANITIZE_STRING);
			
			$fields = [
			    'user_id'   =>  $this->session->user_id,
                'name'      => $name,
                'email'     =>  $email,
                'verification_code' => $verification_code,
                'country'   => $country,
                'dob'       => $add_date,
                'phone'     => $phone,
                'account_type' => $account_type,
                'address'   =>  $address,
                'city'      =>  $city,
                'state'     =>  $state,
                'zipcode'   =>  $zipcode,
                'selfie'    => 'uploads/'.$add_file,
                'created_at' => date('Y-m-d')
            ];

			$this->home_model->profile_verification($fields);
			$this->session->set_flashdata('success', 'Your data is recorded.');	
			
// 			echo "<pre>";
// 			print_r($this->session->flashdata('success'));
// 			print_r($this->session->flashdata('errors'));
            $response['status'] = 1; 
            $response['message'] = 'Form data submitted successfully!'; 
            $response['errors'] = @$data;
            echo json_encode($response);
			exit;
// 			redirect(base_url('dashboard'));
		}
	}
	
	public function load_txn_notification()
     {
        if(!$this->session->name){
            header('Location:home');
        }
      sleep(2);
      if($this->input->post('action'))
      {
       $data = $this->home_model->load_txn_request();
       $output = array();
       if($data->num_rows() > 0)
       {
        foreach($data->result() as $row)
        {
         $userdata = $this->home_model->get_user_by_id($row->sender_id);
    
         $output[] = array(
          'user_id'     => $row->sender_id,
          'name'        => $userdata['name'],
          'email'       => $userdata['email'],
          'chat_type'   => $row->type, 
          'status' => $row->status,
          'accepted' => $row->accepted,
          'profile_picture' => $userdata['profile_picture'],
          'txn_id' => $row->txn_id
         );
        }
       }
       echo json_encode($output);
      }
    }
}