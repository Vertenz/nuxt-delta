<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Authorization, Origin, X-Requested-With, Content-Type, Accept");
$path = $_SERVER['DOCUMENT_ROOT'];

require $path . "/../services/Autoload.php";
require '../vendor/autoload.php';

$response = array("responseSoup" => false, "responseMail" => false);

use app\controllers\ClientController;
use app\controllers\MailController;
use app\controllers\SoapController;
use app\services\Autoload;
use app\services\Network;

$class = spl_autoload_register([new Autoload(), 'loadClass']);
$client = new ClientController;
$network = new Network;

if ($network->isPostRequest()) {
  $name = $network->getPost('name');
  $phone = $network->getPost('phone');
  $type = $network->getPost('type');
  echo "имя " . $name .  " телефон "  . $phone . " тип " . $type;
} else {
    echo "get";
}
    /*
    $soapClient = new SoapController() func;
    $client = new \app\controllers\CltionientController();
    if ($client->creatOrder($network->getPost('name'), $network->getPost('phone'), $network->getPost('type'))) {
        if($result = $soapClient->sendRequest($client->getName(), $client->getPhone(), $client->getType())) {
            $response['responseSoup'] = true;
        }else {
            $response['responseSoup'] = false;
        }
    }
    if ($client->creatOrder($network->getPost('name'), $network->getPost('phone'), $network->getPost('type'))) {
        $mail = new MailController;
        if ($mail->creatMail($client->getName(), $client->getPhone(), $client->getType())) {
            $response['responseMail'] = true;
        } else {
            $response['responseMail'] = false;
        }
    }

    if($response['responseMail'] === true || $response['responseSoup'] === true) {
        header("HTTP/1.1 200 Mail && Soup OK");
        http_response_code(200);
    }else {
        header("HTTP/1.1 501 Mail && Soup False");
        http_response_code(501);
    }
} else {
    header("HTTP/1.1 500");
    http_response_code(500);
