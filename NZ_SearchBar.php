<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
    
    session_start();
    echo "<!doctype html>";
    echo "<head>";
    echo "<div class = 'nanozon' style = 'background-color:#000000;padding-top:0.25cm;'>";
    echo "<table  class = 'nanozon' style='color:#FFFFFF;padding-right:1cm;width:100%;' align=center>";
    echo "<td class = 'nanozon' align=left style='width:50%'>";
    echo "<form action='NZ_results.php' method = 'get' placeholder = 'Enter a Halloween Costume'>";
    echo "<img src='nanozon.jpg' style='width:200px;vertical-align:middle;'>";
    echo "<input class='text' type='text' name='filter' style='width:300px;height:40px;vertical-align:middle;'>";
    echo "&nbsp&nbsp&nbsp&nbsp";    
    echo "<input class='button' type='submit' method='get' action='NZ_results.php' value = ' SEARCH '>";
    echo "</form>";
    echo "</td>";
    echo "<td style='width:15.5%;'>";
    echo "</td>";
    echo "</title>";
    echo "<td class = 'nanozon' rowspan='2' style='width:80xpx;'>";
    echo "<font size='+2'>";
    echo "<b>Hello, </b> <br>";
    echo "</font>";
    echo $_SESSION['firstname']."!";
    echo "</td>";
    echo "<td class = 'nanozon' style='text-align:center;'>";
    echo "<a class = 'nanozon' href='myaccount.php' style='color:#FFA500;'>";
    echo "<b>";
    echo "My Account";
    echo "</b>";
    echo "</a>";
    echo "</td>";
    echo "<td class = 'nanozon' style='text-align:right;padding-right:15px;'>";
    echo "<a class = 'nanozon' href='Cart.php' style='color:#FFA500;'>";
    echo "<img src='cart2.png' style='width:30px ;height:30px;'>";
    echo "<b>";
    echo " Cart";
    echo "</b>";
    echo "</a>";
    echo "</td>";
    echo "<td class = 'nanozon' style='text-align:right;padding-right:15px;'>";
    echo "<a class = 'nanozon' href='LOGIN.php' style='color:#FFA500;'>";
    echo "<b>";
    echo "Logout";
    echo "</b>";
    echo "</a>";
    echo "</td>";
    echo "<td class = 'nanozon' rowspan='2' align=right>";
    
    //SQL customer table
    echo "<font size='+2'>";
    echo "Not ". $_SESSION['firstname'] . "? <br>";
    echo "</font>";
    echo "<a class = 'nanozon' href='LOGIN.php' style='color:#FFA500;'>";
    echo "<b>";
    echo "Sign In";
    echo "</b>";
    echo "</a>";
    echo "</td>";   
    echo "</table>";
    echo "</div>";
    echo "</head>";

?>