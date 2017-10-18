<?php

    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $sql = "SELECT first_name, last_name, user_id, email FROM user WHERE user_id = \"$id\";";
    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc())
    {
        echo $row['first_name'] . "<br>";
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
    }
    
    $sql1 = "DROP TABLE IF EXISTS cart;
            CREATE TABLE cart
            (
                itemNum SMALLINT,
                qty SMALLINT,
                size VARCHAR(2)
            );";
    $result = $conn->query($sql1);

?>