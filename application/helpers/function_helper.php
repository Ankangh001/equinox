<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
    
    // -----------------------------------------------------------------------------
    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('is_admin_login'))
            {
                redirect('admin/auth/login', 'refresh');
            }
        }
    }

    if (!function_exists('getUserIpAddr')) {
        function getUserIpAddr(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
    }


        // function send_mail($data){
  
        //     $ci = & get_instance();
        //     $to = $data['email'];
        //     $ci->load->library('phpmailer_lib');
        //     $mail = $ci->phpmailer_lib->load();
        //     $mail->isSMTP();
  
        //     $mail->Host     = 'smtp.gmail.com';
        //     $mail->SMTPAuth = true;
        //     $mail->Username = 'rohitprasad089@gmail.com';
        //     $mail->Password = '2176742@rp';
        //     $mail->SMTPSecure = 'tls';
        //     $mail->Port     = '587';
        //     // $mail->mailtype  = 'html';
        //     // $mail->charset   = 'utf-8';
            
        //     $mail->setFrom($mail->Username, '@Bitcoin');
        //     $mail->addReplyTo($mail->Username, '@Bitcoin');
        //     if(is_array($to)){
        //             foreach($to as $row){
        //                     $mail->addBCC($row, "@Bitcoin");
        //             }
        //     }else{
        //             $mail->addAddress($to, "@Bitcoin");
        //     }
        //     $mail->Subject = 'email-verification';

        //     $mailContent =  "Thank you for signing up.Your Password is <b>".$data['password']. "</b> Your Verification link is ".$data['verification_link'];
        //     $mail->isHTML(true);
        //     $mail->Body = $mailContent;
        //     if ($mail->send()) {
        //         $ci->session->set_flashdata('msg', 'Confirmation mail has been sent.');
        //         return true;
        //         // echo"The mail has been send successfully.";
        //     } else {
        //         $ci->session->set_flashdata('error', 'Confirmation mail could not be sent');
        //         // echo 'Mailer Error: ' . $mail->ErrorInfo;
        //     }
        // }

        // function mail_template($slug = '',$mail_data = '')
        // {
        //     $ci = & get_instance();

        //         // $template =  $ci->db->get_where('ci_email_templates',array('slug' => $slug))->row_array();
        //         // $body = $template['body'];

        //         // $template_id = $template['id'];

        //         // $data['head'] = $subject = $template['subject'];
        //         $body =true;
                
        //         $data['content'] = mail_template_variables($body,$slug,$mail_data);

        //         // $data['title'] = $template['name'];

        //         $template =  $ci->load->view('admin/general_settings/email_templates/email_preview', $data,true);
        //         return array($template, $subject);
        // }

        // function mail_template_variables($content,$slug,$data = '')
        // {
        //         switch ($slug) {
        //                 case 'email-verification':
        //                         $content = str_replace('{FULLNAME}',$data['fullname'],$content);
        //                         $content = str_replace('{VERIFICATION_LINK}',$data['verification_link'],$content);
        //                         $content = str_replace('{USERNAME}',$data['username'],$content);
        //                         $content = str_replace('{PASSWORD}',$data['password'],$content);
        //                         return $content;
        //                 break;

        //                 case 'forget-password':
        //                         $content = str_replace('{FULLNAME}',$data['fullname'],$content);
        //                         $content = str_replace('{RESET_LINK}',$data['reset_link'],$content);
        //                         return $content;
        //                 break;

        //                 case 'general-notification':
        //                         $content = str_replace('{CONTENT}',$data['content'],$content);
        //                         return $content;
        //                 break;

        //                 default:
        //                         # code...
        //                         break;
        //         }
        // }
?>