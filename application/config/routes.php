<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['vendor_page'] = 'home/vendor';


$route['default_controller'] = 'home';
$route['admin'] = 'admin/dashboard/index'; // Load dashboard directly
$route['login'] = 'admin/login';
$route['login_action'] = 'admin/login/login_action';
$route['logout'] = 'admin/login/logout';
$route['admin/signup'] = 'admin/signup';
$route['admin/signup_action'] = 'admin/signup/signup_action';

$route['admin/project'] = 'admin/dashboard/portfolio';
$route['admin/add-project'] = 'admin/dashboard/add_portfolio_form';
$route['admin/edit-project/(:any)'] = 'admin/dashboard/edit_portfolio/$1';


$route['admin/education'] = 'admin/dashboard/education';
$route['admin/add-education'] = 'admin/dashboard/add_education_form';
$route['admin/edit-education/(:any)'] = 'admin/dashboard/edit_education/$1';

$route['admin/save_education'] = 'dashboard/save_education';
$route['admin/delete_edu/(:any)'] = 'dashboard/delete_edu/$1';

$route['admin/experience'] = 'admin/dashboard/experience';
$route['admin/add-experience'] = 'admin/dashboard/experience_add';
$route['admin/edit-experience/(:any)'] = 'admin/dashboard/edit_experience/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
?>
