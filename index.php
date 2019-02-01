<?php

const DS = DIRECTORY_SEPARATOR;

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set('error_log', __DIR__ . DS . 'storage' . DS . 'logs' . DS . 'error.log');

if (!empty($_REQUEST)) {
    die('die');
}

require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

echo "<pre>";
var_dump(file_get_contents("php://input"));
echo "</pre>";
exit();