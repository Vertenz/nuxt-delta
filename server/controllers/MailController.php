<?php


namespace app\controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use app\models\MailModel as MailModel;

class MailController
{
    public $mailModel;

    /**
     * MailController constructor.
     * @param $mailModel
     */
    public function __construct()
    {
        $this->mailModel = new MailModel();
    }


    public function creatMail($name, $phone, $type)
    {
        if (!empty($name) || !empty($phone) || !empty($type)) {
            if ($this->mailModel->createText($name, $phone, $type)) {
                $this->sendMail();
                return true;
            }
        } else {
            return false;
        }
    }

    private function sendMail()
    {
        $text = $this->mailModel->text;
        $this->trySendMail($text);
    }

    protected function trySendMail(string $text)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('ru', '../vendor/phpmailer/phpmailer/language');
            $mail->isHTML(true);

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();                                            // Send using SMTP
            $mail->SMTPDebug = 0;
            $mail->Host = 'ssl://smtp.mail.ru';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'vm@gsd24.ru';                     // SMTP username
            $mail->Password = 'vvladmirrwh10';                               // SMTP password
            $mail->SMTPSecure = 'SSL';
            $mail->Port = 465;

            $mail->setFrom('vm@gsd24.ru');

            $mail->addAddress('vladmirworld@gmail.com');

            $mail->Subject = "Заявка с сайта";

            $mail->Body = $text;

            if ($mail->send()) return true;


        } catch (\Exception $e) {
            return false;
        }

    }

}