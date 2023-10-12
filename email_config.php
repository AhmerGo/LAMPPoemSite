<?php
// email_config.php

return [
    'host' => 'smtp.gmail.com',
    'username' => 'your-email@gmail.com',
    'password' => 'your-password',
    'smtp_secure' => PHPMailer::ENCRYPTION_STARTTLS, // or PHPMailer::ENCRYPTION_SMTPS
    'port' => 587, // or 465 for SMTPS
    'from_email' => 'from@example.com',
    'from_name' => 'Mailer'
];
?>