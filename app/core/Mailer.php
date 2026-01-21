<?php
namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

class Mailer
{
    public static function send(array $config, string $toEmail, string $toName, string $subject, string $body): bool
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $config['host'];
            $mail->Port = $config['port'];
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = $config['secure'] ?: PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Username = $config['user'];
            $mail->Password = $config['password'];
            $mail->setFrom($config['from_email'], $config['from_name']);
            $mail->addAddress($toEmail, $toName);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->isHTML(true);
            $mail->send();
            return true;
        } catch (MailException $e) {
            return false;
        }
    }
}
