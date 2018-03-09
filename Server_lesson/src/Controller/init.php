<?php

require_once __DIR__.'/../Service/DBConnector.php';
//to go back a dir from the local dir you must start with / else it's not understand
$configs = require __DIR__. '/../../config/app.conf.php';

Service\DBConnector::setConfig($configs['db']);
