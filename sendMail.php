<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

function sendMail($to, $subject, $body) {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hanzuai85@gmail.com';       // CHANGE
        $mail->Password   = 'dfuhmmnepdrumfuv';    // CHANGE
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('hanzuai85@gmail.com', 'Visum_point');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}
?>