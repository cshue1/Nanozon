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
include('header.php');

$email = $_POST["email"];
$pass = $_POST["password"];

$id = 0;
$id = "SELECT user_id, first_name, last_name FROM user WHERE user.email='$email' AND user.pass='$pass'";

$result = $conn->query($id);
$rows = $result->num_rows;

if ($result->num_rows > 0 && isset($email) && isset($pass) && !empty($email) && !empty($pass)){
   $row = $result->fetch_assoc();
   $first = $row["first_name"];
   $last = $row["last_name"];
   $id = $row["user_id"];

   $sql = "SELECT first_name, last_name, user_id, email FROM user WHERE user_id = \"$id\";";
   $result = $conn->query($sql);
   
   while($row = $result->fetch_assoc())
   {
       session_start();
       $_SESSION['firstname'] = $row['first_name'];
       $_SESSION['lastname'] = $row['last_name'];
       $_SESSION['user_id'] = $row['user_id'];
       $_SESSION['email'] = $row['email'];
       ini_set('session.gc_maxlifetime', 2629800);
   }


   header('Location:NZ_search.php');
   exit;
}
else{
   header("Location:LOGIN.php?error=1");
}

?>