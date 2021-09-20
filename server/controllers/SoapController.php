<?php


namespace app\controllers;

use app\models\SoapModel;
use DOMDocument;
use nusoap_client;


class SoapController
{
    private $soapModel;

    /**
     * SoapController constructor.
     */
    public function __construct()
    {
        $this->soapModel = new SoapModel();
    }

    public function getConnect()
    {
        // Config
        $client = new nusoap_client($this->soapModel->getWdsl(), true);
        $client->soap_defencoding = $this->soapModel->getCoding();
        $err = $client->getError();
        if ($err) {
            // Отображаем ошибку
            echo '<p><b>Ошибка в конструкторе класса: ' . $err . '</b></p>';
            return false;
        }
        return $client;
    }

    public function creatXml($a, $b, $c) {

//    header( "content-type: application/xml; charset=utf-8" );
        $dom = new DomDocument('1.0', 'utf-8');

//добавление корня - xml/ Основа
        $xml = $dom->appendChild($dom->createElement('xml'));

//добавление элемента <CLIENTNAME> в <xml>
       $xml->appendChild($dom->createElement('CLIENTNAME', $a));
       $xml->appendChild($dom->createElement('MOBPHONE', $b));
       $xml->appendChild($dom->createElement('COORDREMARK', $c));


// добавление элемента <title> в <book>
//        $title = $clientName->appendChild($dom->createElement('title'));
//        // добавление атрибутоv
//        $clientName->setAttribute('имяАтрибута', 'значение');

// добавление элемента текстового узла <title> в <title>
//        $title->appendChild(
//            $dom->createTextNode($a.$b));


//генерация xml
        $dom->formatOutput = true; // установка атрибута formatOutput
        // domDocument в значение true
// save XML as string or file
        return $dom->saveXML();  // передача строки в test1
//    $dom->save('test1.xml'); // сохранение файла
    }


    public function sendRequest($name, $phone, $type)
    {
        $client = $this->getConnect();
        // Вызываем SOAP-метод
        $data = $this->soapModel->getParams();
        $params = ['p1' => $data['password'], 'p2' => $data['login'], 'p3' => $data['cod']];
        $answer = $client->call('F7', $params);
// Проверим, возник  ли сбой
        if ($client->fault) {
            return false;
        } else {
            // Проверяем, не произошла ли ошибка
            $err = $client->getError();
            if ($err) {
                // Отображаем ошибку
//                echo '<p><b>Ошибка: ' . $err . '</b></p>';
                return false;
            } else {
                // Отображаем результат
//                print_r($answer);
                $guid = (string)$answer['F7Result'];
                echo "answer is $guid \/n name is " . $data['login'] . " password is " . $data['password'];
//                $xml = $this->creatXml($name, $phone, $type);
//          $params = ['p1' => $guid, 'p2' => $xml, 'p3' => ''];
//                $answer = $client->call('F16', $params);
            }
        }
    }


}