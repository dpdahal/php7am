<?php

namespace Application\system;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function to($to, $subject, $message, $optional = null)
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = Config::get('mail.host');  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = Config::get('mail.user');                 // SMTP username
            $this->mail->Password = Config::get('mail.password');                           // SMTP password
            $this->mail->SMTPSecure = Config::get('mail.tls');                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = Config::get('mail.port');                                    // TCP port to connect to

            //Recipients
            $this->mail->setFrom(Config::get('mail.user'));
            $this->mail->addAddress($to);     // Add a recipient
            $this->mail->addReplyTo($to, 'php7am');


            //Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->AltBody = $optional;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

}