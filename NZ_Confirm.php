<?php

    session_start();
    
    echo "<!doctype html>";
    echo "<title>";
    echo "Nanozon | Confirm";
    echo "</title>";
    echo "<html>";
    require_once 'NZ_SearchBar.php';
    
    $custid = $_SESSION['user_id'];
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $country = $_POST["country"];
    $provider = $_POST["CCProvider"];
    $ccn = $_POST["ccnum"];
    $expM = $_POST["month"];
    $expY = $_POST["year"];
    $cvv = $_POST["scnum"];
    
    $counter = 0;
    $max = 12;
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    echo "<body>";
    echo "<center>";
    echo "<h1 class='nanozon2'>";
    echo "THANK YOU!";
    echo "</h1>";
    echo "<div class='nanozon3'>";
    echo "Your order has been placed.";
    echo "<br>";
    echo "Kindly allow 5-7 business days for your  shipment to be sent to:";
    echo "</div>";
    echo "<h2 class='nanozon2'>";
    echo "<br>";
        $updt = "SELECT provider, ccn, expM, expY, cvv
        FROM payment
        WHERE cust_id LIKE \"$custid\";";
        $insert = $conn->query($updt);
        
        if(!$insert)
        {
            echo "INSERT INTO payment FAILED:<br>" . 
            $conn->error . "<br><br>";
        }
        $sql = "SELECT cust_id,provider,ccn,expM,expY,cvv
        FROM payment
        WHERE cust_id = $_SESSION[user_id]
        AND ccn = $ccn;";
        $result = $conn->query($sql);
        if(!$result)
        {
            $sql1 = "INSERT INTO payment (cust_id,provider,ccn,expM,expY,cvv)
            VALUES ('$custid','$provider','$ccn','$expM','$expY','$cvv');";
            $insert = $conn->query($sql1);
            
            if(!$insert)
            {
                echo "INSERT INTO billing failed:<br>" .
                $conn->error . "<br><br>";
            }
        }
        $sql2 = "SELECT firstName, lastName, streetAddress, city, state, zip, country
        FROM billing
        WHERE cust_id = $_SESSION[user_id]
        AND streetAddress = $address;";
        $result1 = $conn->query($sql2);
        
        if(!$result1)
        {
            $sql1 = "INSERT INTO billing (cust_id,firstName,lastName,streetAddress,city,state,zip,country) VALUES " . "('$custid','$firstname','$lastname','$address', '$city', '$state', '$zip','$country');";
            $result = $conn->query($sql1);
        
            if (!$result)
            {
                echo "INSERT INTO billing failed:<br>" .
                $conn->error . "<br><br>";
            }
            
            
        }        
            echo "<td>";
            echo "$firstname $lastname";
            echo "<br>";
            echo "$address";
            echo "<br>";
            echo "$city, $state $zip";
            echo "</td>";
            
            
    $sql = "SELECT c.itemNum,c.qty,c.size,i.itemNum,i.quantity,i.size
            FROM cart as c,
                inventory as i
            WHERE c.itemNum = i.itemNum
            AND c.size = i.size;";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) 
        {
            //GET SIZE AND UPDATE INVENTORY TABLE
            $change = $row['quantity'] - $row['qty'];
            $sql3 = "UPDATE inventory SET quantity='$change' WHERE itemNum='" . $row['itemNum'] . "' AND size='" . $row['size']."';";
            $results = $conn->query($sql3);
            if(!$results)
            {
                echo "Failed to update inventory table: " .
                $conn->error . "<br><br>";
            }

        }
    }
    else
    {
        $conn->error . "<br><br>";
    }
    $del = "DELETE FROM cart WHERE cust_id LIKE $_SESSION[user_id]";
    $delete = $conn->query($del);
    if(!$delete)
    {
        echo "Failed to remove from cart: " .
        $conn->error . "<br><br>";
    }
    
    
    
    echo "<br>";
    echo "</h2>";
    echo "<div class='nanozon3'>";
    echo "Thank you for shopping at Nanozon.";
    echo "</div>";
    echo "<br>";
    echo "<form action='NZ_search.php'>";
    echo "<button class='button' type='submit'>";
    echo "KEEP SHOPPING";
    echo "</button>";
    echo "</form>";
    echo "<form action='LOGIN.php'>";
    echo "<br>";
    echo "<button class='button' type='submit'>";
    echo "LOGOUT";
    echo "</button>";
    echo "</form>";
    echo "</center>";
    echo "</body>";
    
        
    echo "</html>";
    $conn->close();
?>