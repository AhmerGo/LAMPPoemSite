<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to your Composer vendor autoload file
$config = require 'email_config.php'; // Adjust the path to your config file


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: text/plain");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the POST request
    $name = $_POST["name"];
    $phoneNumber = $_POST["phoneNumber"]; // assuming you want to capture phone number as well
    $poemType = $_POST["poemType"];
    $title = $_POST["title"];
    $poemText = $_POST["poemText"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP(); 
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = $config['smtp_secure'];
        $mail->Port       = $config['port'];


        // Recipients
        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress('ajg2204@hsutx.edu', 'Joe User'); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "New Poem Submission from $name";
        $mail->Body    = "Name: $name<br>Phone: $phoneNumber<br>Poem Type: $poemType<br>Title: $title<br><br>$poemText";

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}
?>
