     <?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

     require 'includes/PHPMailer/Exception.php';
     require 'includes/PHPMailer/PHPMailer.php';
     require 'includes/PHPMailer/SMTP.php';

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
         $mail->addAddress('pokharelanmol123@gmail.com', 'receiver name');

         // Content
         $mail->isHTML(false); // Plain text
         $mail->Subject = 'Your Subject Here';
         $mail->Body    = 'This is the plain text message body';

         $mail->send();
         echo 'Message has been sent';
     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
     ?>
     