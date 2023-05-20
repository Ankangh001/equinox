<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class APIMaster extends CI_Controller
{

    public $development;
    public $datetime;

    public function __construct()
    {
        parent::__construct();

        $this->development = ($_SERVER['HTTP_HOST'] != 'xyz.com') ? 1 : 0;


        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400'); // cache for 1 day
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }
            exit(0);
        }
        $this->datetime = date("Y-m-d H:i:s");

        $this->load->model('AppLogin');
    }

    public function returnResponse(int $status, string $message, array $data = [], string $page_name = "")
    {
        $response['success'] = $status;
        !empty($data) ? $response['data'] = $data : '';
        !empty($message) ? $response['message'] = $message : '';
        !empty($page_name) ? $response['page_name'] = $page_name : '';
        $this->jsonOutput($response);
    }

    public function jsonOutput(array $response)
    {
        header('Content-type: application/json');
        echo json_encode($this->utf8ize($response), 1);
        exit();
    }
	
    public function utf8ize($mixed)
    {
        $content = json_encode($mixed);
        if (empty($content)) {
            if (is_array($mixed)) {
                foreach ($mixed as $k => $v) {
                    $mixed[$k] = $this->utf8ize($v);
                }
            } else if (is_string($mixed)) {
                return utf8_encode($mixed);
            }
            return $mixed;
        } else {
            return $mixed;
        }
    }

    public function validateClientWithAuthKey()
    {
        $headers = getallheaders();
        $authorization = '';
        $success = 1;
        $response['message'] = "Authenticated";
        if (isset($headers['authorization'])) {
            $authorization = $headers['authorization'];
        }
        if (isset($headers['Authorization'])) {
            $authorization = $headers['Authorization'];
        }
        if ($authorization == "") {
            $this->returnResponse(0, 'Please make a request with authorization key!');
        }
        $result = $this->AppLogin->fetch_client_authKey();
        if (!$result) {
            $this->returnResponse(0, "Contact Benepik, No Authorization Key Found");
        }
        if ($authorization != $result) {
            $this->returnResponse(0, "Invalid authorization key.");
        }
    }

    public function validateUserSession()
    {
        $headers = getallheaders();
        $authorization = '';
        $success = 1;
        $response['message'] = "Authenticated";
        if (isset($headers['authorization'])) {
            $authorization = $headers['authorization'];
        }
        if (isset($headers['Authorization'])) {
            $authorization = $headers['Authorization'];
        }
        if ($authorization == "") {
            $this->returnResponse(0, "Please make a request with authorization key!");
        }
        $result = $this->AppLogin->validateUserSession($authorization);
        if ($result['success'] == 0) {
            $this->returnResponse(0, "Failed: Invalid Session!");
        } else {
            return $authorization;
        }
    }

    public function verifyAuth()
    {
        $headers = $_SESSION;
        $authorization = '';
        $success = 1;
        $response['message'] = "Authenticated";
        if (isset($headers['token']) && $headers['admin_type']=='Client') {
            $authorization = $headers['token'];
        }

        if ($authorization == "") {
            redirect('client-login');
            $this->returnResponse(0, "You are not Authorised!");
        }

        $result = $this->AppLogin->validateUserSession($authorization);
        if ($result['success'] == 0) {
            redirect('client-login');
            $this->returnResponse(0, "Failed: Invalid Session!");
        } else {
            return $authorization;
        }
    }

    public function verifyAdminAuth()
    {
        $headers = $_SESSION;
        $authorization = '';
        $success = 1;
        $response['message'] = "Authenticated";
        if (isset($headers['token']) && $headers['admin_type']=='Admin') {
            $authorization = $headers['token'];
        }
        if ($authorization == "") {
            redirect('admin/login');
            $this->returnResponse(0, "You are not Authorised!");
        }

        $result = $this->AppLogin->validateUserSession($authorization);
        if ($result['success'] == 0) {
            redirect('admin/login');
            $this->returnResponse(0, "Failed: Invalid Session!");
        } else {
            return $authorization;
        }
    }

    public function validateAPIInput($inputData, $allParamInput, $mandatoryInput, $noEmployeeIdInput = '')
    {

        $allParam = ["client_id", "device", "device_id"];
        $mandatory = [];

        if (trim($noEmployeeIdInput) == '') {
            $noEmployeeIdInput = 0;
        }

        if ((int) $noEmployeeIdInput != 1) {
            // array_push($allParam, "employeeId");
        }

        $allParam = array_merge($allParam, $allParamInput);
        $mandatory = array_merge($mandatory, $mandatoryInput);

        $development = ($_SERVER['HTTP_HOST'] != 'benepik.co.in') ? 1 : 0;

        $inputKeys = array();
        $emptyValues = array();

        if (empty($inputData)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'All keys are missing: ' . join(", ", $allParam) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }

        foreach ($inputData as $key => $option) {
            array_push($inputKeys, $key);
            if (in_array($key, $mandatory) && empty($option)) {
                array_push($emptyValues, $key);
            }
        }

        $diff = array_diff($allParam, $inputKeys);
        /* check for missing key */
        if (!empty($diff)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'key missing: ' .  join(", ", $diff) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }

        /* check for empty key */
        if (!empty($emptyValues)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'Empty key:' . join(", ", $emptyValues) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }
    }

    public function validateAPIInput2($inputData, $allParamInput, $mandatoryInput, $noEmployeeIdInput = '')
    {

        $allParam = [];
        $mandatory = [];

        if (trim($noEmployeeIdInput) == '') {
            $noEmployeeIdInput = 0;
        }

        if ((int) $noEmployeeIdInput != 1) {
            // array_push($allParam, "employeeId");
        }

        $allParam = array_merge($allParam, $allParamInput);
        $mandatory = array_merge($mandatory, $mandatoryInput);


        $development = ($_SERVER['HTTP_HOST'] != 'benepik.co.in') ? 1 : 0;

        $inputKeys = array();
        $emptyValues = array();

        if (empty($inputData)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'All keys are missing: ' . join(", ", $allParam) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }

        foreach ($inputData as $key => $option) {
            array_push($inputKeys, $key);
            if (in_array($key, $mandatory) && empty($option)) {
                array_push($emptyValues, $key);
            }
        }

        $diff = array_diff($mandatory, $inputKeys);
        /* check for missing key */
        if (!empty($diff)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'key missing: ' .  join(", ", $diff) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }

        /* check for empty key */
        if (!empty($emptyValues)) {
            $response['success'] = 0;
            $response['message'] = ($development == 1) ? 'Empty key:' . join(", ", $emptyValues) : 'Bad request';
            $this->jsonOutput($response);
            exit();
        }
    }

    public function randomuuid($length)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

	public function compression($files)
    {
        $file = $files['tmp_name'];
        if (filesize($file) <= 1000000 ||  $file["type"] == "image/svg+xml") {
            return $files;
        }
        $info = getimagesize($files['tmp_name']);
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($file);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($file);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($file);
        imagejpeg($image, $file, 50);
        return $files;
    }

	public function compression64($file)
    {

        list($data1, $base64str) = explode(";base64,", $file);
        $mime = explode(":", $data1)[1];
        list($file_type, $file_cat) = explode("/", $mime);
        $data = base64_decode($base64str);
        $percent = "0.5";
        $im = imagecreatefromstring($data);
        $width = imagesx($im);
        $height = imagesy($im);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        $tmpfname = tempnam(sys_get_temp_dir(), "121");
        $res = imagejpeg($thumb, $tmpfname);
        if ($res) {
            $red_base64 = base64_encode(file_get_contents($tmpfname));
            $res = "data:" . $file_type . "/jpeg;base64," . $red_base64;
            return $res;
        }
    }

    public function renameImage($length_of_string, $module_name)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return $module_name . "_" . time() . "_" . substr(str_shuffle($str_result), 0, $length_of_string);
    }

    function validateParam($param_object, $data, $isLogin)
    {
        $headers = getallheaders();
        $authorization = isset($headers['authorization']) ? $headers['authorization'] : (isset($headers['Authorization']) ? $headers['Authorization'] : "");
        if ($isLogin) :
            /*validate headers*/
            if (empty($authorization)) :
                $response = array(
                    'success' => 0,
                    'message' => 'UNAUTHORIZED (BAD Headers)',
                );
                $this->jsonOutput($response);
                exit();
            endif;
            $param_object = array_merge($param_object, ["employee_id" => "required|type:number"]);
            if (!isset($param_object['user_type'])) :
                $param_object = array_merge($param_object, ["user_type" => "required|type:number"]);
            endif;
        endif;

        $other_params = [
            "client_id" => "required",
            "device" => "required|minValue:1|type:number",
            "device_id" => "required",
            "app_version" => "required|type:number",
        ];
        $param_object = array_merge($param_object, $other_params);
        if (empty($param_object) || empty($data)) :
            $response = ['success' => 0, 'message' => 'UNAUTHORIZED (Bad inputs)'];
            $this->jsonOutput($response);
            exit();
        endif;
        if (count($data) < count($param_object)) :
            $response = ['success' => 0, 'message' => 'UNAUTHORIZED (All input parameters not provided)', 'missing_parameters' => array_values(array_diff(array_keys($param_object), array_keys($data)))];
            $this->jsonOutput($response);
            exit();
        endif;
        foreach ($param_object as $key => $val) :
            if (!is_array($val)) :
                $explode_arr = explode('|', $val);
                foreach ($explode_arr as $exVal) :
                    if (!isset($data[$key])) :
                        $response = ['success' => 0, 'message' => "{$key} input is required."];
                        $this->jsonOutput($response);
                        exit();
                    endif;
                    $explode_exVal = explode(":", $exVal);
                    $this->validateParamArr($explode_exVal, $data, $key);
                endforeach;
            else :
                if (!isset($data[$key])) :
                    $response = ['success' => 0, 'message' => "{$key} input is required."];
                    $this->jsonOutput($response);
                    exit();
                endif;
                if (!is_array($data[$key])) :
                    $response = ['success' => 0, 'message' => "{$key} is not an array format."];
                    $this->jsonOutput($response);
                    exit();
                endif;
                foreach ($val as $arrKey => $arrVal) :
                    if (!is_array($arrVal)) :
                        if (empty($data[$key])) :
                            $response = ['success' => 0, 'message' => "{$key} input array is empty."];
                            $this->jsonOutput($response);
                            exit();
                        endif;
                    endif;
                endforeach;
            endif;
        endforeach;
        return $authorization;
    }

    function validateParamArr($explode_exVal, $data, $key)
    {
        foreach ($explode_exVal as $exdKey => $exdVal) :
            //check for required value
            if ($exdVal == 'required') :
                if ($data[$key] == '') :
                    $response = ['success' => 0, 'message' => "{$key} should not be empty."];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for max length
            if ($exdVal == 'max') :
                if (strlen($data[$key]) > $explode_exVal[1]) :
                    $response = ['success' => 0, 'message' => "{$key} key $exdVal length is {$explode_exVal[1]}"];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for min length
            if ($exdVal == 'min') :
                if (strlen($data[$key]) < $explode_exVal[1]) :
                    $response = ['success' => 0, 'message' => "{$key} key $exdVal length is {$explode_exVal[1]}"];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for min value
            if ($exdVal == 'minValue') :
                if ($data[$key] < $explode_exVal[1]) :
                    $response = ['success' => 0, 'message' => "Min value for {$key} is {$explode_exVal[1]}"];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for max value
            if ($exdVal == 'maxValue') :
                if ($data[$key] > $explode_exVal[1]) :
                    $response = ['success' => 0, 'message' => "Max value for {$key} is {$explode_exVal[1]}"];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for length
            if ($exdVal == 'length') :
                if (strlen($data[$key]) != $explode_exVal[1]) :
                    $response = ['success' => 0, 'message' => "Length of {$key} is {$explode_exVal[1]}"];
                    $this->jsonOutput($response);
                    exit();
                endif;
            endif;
            //check for min length
            if ($exdVal == 'type') :
                $this->typeValidation($explode_exVal[1], $data[$key], $key);
            endif;
            //check for accepted string
            if ($exdVal == 'accepted') :
                $this->acceptStringValidation($explode_exVal[1], $data[$key], $key);
            endif;
        endforeach;
    }
	
    function typeValidation($type, $data, $key)
    {
        $response = [];
        switch ($type) {
            case 'email':
                if (!filter_var($data, FILTER_VALIDATE_EMAIL)) :
                    $response = ['success' => 0, 'message' => "{$key} key will be a valid email."];
                endif;
                break;
            case 'number':
                if (!filter_var($data, FILTER_VALIDATE_INT)) :
                    $response = ['success' => 0, 'message' => "{$key} should be a numeric value."];
                endif;
                break;
            case 'alphanum':
                if (!ctype_alnum($data)) :
                    $response = ['success' => 0, 'message' => "{$key} should be a alphanumeric value. Special characters are not allowed."];
                endif;
                break;
        }
        if (!empty($response)) :
            $this->jsonOutput($response);
            exit();
        else :
            return true;
        endif;
    }

    public function curl($jsonArr, $methodName, $url, $headers)
    {
        $curlData = ($methodName == 'GET') ? false : $jsonArr;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, ($methodName == 'GET') ? false : true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, ($methodName == 'GET') ? CURLOPT_HTTPGET : CURLOPT_POSTFIELDS, $curlData);
        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    public function genrateTokenForKMS($employee_id)
    {
        $jwt = "";
        $sql = "SELECT email_id,employee_code FROM Employee_Master where employee_id = {$employee_id}";
        $response = $this->db->query($sql)->row_array();
        $secretKey = $this->db->query("SELECT jwtSecretKey FROM Credentials")->row_array()['jwtSecretKey'] ?? "";
        if ($secretKey) :
            $key = $secretKey;
            $payload = array(
                "email" => $response['email_id'] ?? "",
                "employee_id" => $response['employee_code'] ?? "",
                "iat" => strtotime(date('Y-m-d H:i:s')),
                "exp" => strtotime(date('Y-m-d H:i:s')) + 36000,
            );
        // $jwt = JWT::encode($payload, $key);
        endif;
        return $jwt;
    }

    public function load_view(string $file_name, array $data = [])
    {
        $employee_id = $_SESSION['employee_id'] ?? 0;
        $response = $this->db->query("SELECT role_type FROM hero.Employee_Master WHERE employee_id = $employee_id")->row_array();
        $role_id = $response['role_type'] ?? 0;
        if ($role_id == 1) :
            #Admin Access / Super Admin
            $this->load->view("role/super_admin_header", $data);
        elseif ($role_id == 2) :
            #Employee Engagement Access
            $this->load->view("role/employee_engagement_header", $data);
        elseif ($role_id == 3) :
            #BHR Access
            $this->load->view("role/bhr_header", $data);
        elseif ($role_id == 4) :
            #Sales Access
            $this->load->view("role/sales_header", $data);
        else :
            echo "Hello " . $data['user_name'] . "<br>" . "You have not any rights assign as of now you can contact Benepik";
            die;
        endif;
        $this->load->view($file_name);
        $this->load->view("footer");
    }

    public function encryptAES($data) {
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', pass_enc, OPENSSL_RAW_DATA,pass_iv);
        return base64_encode($encrypted);
    }

    public function decryptAES($encryptedData) {
        $decoded = base64_decode($encryptedData);
        $decrypted = openssl_decrypt($decoded, 'AES-256-CBC', pass_enc, OPENSSL_RAW_DATA,pass_iv);
        return $decrypted;
    }
}
