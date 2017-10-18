<?php

// This is the final result of recoded Page2.php for assignment 2

echo "<!DOCTYPE html>";
echo "<head>";
echo "<title>Nanozon Search Results</title>";
echo "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" />";
echo "</head>\n<body>\n";
echo "<img src=\"nanozon.jpg\" /><br><br>\n";

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

$search = $_POST["filter"];
echo "search was " . "$search" . ". ";
//$sql = "SELECT item_num, name, description, price FROM merchandise WHERE name, description LIKE \"%$search%\"
//ORDER BY item_num";

//$result = $conn->query($sql);
?>