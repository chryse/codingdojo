<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["default_controller"] = "assignments";

// Counter
$route["counter"] = "counters";
$route["counter-reset"] = "counters/reset";

// Time display
$route["timedisplay"] = "timedisplay";

// Survey Form
$route["survey"] = "surveys";
$route["survey-process"] = "surveys/survey_process";
$route["survey-result"] = "surveys/result";

// Random word
$route["randomword"] = "randomwords";
$route["randomword-generate"] = "randomwords/generate";

// Ninja Gold Game
$route["ninjagold"] = "ninjagolds";
$route["gold-process"] = "ninjagolds/gold_process";
$route["reset"] = "ninjagolds/reset";

// Courses
$route["course"] = "courses";
$route["course-process"] = "courses/course_process";
$route["course-add"] = "courses/add";
// to get second segment to url it should be mentioned :any
$route["course-destroy/:any"] = "courses/destroy";

// Login and Registration
$route["login"] = "logins";
$route["login-process"] = "logins/login_process";
$route["login-success"] = "logins/login_success";
$route["logout"] = "logins/logout";

// E Commerce
$route["ecommerce"] = "ecommerces";
$route["add-cart"] = "ecommerces/add_cart";
$route["view-cart"] = "ecommerces/view_cart";
$route["delete-order/:any"] = "ecommerces/delete_order";
$route["order"] = "ecommerces/order";


$route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;