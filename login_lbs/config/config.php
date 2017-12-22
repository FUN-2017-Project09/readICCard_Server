<?php

ini_set('display_errors', 1);
define('DB_DATABASE','ICCARD');
define('PDO_DSN', 'sqlsrv:server=iccard.database.windows.net;DATABASE='.DB_DATABASE);
define('DB_USERNAME', 'kura');
define('DB_PASSWORD', 'Jnn5zvpp');

#define('SITE_URL', 'http://localhost/www/login_lbs/public_html/'); //localhost用
#define('SITE_URL', 'http://192.168.2.254/www/login_lbs/public_html/'); //09LAN用
define('SITE_URL', 'http://funlbs.azurewebsites.net/login_lbs/public_html/');
#define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();