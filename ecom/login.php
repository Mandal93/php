<?php
if(isset($_SESSION['username'])){
    if($_SESSION['role'] == 1){
        header("Location: /ecom/admin");
    }else if($_SESSION['role'] == 2){
        header("Location: /ecom/dashboard");
}
}
session_start();
$title = "Login Page";
require 'templates/header.php';
include 'data.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(key_exists($username,$users)){
        echo "Username Doesn't Exists";

    }else{
        if(password_verify($password, $users[$username])){
            //echo "Username and Password Mathched. Login Successful";
            $_SESSION['username'] = $username;
            $username == 'admin' ? $_SESSION['role'] = 1 : $_SESSION['role'] = 2;

            //or
            $_SESSION['role'] = ($username == 'admin') ? 1 : 2;
                

            
            header("Location /ecom/Dashboard");
    }else{
        echo "Invalid Password.Please Try Again.";
         }
    }
}
?>


<form action="" method="post">
    Username: <input type="text" name="username" id="username"><br><br>
    Password: <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Login">
</form>


<?php 
require 'templates/footer.php';
?>