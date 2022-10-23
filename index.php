<?php

namespace App;

require_once('./src/view.php');
include_once('./src/utils/debug.php');

const DEFAULT_ACTION = 'list';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$viewParams = [];

if ($action === 'create') {
    $viewParams['resultCreate'] = 'Udało sie dodać notatke';
} else {
    $viewParams['resultList'] = 'Wyświetlamy liste notatek';
}

$view = new View();
$view->render($action, $viewParams);
