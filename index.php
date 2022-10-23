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

switch ($action) {
    case 'create':
        $page = 'create';
        $created = false;
        if (!empty($_POST)) {
            $viewParams = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
            ];
            $created = true;
        }
        $viewParams['created'] = $created;
        break;
    default:
        $page = 'list';
        $viewParams['resultList'] = 'Wyświetlamy listę notatek';
        break;
}

$view = new View();
$view->render($page, $viewParams);
