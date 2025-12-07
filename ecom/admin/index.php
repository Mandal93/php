<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: /ecom/login.php");
}else{
    if(!isset(($_SESSION['role']))){
        echo "YOU FORGOT TO STORE ROLE DATA";
        exit();
    }else{
        if($_SESSION['role'] == 2){
            header("Location: /ecom/dashboard");
        }else if($_SESSION['role'] =! 1){
            echo "YOU ARE ON WRONG PLACE";
            exit();
        }
    }
}

?>
this is admin panel