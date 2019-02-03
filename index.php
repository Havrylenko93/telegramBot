<?php

const DS = DIRECTORY_SEPARATOR;

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set('error_log', __DIR__ . DS . 'storage' . DS . 'logs' . DS . 'error.log');

require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$dotEnv = Dotenv\Dotenv::create(__DIR__);
$dotEnv->load();

if (!empty($_REQUEST)) {
    die('9');
}

$input = json_decode(file_get_contents("php://input"));

if (!isset($input->message)) {
    die('no message');
}

$chatId = (int)$input->message->from->id;
$baseUrl = 'https://api.telegram.org/bot'. getenv('telegramToken');

if ($input->message->text == '/start') {
    $reply = "Оставь здравый смысл всяк сюда входящий";
    $keyboard = array(array("[Destaques]","[Campinas e RMC]","[esportes]"));
    $resp = array("keyboard" => $keyboard,"resize_keyboard" => true,"one_time_keyboard" => true);
    $url = $baseUrl."/sendmessage?chat_id=".$chatId."&text=oi&reply_markup=".$reply;
    file_get_contents($url);
}





