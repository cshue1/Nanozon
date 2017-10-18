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
    
    $add = $_POST["insert"];
    $k = $_POST['counter'];
    $itemName = $_POST["itemNum"];
    $itemNum = $_POST["itemNum"];
    $qty = $_POST["qty$k"];
    $size = $_POST["size$k"];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
       die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['insert']) && isset($_POST['counter']) && isset($_POST['itemNum']) &&
        isset($_POST["qty$k"]) && isset($_POST["size$k"]))
    {
        if ($add == 'yes')
        {

            $check = "SELECT itemNum, qty, size FROM cart WHERE itemNum LIKE '$itemNum' AND size LIKE '$size';";
            $confirm = $conn->query($check);
            if ($confirm->num_rows == 0)
            {
                $ins = "INSERT INTO cart VALUES ('$itemNum','$qty','$size');";
                $insert = $conn->query($ins);
                if (!$insert)
                {
                    echo "Error inserting item into cart:" .
                    $conn->error . "<br><br>";
                }
            }
            else
            {
                echo "<div class='nanozon'>This item has already been added to the cart.</div>";
            }
            
        }
        else
        {
            $del = "DELETE FROM cart WHERE
                    itemNum LIKE '$itemNum'
                    AND qty LIKE '$qty'
                    AND size LIKE '$size'";
            $delete = $conn->query($del);
            if(!$delete)
            {
                echo "error deleting item from cart:" .
                $conn->error . "<br><br>";
            }
        }
    }

?>