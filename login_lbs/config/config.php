<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:dbhost=localhost;dbname=beta_db');
define('DB_USERNAME', 'project9');
define('DB_PASSWORD', 'lbs4uJsif');

define('SITE_URL', 'http://localhost/www/login_lbs/public_html/'); //localhost用
#define('SITE_URL', 'http://192.168.2.254/www/login_lbs/public_html/'); //09LAN用
#define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();