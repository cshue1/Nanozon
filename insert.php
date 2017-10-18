<?php
    echo "<html>";
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $itemNum=$_GET['itemNum'];
    $qty=$_GET['qty'];
    $size=$_GET['size'];    
    
    $ins = "INSERT INTO cart VALUES ($itemNum,$qty,$size);";
    $insert = $conn->query($ins);
    if ($insert)
    {
        return true;
    }
    else
    {
        return false;
    }
    echo "</html>";

?>