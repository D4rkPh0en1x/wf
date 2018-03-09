<?php
require_once __DIR__.'/../vendor/autoload.php';

//require_once __DIR__.'/../Service/DBConnector.php';
//to go back a dir from the local dir you must start with / else it's not understand
$configs = require __DIR__. '/../config/app.conf.php';

Service\DBConnector::setConfig($configs['db']);

$map = [
    
    '/account' => __DIR__.'/../src/Controller/account.php',
    '' => __DIR__.'/../src/Controller/index.php',
    '/register' => __DIR__.'/../src/Controller/register.php'
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url, 0, strlen('/index.php')) == '/index.php'){
    $url = substr($url, strlen('/index.php'));
} else if ($url == '/'){
    $url = '';
}
    
if (array_key_exists($url, $map)){
    include $map[$url];
}
    