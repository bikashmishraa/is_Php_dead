<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// require 'vendor/autoload.php'; // Make sure this is the correct path


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if(empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
    echo "All fields are required.";
    exit;
}
echo "Success!  ";  ;


$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'bikash.mishra2079@gmail.com';       // your Gmail address
    $mail->Password   = 'dutj qubb etju csbz';          // use App Password from Google
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom($email, $firstname . ' ' . $lastname); // sender's email and name
    $mail->addAddress('bikash.mishra2079@gmail.com', 'Bikash Mishra');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = "<strong>First name:</strong> $firstname<br><strong>Last name:</strong> $lastname<br><strong>Email:</strong> $email<br><strong>Message:</strong> $message";
    $mail->AltBody = "First name: $firstname\nLast name: $lastname\nEmail: $email\nMessage: $message";

    $mail->send();
    echo "Email sent successfully.";
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
?>
