<?php


namespace app\services;


class Network
{
    public function getPost($var) {
        $input = json_decode(file_get_contents("php://input"), true);
        return $input[$var];
    }



    public function isPostRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }else {
            return false;
        }
    }



}