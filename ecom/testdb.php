<?php

$host = "localhost";
$username = "root";
$password = "password";
$database = "bca4_test";

$conn = mysqli_connect($host, $username, $password, $database);
if(!$conn){
    echo "Database connection failed" . mysqli_connect_errno();
}
//else{
  //  echo "Database connected successfully";
//}
//display users data

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

print_r($result);

//echo $result->num_rows . " records found.";

$count = mysqli_num_rows($result);
echo $count;

echo "<pre>";
while($user = mysqli_fetch_assoc($result)){
    print_r($user);
}
echo "</pre>";

$password = password_hash("password", PASSWORD_DEFAULT);
$sql = "INSERT INTO users VALUES(NULL, 'Ram', 'Biratnagar', '9763330489', '$password')";

$result = mysqli_query($conn, $sql);

if((mysqli_query($conn,$sql))){
    echo "Data inserted successfully";
}else{
    echo "Unable to Add User";
}