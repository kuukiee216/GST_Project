<?php
use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';

class SMTPMail
{
    public function sendMail($Recipient, $Subject, $Body)
    {
        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'ccsched21@gmail.com'; //change email provider
            $mail->Password = 'meyj ahxv aiwi aroo'; //change password of email provider
            $mail->SMTPSecure = 'tls'; //change encryption
            $mail->Port = 587; //change port

            $mail->setFrom('dummy@gmail.com', 'Japan Jobs');

            foreach($Recipient as $Applicant){
                $mail->addAddress($Applicant);
            }

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
