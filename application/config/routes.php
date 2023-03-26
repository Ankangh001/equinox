<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['home'] = 'welcome';
$route['faq'] = 'welcome/faq';
$route['rules'] = 'welcome/rules';
$route['testimonial'] = 'welcome/testimonial';
$route['notice'] = 'welcome/notice';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
