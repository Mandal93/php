<?php
session_start();

require 'includes/function.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['otp'])){
        $otp = $_POST['otp'];

        if($otp == $_SESSION['otp']){
            echo "OTP verified. Resetting your password.";
        }else{
            echo "OTP doesnot match";
        }
    }else if(isset($_POST['email'])&& isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $otp = rand(1000, 9999);

        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;
        $message ="<p>
            Dear $name, <br>

            If you have not requested to reset your password then ignore this email. <br>
            <hr style = 'color:red;'>
            Your OTP is<strong style = 'color:green'>$otp</strong>.<hr>
            </p>";
        send_otp($email,$name,$message);
    }else{
        echo"Sorry";
    }
}

?>

<form action="resetpassword.php" method="post">
   OTP: <input type="number" name="otp" id="otp"><br><br>
    New Password: <input type="password" name="password" id="password"><br><br>
    Confirm Password: <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Reset Password">
</form>


