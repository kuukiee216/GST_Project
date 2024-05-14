<?php
use PHPMailer\PHPMailer\PHPMailer;

require '../../vendor/autoload.php';

class SMTPMail{
    public function sendMail($Recipient, $Subject, $Body)
    {
        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'ccsched21@gmail.com';
            $mail->Password = 'meyj ahxv aiwi aroo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('dummy@gmail.com', 'Japan Jobs');
            $mail->addAddress($Recipient);

            $mail->isHTML(true);
            $mail->Subject = $Subject;
            $mail->Body = $Body;

            $mail->send();
            return true;
        } catch (Exception $error) {
            return false;
        }
    }
}
