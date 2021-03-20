<?php
use phpMailer\phpMailer\phpMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';
// $name = $_POST['name'];
// $email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "avihaym6@gmail.com";
        $mail->Password = "0544860675";
        $mail->SMTOSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        $mail->setFrom('avihaym6@gmail.com');
        $mail->addAddress('avihaymaman.dev@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Message received';
        $mail->Body = "<h3>Name: $name<br> Email: $email<br>Subject: $subject<br> Message: $message</h3>";
        $mail->send();
        function_alert('Successfully sent');
    }catch(Exception $c){
        $alert = $c->getMessage();
    }
}



function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 


?>


