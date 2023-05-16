<?PHP
class AppLogin extends CI_Model
{

    public function validateUserEmail($emailId)
    {
        try {
            $pass_enc = pass_enc;
            $query = "select user_id,email,aes_decrypt(password,'{$pass_enc}')  as password,(select if(count(1)>=1,'0','1') from login_analytics where user_id=emp.user_id) as first_time_user from user as emp where email='{$emailId}' and status = 1 and admin_type = 'Client'";
            $data  = $this->db->query($query)->row_array();
            if ($data) {
                $response['success'] = 1;
                $response['data'] = $data;
            } else {
                $response['success'] = 0;
                $response['message'] = "Data Not Found";
            }
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function insertRegData($jsonData, $device, $deviceId, $appVersion, $user_type)
    {
        try {
            date_default_timezone_set("Asia/Kolkata");
            $createdDate = date("Y-m-d H:i:s");
            $query = "INSERT INTO `Tbl_User_Registration`
                (`jsonData`,
                `device`,
                `deviceId`,
                `appVersion`,
                `createdDate`,
                `user_type`)
                VALUES
                (:jsonData,
                :device,
                :deviceId,
                :appVersion,
                :createdDate,
                                :user_type)";
            $stmt = $this->db->conn_id->prepare($query);
            $stmt->bindParam(':jsonData', $jsonData, PDO::PARAM_STR);
            $stmt->bindParam(':device', $device, PDO::PARAM_STR);
            $stmt->bindParam(':deviceId', $deviceId, PDO::PARAM_STR);
            $stmt->bindParam(':appVersion', $appVersion, PDO::PARAM_STR);
            $stmt->bindParam(':createdDate', $createdDate, PDO::PARAM_STR);
            $stmt->bindParam(':user_type', $user_type, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $response = array(
                    "success" => 1,
                    "message" => "Thank You. We will get back to you at the earliest."
                );
            } else {
                $response = array(
                    "success" => 0,
                    "message" => "Cannot store data"
                );
            }
        } catch (Exception $ex) {
            $response = array(
                "success" => 0,
                "message" => $ex->getMessage()
            );
        }
        return $response;
    }

    function validateUserSession($login_token)
    {
        try {
            $sql = "SELECT user_id, REPLACE(CONCAT(first_name,' ',last_name),'  ',' ') user_name, email, number FROM user where user_id = (SELECT user_id FROM login_analytics where token = '{$login_token}')";
            $result = $this->db->query($sql)->row_array();
            if ($result) {
                $response['success'] = 1;
                $response['data'] = $result;
            } else {
                $response['success'] = 0;
                $response['message'] = "Invalid Token";
            }
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    function PanelLogin($email, $password)
    {
        try {
            $pass_enc = pass_enc;
            $sql = "SELECT  user_id,client_id,concat(first_name,' ',last_name) as user_name,email,password,admin_type FROM user where email = '{$email}'";
            $result = $this->db->query($sql)->row_array();
            if ($result) :
                if (!empty($result['password'])) :
                    if ($result['password'] == $password) :
                        $response['success'] = 1;
                        $response['message'] = "USER_VALIDATED";
                        $response['data'] = $result;
                    else :
                        $response['success'] = 0;
                        $response['message'] = "Your password is incorrect, enter valid password!";
                    endif;
                else :
                    $response['success'] = 0;
                    $response['message'] = "Password has not been set yet, contact Admin";
                endif;
            else :
                $response['success'] = 0;
                $response['message'] = "Invalid username";
            endif;
        } catch (Exception $ex) {
            $response['success'] = 0;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
}