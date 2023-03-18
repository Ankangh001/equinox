<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['wallet-info']= 'verification/wallet';
$route['signup'] = 'auth/signup';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['edit-user'] = 'home/edit_user';
$route['reset-password'] = 'auth/reset_password';
$route['confirm-change-password/(:any)']= 'auth/confirm_change_password';
$route['home'] = 'home';
$route['messages'] = 'home/messages';
$route['add-address'] = 'home/add_address';
$route['edit-address'] = 'home/edit_address';
$route['update-account'] = 'home/update_account';
$route['update-two-step'] = 'home/update_two_step';
$route['update-share-account'] = 'home/update_share_account'; 
$route['profile-verification'] = 'home/profile_verification';
$route['delete-address/(:num)'] = 'home/delete_address';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['inbox']= 'chat/inbox';
$route['dashboard']= 'home/dashboard';

$route['send-txn-request']= 'home/send_txn_request';

$route['settings']= 'home/settings';
$route['security']= 'home/security';
$route['learn']= 'home/learn';
$route['search']= 'home/search';
$route['associate']= 'home/associate';
$route['api']= 'home/api';
$route['stats']= 'home/stats';
$route['opensource']= 'home/opensource';
$route['research']= 'home/research';
$route['privacy']= 'home/privacy';
$route['support']= 'home/support';

// ADMIN ROUTES

$route['admin/admin'] = 'admin/admin';
$route['admin/admin/(:any)'] = 'admin/admin';

$route['admin'] = 'admin';
//$route['admin/(:any)'] = 'admin';

$route['admin/add-admin'] = 'admin/admin/add_admin';
$route['admin/add-admin/success'] = 'admin/admin/add_admin';
$route['admin/add-admin-form'] = 'admin/admin/add_admin_form';

$route['admin/update-admin/(:num)'] = 'admin/admin/update_admin';
$route['admin/update-admin-form/(:num)'] = 'admin/admin/update_admin_form';

$route['admin/delete-admin/(:num)'] = 'admin/admin/delete_admin';

$route['admin/change-password/(:num)'] = 'admin/admin/change_password';
$route['admin/change-password-form/(:num)'] = 'admin/admin/change_password_form';

$route['admin/validate'] = 'admin/login/validate';
$route['admin/logout'] = 'admin/login/logout';
$route['admin/change-request-status/(:num)'] = 'admin/user/change_request_status';
$route['admin/change-user-status/(:num)'] = 'admin/user/change_user_status';
$route['admin/change-verified-status/(:num)'] = 'admin/user/change_verified_status';
$route['admin/delete-verified-request/(:num)'] = 'admin/user/delete_verified_request';
$route['admin/delete-user/(:num)'] = 'admin/user/delete_user';
$route['admin/user-detail/(:num)'] = 'admin/user/user_detail';
$route['admin/update-user/(:num)'] = 'admin/user/update_user';
$route['admin/delete-request/(:num)'] = 'admin/user/delete_request';
// $route['admin/update-user/(:num)'] = 'admin/user/verification';
// $route['admin/update-user/(:num)'] = 'admin/user/transaction';
// $route['admin/update-user/(:num)'] = 'admin/user/notification';