<?php
require_once 'includes/db.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

   $password = password_hash("password", PASSWORD_DEFAULT);
    $sql = "INSERT INTO users VALUES(NULL, '$name', '$address', '$phone', '$password')";

    $result = mysqli_query($conn, $sql);

    if((mysqli_query($conn,$sql))){
    echo "Data inserted successfully";
    }else{
    echo "Unable to Add User";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, address, phone, password) VALUES ('$name', '$address', '$phone', '$hashed_password')";

    if(mysqli_query($conn, $sql)){
        echo "User registered successfully!";
    } else {
        echo "Error registering user: " . mysqli_error($conn);
    }
}


?>

<form method="post">
    Name: <input type="text" name="name" id="name"><br><br>
    Address: <input type="text" name="address" id="address"><br><br>
    Phone: <input type="number" name="phone" id="phone"><br><br>
    Password: <input type="password" name="password" id="password"><br><br>
    Confirm Password: <input type="password" name="password_confirm" id="password_confirm"><br><br>
    <input type="submit" value="Register">
</form>