<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["default_controller"] = "homes";
$route["about"] = "homes/about";
$route["contact"] = "homes/contact";
$route["signin"] = "homes/signin";
$route["signup"] = "homes/signup";
$route["signout"] = "homes/signout";
$route["signin_process"] = "homes/signin_process";
$route["dashboard"] = "dashboards";
$route["dashboard/admin"] = "dashboards/admin";
$route["users/new"] = "users/user_new";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
