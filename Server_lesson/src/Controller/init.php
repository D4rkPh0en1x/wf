<?php

require_once '../Service/DBConnector.php';
$configs = require '../../config/app.conf.php';

Service\DBConnector::setConfig($configs['db']);
