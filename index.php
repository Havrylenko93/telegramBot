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
$telegram = new Telegram\Bot\Api(getenv('telegramToken'));

$chatId = (int)$input->message->from->id;

if ($input->message->text == '/start') {
    //$keyboard = [["Дай мемасиков"]];
    $reply = "Оставь здравый смысл всяк сюда входящий";
    //$replyMarkup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
    $telegram->sendMessage([ 'chat_id' => $chatId, 'text' => $reply]);
}





