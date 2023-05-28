<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//-------------------page routes------------------------
$route['default_controller'] = 'welcome';
$route['scaling-plan'] = 'welcome/scalingPlan';
$route['faq'] = 'welcome/faq';
$route['rules'] = 'welcome/rules';
$route['testimonial'] = 'welcome/testimonial';
$route['notice'] = 'welcome/notice';
$route['quotes'] = 'welcome/quotes';
$route['market-data'] = 'welcome/maerketData';
$route['economic-calendar'] = 'welcome/calender';
$route['client-login'] = 'auth/client';
$route['client-signup'] = 'auth/clientSignup';
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

//---------------end page routes----------------


//------------------- user dashboard -----------------
$route['user/login'] = 'user/login';
$route['user/register'] = 'user/register';
$route['user/forget'] = 'user/forget';
$route['user'] = 'user/user';
$route['user/account-overview'] = 'user/account';
$route['user/profile'] = 'user/profile';
$route['user/purchase-history'] = 'user/purchase';
$route['user/start-new-challenge'] = 'user/challenge';
$route['user/metrix'] = 'user/metrix';
$route['user/payment'] = 'user/payment';
$route['user/account-info'] = 'user/info';
$route['user/account-security'] = 'user/security';
$route['user/account-kyc'] = 'user/kyc';
$route['user/payout'] = 'user/payout';
$route['user/announcements'] = 'user/announcements';
$route['user/promotions'] = 'user/promotions';
$route['user/games-rewards'] = 'user/games';
$route['user/affiliate'] = 'user/affiliate';
$route['user/tools'] = 'user/tools';
$route['user/market-data-analysis'] = 'user/market';
$route['user/faq'] = 'user/faq';
$route['user/mt5-webterminal'] = 'user/webterminal';
$route['user/advanced-chart'] = 'user/advance';
$route['user/clculators'] = 'user/calculators';
$route['user/community-chat'] = 'user/communityChat';
$route['user/split'] = 'user/split';
$route['user/economic-calendar'] = 'user/economicCalendar';
//------------------- End user dashboard -----------------


//-------------------- Admin dashboard ------------------
$route['admin'] = 'admin/admin';
$route['admin/challenge'] = 'admin/challenge';
$route['admin/add-challenge'] = 'admin/challenge/addChallenge';

//---functions for challenge
$route['add/challenge'] = 'admin/challenge/save';
$route['view/challenge'] = 'admin/challenge/view';
$route['edit/challenge'] = 'admin/challenge/edit';
$route['delete/challenge'] = 'admin/challenge/delete';
$route['changeStatus/challenge'] = 'admin/challenge/changeStatus';



    //-------purchase----------//
$route['admin/free-trial'] = 'admin/purchase/freeTrial';
$route['admin/phase-1'] = 'admin/purchase/phase1';
$route['admin/phase-2'] = 'admin/purchase/phase2';
$route['admin/phase-3'] = 'admin/purchase/phase3';
$route['admin/completed'] = 'admin/purchase/completed';

$route['admin/payout/pending'] = 'admin/payout/pending';
$route['admin/payout/approved'] = 'admin/payout/approved';
$route['admin/payout/payout'] = 'admin/payout';

$route['admin/login'] = 'admin/login';
$route['admin/register'] = 'admin/register';
$route['admin/forget'] = 'admin/forget';

$route['admin/profile'] = 'admin/profile';

$route['admin/announcements'] = 'admin/announcements';
$route['admin/promotions'] = 'admin/promotions';
$route['admin/games-rewards'] = 'admin/games';
$route['admin/affiliate'] = 'admin/affiliate';
$route['admin/tools'] = 'admin/tools';
$route['admin/market-data-analysis'] = 'admin/market';
$route['admin/faq'] = 'admin/faq';
$route['admin/mt5-webterminal'] = 'admin/webterminal';
$route['admin/advanced-chart'] = 'admin/advance';
$route['admin/clculators'] = 'admin/calculators';
//-------------------- End Admin dashboard ------------------



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
