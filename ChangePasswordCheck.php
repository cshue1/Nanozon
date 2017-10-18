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

$email = $_SESSION['email'];
$oldPass = $_POST["oldPass"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];

$id = 0;
$id = "SELECT user_id FROM user WHERE user.email='$email' AND user.pass='$oldPass'";

$result = $conn->query($id);
$rows = $result->num_rows;

if(!isset($oldPass) || empty($oldPass) || !isset($pass1) || empty($pass1) || !isset($pass2) || empty($pass2)){
    header("Location:ChangePassword.php?error=1");
}
elseif(!$result->num_rows)
   header("Location:ChangePassword.php?error=4");
elseif(strlen($pass1)<8)
   header("Location:ChangePassword.php?error=2");
elseif($pass1 != $pass2)
   header("Location:ChangePassword.php?error=3");
else{
   $sql = "UPDATE user SET pass='$pass1' WHERE user.email='$email' AND user.pass = '$oldPass';";
   
   if ($conn->query($sql) === TRUE) {
      header("Location:myaccount.php?updatedpass=1");
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

?>