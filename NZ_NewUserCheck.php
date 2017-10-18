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

$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["password1"];
$pass2 = $_POST["password2"];

$id = 0;
$id = "SELECT user_id FROM user WHERE email='$email'";

$result = $conn->query($id);
$rows = $result->num_rows;

if (!isset($email) || empty($email) || !isset($pass) || empty($pass) || !isset($name) || empty($name) || !isset($pass2) || empty($pass2)){
      header("Location:NZ_NewUser.php?error=1");
}
elseif ($result->num_rows > 0){
   header("Location:NZ_NewUser.php?error=2");
}
elseif($pass != $pass2)
   header("Location:NZ_NewUser.php?error=3");
elseif(strlen($pass)<8)
   header("Location:NZ_NewUser.php?error=4");
else{
   $names = explode(" ", $name, 2);
   $first = $names[0];
   $last = $names[1];
   
   $sql = "INSERT INTO user (first_name, last_name, email, pass) VALUES ('$first', '$last', '$email', '$pass')";
   
   if ($conn->query($sql) === TRUE) {
      $_SESSION['firstname'] = $first;
      $_SESSION['lastname'] = $last;
      $_SESSION['email'] = $email;
      header("Location:NZ_search.php");
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>