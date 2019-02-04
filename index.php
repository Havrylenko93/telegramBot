<?php

const DS = DIRECTORY_SEPARATOR;

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set('error_log', __DIR__ . DS . 'storage' . DS . 'logs' . DS . 'error.log');

require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$dotEnv = Dotenv\Dotenv::create(__DIR__);
$dotEnv->load();


//TODO: need delete
if(isset($_REQUEST['x'])) {
    echo "<pre>";
    var_dump(file_get_contents('777.txt'));
    echo "</pre>";
    exit();
}
if (!empty($_REQUEST)) {
    die('9');
}

$input = json_decode(file_get_contents("php://input"));

if (!isset($input->message)) {
    die('no message');
}

$chatId = (int)$input->message->from->id;
$baseUrl = 'https://api.telegram.org/bot'. getenv('telegramToken');
$httpClient = new \GuzzleHttp\Client();

if ($input->message->text == '/start') {
    $method = '/sendmessage';
    $message = http_build_query([
        'chat_id' => $chatId,
        'text' => 'Оставь здравый смысл всяк сюда входящий',
        'reply_markup' => json_encode([
            'keyboard' => [
                ['Да будет мемас']
            ]
        ])
    ]);

    $response = $httpClient->request('POST',
        $baseUrl . $method . '?' . $message,
        [

        ])->getBody()->getContents();
}else {
    file_put_contents('777.txt', json_encode($input), FILE_APPEND);
}





