<?php
require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Initialize the PHPMailer instance
$mail = new PHPMailer(true);

function sendcode($email, $subject, $code) {
    global $mail;
    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  // Enable verbose debug output
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'barnalidasg3@gmail.com';             // SMTP username
        $mail->Password   = 'BarnalidasPome@2002';              // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable SSL encryption
        $mail->Port       = 465;                                // Port 465 for SSL

        // Recipients
        $mail->setFrom('codergirlg3@gmail.com', 'Connectsphere');
        $mail->addAddress($email);                              // Add recipient

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Your verification code is: <b>$code</b>";
        $mail->send();
        
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
