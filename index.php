<?php

namespace App;

//w wersji na świat, dla nas błędy są ważne
//error_reporting(0);
//ini_set('display_errors', '0');

require_once('./src/view.php');
include_once('./src/utils/debug.php');

const DEFAULT_ACTION = 'list';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$viewParams = [];

if ($action === 'create') {
    $page = 'create';
    $viewParams['resultCreate'] = 'Udało sie dodać notatke';
} else {
    $page = 'list';
    $viewParams['resultList'] = 'Wyświetlamy liste notatek';
}

$view = new View();
$view->render($action, $viewParams);
