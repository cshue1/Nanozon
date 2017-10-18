<?php
    session_start();
    echo "<html>";
    echo "<title>";
    echo "Nanozon | Cart";
    echo "</title>";
    
    require_once 'NZ_SearchBar.php';
    echo <<<_END
    <script>
    var back = function() {
        history.back();
      };
    </script>
_END;
    
    echo "<h1 class='nanozon'>Cart</h1>";
    echo "<button class='button' type='submit' onclick='back()'>";
    echo "BACK";
    echo "</button>";
    echo "<br> <br>";
    echo "<center>";
    echo "<table>";
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    $total = 0;
    $counter = 0;
    $max = 12;
    
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

            $check = "SELECT itemNum, qty, size FROM cart WHERE itemNum LIKE '$itemNum' AND size LIKE '$size' AND cust_id LIKE '$_SESSION[user_id]';";
            $confirm = $conn->query($check);
            if ($confirm->num_rows == 0)
            {
                $ins = "INSERT INTO cart VALUES ($_SESSION[user_id],'$itemNum','$qty','$size');";
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
                    AND size LIKE '$size'
                    AND cust_id LIKE $_SESSION[user_id]";
            $delete = $conn->query($del);
            if(!$delete)
            {
                echo "error deleting item from cart:" .
                $conn->error . "<br><br>";
            }
        }
    }

    $sql = "SELECT c.itemNum,c.qty,c.size,p.itemNum,p.itemName,p.description,p.price
            FROM cart as c,
                products as p
            WHERE c.itemNum = p.itemNum
            AND c.cust_id = $_SESSION[user_id];";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        while(($row = $result->fetch_assoc()) && ($counter++ < $max))
        {
            echo "<tr class='results' >";
            echo "<td class='results' style = 'width:120px;'>";
            echo "<center><img src='" . $row['itemNum'] . ".jpg' style=width:auto;height:100px;'></center>";
            echo "</td>";
            echo "<td class='results' style = 'width:150px;'>";
             
            //GRAB ITEM NUMBER FROM SQL TABLE
            
            echo "<center>" . $row['itemName'] . "</center>";
            echo "</td>";
            echo "<td class='results' style = 'width:500px;'>";
            
            //GRAB DESCRIPTION FROM SQL TABLE
            
            echo $row['description'];
            echo "</td>";
            echo "<td class='results' style = 'width:110px;'>";
            
            echo "<center> $" . $row['price'] . "</center>";
            echo "</td>";
            echo "<td class='results' >";
            echo "<font style='color:#808080;'>";
            echo "Qty: " . $row['qty'];
            echo "<br>";
            echo "Size: " . $row['size'];
            //GRAB QUANTITY FROM SQL TABLE 
            
            echo "<br>";
            $totPrice = $row['qty'] * $row['price'];
            echo "Price: $$totPrice";
            $total += $totPrice;
            //PRICE IS EQUAL TO  SQL PRICE TIMES SQL QUANTITY 
            
            echo "<br>";
            echo "</font>";

            echo "<form method = 'post' action='Cart.php'>";
            echo "<input type='hidden' name='insert' value='no'>";
            echo "<input type='hidden' name='counter' value='$counter'>";
            echo "<input type='hidden' name='itemNum' value=" . $row['itemNum'] . ">";
            echo "<input type='hidden' name='qty$counter' value=" . $row['qty'] . ">";
            echo "<input type='hidden' name='size$counter' value=" . $row['size'] . ">";
            echo "<input class= 'button' type='submit' name='delete$counter' value='DELETE'>";
            echo "</form>";
            

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
        echo "<hr width = '50%' align='right' color=#FFA500>";
        echo "<div class='nanozon3' align='right' style = 'padding-right:1cm;'>";
        echo "<td>";
        echo "<b>";
        echo "Total Price:&nbsp&nbsp&nbsp$";
        echo "</b>";
        echo "</td>";
        echo "<td>";
        echo "$total";
        echo "</td>";
        echo "</font>";
        echo "<br> <br>";
        echo "<form action='Checkout.php'>";
        echo "<button class='button' align ='right'>";
        echo "<font size='+1.5'>";
        echo "<b>";
        echo "CHECK OUT";
        echo "</b>";
        echo "</font>";
        echo "</button>";
        echo "</form>";     
        echo "</div>";
    } 
    else
    {
        echo "<h1 class='nanozon'>";
        echo "Your cart is empty.";
        echo "</h1>";
    }

    echo "</html>";
?>