<?php
    use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

     require 'PHPMailer/Exception.php';
     require 'PHPMailer/PHPMailer.php';
     require 'PHPMailer/SMTP.php';

function send_otp($email,$name,$message){
    
     $mail = new PHPMailer(true);

     try {
         // Server settings
         $mail->isSMTP();
         $mail->Host       = 'smtp.gmail.com';       // Gmail SMTP server
         $mail->SMTPAuth   = true;
         $mail->Username   = 'pokharelanmol123@gmail.com'; // Fixed: Removed duplicate @gmail.com
         $mail->Password   = 'sbhuarecxrnbsgnd';       // Your Gmail App Password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS encryption
         $mail->Port       = 587;


         //Fix for SSL certificte issue in XAMPP
         $mail ->  SMTPoptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
            );


         // Recipients
         $mail->setFrom('pokharelanmol123@gmail.com', 'sender name');
         $mail->addAddress($email, $name);

         // Content
         $mail->isHTML(true); 
         $mail->Subject = 'Your OTP Here';
         $mail->Body    = $message;

         $mail->send();
         echo 'Message has been sent';
     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
     
     

}