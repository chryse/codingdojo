<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['logout'] = 'main/logout';
$route['friends'] = 'friends/index';
$route['user/:any'] = 'friends/user';
$route['delete'] = 'friends/delete';
$route['add'] = 'friends/add';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
