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
$route['client-forget-password'] = 'auth/forgot_password';
$route['reset-password/(:any)'] = 'auth/reset_password/$1';
$route['client-signup/(:any)'] = 'auth/clientSignup/$1';
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
$route['user/successfull-payment'] = 'user/payment/success';
//------------------- End user dashboard -----------------


//-------------------- Admin dashboard ------------------
$route['admin'] = 'admin/admin';
$route['admin/challenge'] = 'admin/challenge';
$route['admin/add-challenge'] = 'admin/challenge/addChallenge';
$route['admin/users'] = 'admin/user';


    //-------purchase----------//
$route['admin/free-trial'] = 'admin/purchase/freeTrial';
$route['admin/phase-1'] = 'admin/purchase/phase1';
$route['admin/phase-2'] = 'admin/purchase/phase2';
$route['admin/phase-3'] = 'admin/purchase/phase3';
$route['admin/completed'] = 'admin/purchase/completed';
$route['admin/server-settings'] = 'admin/purchase/servers';

    //-----payouts------------//
$route['admin/payout/pending'] = 'admin/payout/pending';
$route['admin/payout/approved'] = 'admin/payout/approved';
$route['admin/payout/payout'] = 'admin/payout';

    //----profiles---------//
$route['admin/login'] = 'admin/login';
$route['admin/register'] = 'admin/register';
$route['admin/forget'] = 'admin/forget';
$route['admin/profile'] = 'admin/profile';

    //-------promotes---//
$route['admin/announcements'] = 'admin/announcements';
$route['admin/promotions'] = 'admin/promotions';
$route['admin/games-rewards'] = 'admin/games';
$route['admin/affiliates'] = 'admin/affiliate';
$route['admin/faq'] = 'admin/faq';

    //----complaints-----------//
$route['admin/user-enquiries'] = 'admin/enquiries';
$route['admin/user-complaints'] = 'admin/enquiries/complaints';

    //----accounts admin record----//
$route['admin/accounts/pending-passed-accounts'] = 'admin/account/pendingPassedAccounts';
$route['admin/accounts/approved-passed-accounts'] = 'admin/account/approvedPassedAccounts';

$route['admin/accounts/pending-failed-accounts'] = 'admin/account/pendingFailedAccounts';
$route['admin/accounts/approved-failed-accounts'] = 'admin/account/approvedFailedAccounts';

    //------kyc--------//
$route['admin/user/pending-kyc'] = 'admin/user/viewPendingKyc';
$route['admin/user/approved-kyc'] = 'admin/user/viewApproveKyc';
$route['admin/user/rejected-kyc'] = 'admin/user/viewRejectedKyc';

    //------add coupons------//
$route['admin/add-coupons'] = 'admin/coupon';

    //------LOGS------//
$route['admin/account-logs'] = 'admin/logs/viewlogs';
$route['admin/all-accounts'] = 'admin/logs/allAccounts';
//-------------------- End Admin dashboard ------------------

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
