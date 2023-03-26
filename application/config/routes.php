<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['faq'] = 'welcome/faq';
$route['rules'] = 'welcome/rules';
$route['testimonial'] = 'welcome/testimonial';
$route['notice'] = 'welcome/notice';
$route['symbol'] = 'welcome/symbol';
$route['calender'] = 'welcome/calender';
$route['client-login'] = 'welcome/client';
$route['client-signup'] = 'welcome/clientSignup';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
