<?php


namespace app\models;


class SoapModel
{
//    protected $wdsl = 'http://127.0.0.1:90/index.php?wsdl';
    protected $wdsl = 'https://gsd24.ru/RemoteAcc.asmx?WSDL';
    protected $defencoding = 'UTF-8';
    protected $params = ['password' => 'vvladmirrwh', 'login' => 'Медведев Владимир', 'cod' => ''];

    public function getWdsl()
    {
        return $this->wdsl;
    }

    public function getCoding()
    {
        return $this->defencoding;
    }

    public function getParams() {
        return$this->params;
    }

}