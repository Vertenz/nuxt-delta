<?php


namespace app\controllers;
use app\models\ClientModel as  Client;

class ClientController
{
    public $client;

    public function creatOrder(string $name, string $phone, string $type) {
        if ($name && $phone && $type){
            $correctPhone = preg_replace("/[^0-9]/", '', $phone);
            return $this->client = new Client( $name, $correctPhone, $type);
        }else {
            return false;
        }
    }

    public function getName() {
        return $this->client->getName();
    }

    public function getPhone() {
        return $this->client->getPhone();
    }

    public function getType() {
        return $this->client->getType();
    }
}