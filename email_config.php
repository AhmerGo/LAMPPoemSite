<?php
// email_config.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
return [
    'host' => 'smtp.gmail.com',
    'username' => 'your-email@gmail.com',
    'password' => 'your-password',
    'smtp_secure' => PHPMailer::ENCRYPTION_STARTTLS, // or PHPMailer::ENCRYPTION_SMTPS
    'port' => 587, 
    'from_email' => 'from@example.com',
    'from_name' => 'Mailer'
];
?>