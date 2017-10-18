<?php

    session_start();

    echo "<!doctype html>";
    echo "<html>";
    require_once 'NZ_SearchBar.php';
    
    //echo $_SESSION['cust_id'];
    
    $custid = $_SESSION['cust_id'];
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $provider = $_POST["CCProvider"];
    $ccn = $_POST["ccnum"];
    $expM = $_POST["month"];
    $expY = $_POST["year"];
    $cvv = $_POST["scnum"];
    
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
    echo "<h1>";
    echo "THANK YOU!";
    echo "</h1>";
    echo "Your order has been placed.";
    echo "<br>";
    echo "Kindly allow 5-7 business days for your  shipment to be sent to:";
    echo "<br><br>";
    
    if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['address']) && isset($_POST['city'])  && isset($_POST['state']) && isset($_POST['zip']) && isset($POST['CCProvider']) && isset($POST['ccnum'])
        && isset($POST['month']) && isset($POST['year']) && isset($POST['scnum']))
    {
        $sql = "SELECT provider, ccn, expM, expY, cvv
        FROM payment
        WHERE cust_id LIKE \"$custid\";";

        $paymentCHK = $conn->query($sql);
        
        //var_dump($paymentCHK);
        if(!$paymentCHK)
        {
            $ins = "INSERT INTO billing VALUES" .  "('$custid','$provider','$ccn','$expM', '$expY', '$cvv')";
            $result = $conn->query($ins);
        
            if (!$result)
            {
                echo "INSERT INTO payment FAILED:<br>" .
                $conn->error . "<br><br>";
            }
        }
        $sql2 = "SELECT firstName, lastName, streetAddress, city, state, zip
        FROM billing
        WHERE cust_id LIKE \"$custid\"
        AND streetAddress LIKE \"$address\";";
        $result1 = $conn->query($sql2);
        
        //var_dump($result1);
        if(!$result1)
        {
            $sql1 = "INSERT INTO billing VALUES" .  "('$custid','$firstname','$lastname','$address', '$city', '$state', '$zip');";
            $result = $conn->query($sql1);
        
            if (!$result)
            {
                echo "INSERT failed:<br>" .
                $conn->error . "<br><br>";
            }
        }
        while($row1 = $result1->fetch_assoc())
        {
            echo "<td>";
            echo $row1['firstName'] .  " " .$row1['lastName'];
            echo "<br>"; 
            echo $row1['streetAddress'];
            echo "<br>";
            echo $row1['city'] . ", " . $row1['state'] . " " . $row1['zip'];
            echo "</td>";
        }
    }

    
    
    //GET SIZE AND UPDATE INVENTORY TABLE
    $sql3 = "UPDATE inventory SET ";
    
    echo "<br>";
    echo "<h2>";
    echo "Thank you for shopping at Nanozon.";
    echo "</h2>";
    echo "</center>";
    echo "</body>";
    
    $sql4 = "DROP TABLE cart;";
    $result = $conn->query($sql4);
        
    echo "</html>";

?>