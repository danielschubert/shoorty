<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['shorten'] = "shorten";
$route['/\w+/'] = "r";
$route['default_controller'] = "shorty";
$route['404_override'] = 'errors/page_missing';
