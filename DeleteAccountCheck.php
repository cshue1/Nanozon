<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sakila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
session_id('mySessionID'); 
session_start();
include('header.php');

$email = $_POST["email"];
$pass = $_POST["password"];

$id = 0;
$id = "SELECT user_id, first_name, last_name FROM user WHERE email='$email' AND pass='$pass'";

$result = $conn->query($id);
$rows = $result->num_rows;

if ($result->num_rows > 0 && isset($email) && isset($pass) && !empty($email) && !empty($pass)){
    /// valid login -> delete this account!!!
    $delete = "DELETE FROM user WHERE email = '$email' AND pass = '$pass'";
    $result2 = $conn->query($delete);
    header('Location:LOGIN.php'); 
  
} 
elseif (!isset($email) || empty($email) || !isset($pass) || empty($pass)){
    header("Location:DeleteAccount.php?error=1");
}
else{
   header("Location:DeleteAccount.php?error=2");
}

?>
