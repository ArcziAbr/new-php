<?php

namespace App;

//w wersji na świat, dla nas błędy są ważne
//error_reporting(0);
//ini_set('display_errors', '0');

require_once('./src/controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');

Controller::initConfiguration($configuration);


$controller = new Controller($_GET, $_POST);
$controller->run();
