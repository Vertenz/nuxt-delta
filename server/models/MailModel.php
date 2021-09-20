<?php


namespace app\models;


class MailModel
{
    public $to = 'vladmirworld@gmail.com';
    public $text;



    public function createText($name, $phone, $type) {
        $this->text = "
            <h1>Заявка с сайта</h1>
            <h2>ФИО: $name;</h2>
            <h2>Тел: $phone;</h2>
            <h2>Тип заявки: $type;</h2>
        ";
        return true;
    }

}