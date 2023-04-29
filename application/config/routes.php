<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
//page routes
$route['scaling-plan'] = 'welcome/scalingPlan';
$route['faq'] = 'welcome/faq';
$route['rules'] = 'welcome/rules';
$route['testimonial'] = 'welcome/testimonial';
$route['notice'] = 'welcome/notice';
$route['quotes'] = 'welcome/quotes';
$route['market-data'] = 'welcome/maerketData';
$route['economic-calendar'] = 'welcome/calender';
$route['client-login'] = 'welcome/client';
$route['client-signup'] = 'welcome/clientSignup';
$route['affiliate'] = 'welcome/affiliate';
$route['payouts'] = 'welcome/payouts';
$route['contact'] = 'welcome/contact';
$route['about'] = 'welcome/about';
$route['calculators'] = 'welcome/calculators';
$route['tools'] = 'welcome/tools';
$route['complaints'] = 'welcome/complaints';
$route['advance-chart'] = 'welcome/advanceChart';
$route['promotion'] = 'welcome/promotion';
$route['mt5-web-terminal'] = 'welcome/webTerminal';

//legal
$route['terms-of-service'] = 'welcome/service';
$route['privacy-policy'] = 'welcome/policy';
$route['refund-policy'] = 'welcome/refund';
$route['cookie-policy'] = 'welcome/cookie';
$route['risk-disclosure'] = 'welcome/disclosure';
$route['live-account'] = 'welcome/liveAccount';



//user dashboard
$route['user'] = 'user';
$route['user/account-overview'] = 'user/accountOverview';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
