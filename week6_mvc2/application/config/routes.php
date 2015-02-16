<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route["weather"] = "weather";
$route["weather/ajax"] = "weather/ajax";
$route["google_map"] = "googlemap";
$route["google_map/ajax"] = "googlemap/ajax";
$route["random_message"] = "messages";
$route["random_message/process"] = "messages/process";
$route["notes"] = "notes";
$route["notes/create"] = "notes/create";
$route["notes2"] = "notes2";
$route["notes2/add"] = "notes2/add";
$route["notes2/edit"] = "notes2/edit";
$route["notes2/delete"] = "notes2/delete";
$route["search"] = "searches/fetch";
$route["searches"] = "searches/fetch";
$route["searches/filter"] = "searches/filter";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
