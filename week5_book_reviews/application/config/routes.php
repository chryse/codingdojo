<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route["logout"] = "home/logout";
$route["books/:any"] = "books/index";
$route["books/add"] = "books/add";
$route["books/delete"] = "books/delete";
$route["add-review"] = "books/add_review";
$route["books/add_process"] = "books/add_process";
$route["users/:any"] = "users/index";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
