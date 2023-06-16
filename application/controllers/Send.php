<?php
set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends APIMaster {

	public function index()
    {
        $users = array(           

            'ankanghosh010@gmail.com',
            

            // 'mauriciobonin@hotmail.com',
            // 'carlosespinolabonin@hotmail.com',
            // 'lizbethvanessa@hotmail.com',
            // 'espinozaosmar@hotmail.es',
            // 'kyscomunicaciones@hotmail.com',
            // 'maggie.esma@gmail.com',
            // 'espinozanft@hotmail.com',
            // 'diana.esquivel@kuehne-nagel.com',
            // 'jaimestaba2@hotmail.com',
            // 'carlos_lamedadiaz@hotmail.com',
            // 'charly_lego@hotmail.com',
            // '68nahum@gmail.com',
            // 'michaellandinez@gmail.com',
            // 'mlblares24@gmail.com',
            // 'jclargacha@gmail.com',
            // 'llezaira@hotmail.com',
            // 'aureliojmz@gmail.com',
            // 'armando181993@gmail.com',
            // 'eng.israel@gmail.com',
            // 'lealamezquita@gmail.com',
            // 'lealjambor@gmail.com',
            // 'betoledesma@hotmail.com',
            // 'ramiro.leon@gmail.com',
            // 'lesmes.miguel@gmail.com',
            // 'claudio.leturia.gurreonero@gmail.com',
            // 'alfonsolisin181@hotmail.com',
            // 'cesar_liza@yahoo.com',
            // 'alellp08@gmail.com',
            // 'mr_tnt22@hotmail.com',
            // 'edu.investidorfx@gmail.com',
            // 'cr7.leo@gmail.com',
            // 'gregaimoveis@gmail.com',
            // 'gildardo@me.com',
            // 'soyalejandralopez@gmail.com',
            // 'faridlo@yahoo.com',
            // 'almerkaryimer@hotmail.com',
            // 'almireles@gmail.com',
            // 'manuel_lorenz95@hotmail.com',
            // 'mvl29jac@gmail.com',
            // 'humberto_trade@hotmail.com',
            // 'hermanosluiggi@gmail.com',
            // 'aluizalves57@gmail.com',
            // 'anders256@gmail.com',
            // 'limasis3@yahoo.com',
            // 'caiolyrio@hotmail.com',
            // 'jawad.abaz1@gmail.com',
            // 'anvil83@gmail.com',
            // 'apataymurat@gmail.com',
            // 'hassan_azouz@menara.ma',
            // 'alenaydin@gmail.com',
            // 'uszik.com@gmail.com',
            // 'ramonmendoza05@gmail.com',
            // 'trimyles7@gmail.com',
            // 'josephleearauz@gmail.com',
            // 'lukeagimudie@gmail.com',
            // 'twovthree@yahoo.com',
            // 'olanderson11@gmail.com',
            // 'darrwis@gmail.com',
            // 'doyle25@yahoo.com',
            // 'juanmlc1961@gmail.com',
            'gigabytelite.001@gmail.com'

        );

        foreach ($users as $key => $value) {
            $this->load->helper('email_helper');
            $this->load->library('mailer');  
            $body = file_get_contents(base_url('assets/mail/launch.html'));

            
            $email = send_email($value, 'We are now live - 20% Discount', $body,'','',9);
            echo "send ".$key."  ".$value."<br/>";
        }

    }

}
