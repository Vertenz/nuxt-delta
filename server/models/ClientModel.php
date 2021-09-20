<?php


namespace app\models;


class ClientModel
{
    private $name;
    private $phone;
    private $type;

    public function __construct(string $name, string $phone, string $type)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->type = $type;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getType() {
        return $this->type;
    }
}