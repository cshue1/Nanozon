<?php
    
    session_start();
    echo "<title>";
    echo "Nanozon | Search";
    echo "</title>";
    echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
    
    echo "<!doctype html>";
    echo "<img src='pumpkinpatch.jpg' style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>";
    //echo "<html style = 'background:url(pumpkinpatch.jpg);width:100%;height:100% background-repeat: no-repeat;'>";
    echo "<html>";
    echo "<head>";
    echo "<title>";
    echo "Nanozon Search Page";
    echo "</title>";
    echo "<table class = 'nanozon' style='color:#FFFFFF;padding-right:1cm;' align=right>";
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
    
    echo "<br><br>";

    echo "<center>";
    echo "<br><br><br>";
    echo "<img src='logo.png' style = 'width:60%; height:auto;'>";
    echo "<h1 class='nanozon2' style = 'color:#FFFFFF';>";
    echo "Enter a Halloween Costume:<br>";
    echo "</h1>";
    echo "<form action='NZ_results.php' method = 'get' placeholder = 'Enter a Halloween Costume'>";
    echo "<div>";
    echo "<input class='text' type='text' name='filter' style='width:500px;height:40px;vertical-align:middle;'>";
    echo "&nbsp&nbsp&nbsp";
    echo "<input class='button' type='submit' method='get' action='NZ_results.php' value = ' SEARCH '>";
    echo "</div>";
    echo "</form>";
    echo "</center>";
    echo "</head>";
    echo "<br>";
    echo "</html>";
?>