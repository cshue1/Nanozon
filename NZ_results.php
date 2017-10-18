<?php
require_once 'NZ_SearchBar.php';
echo "<title>";
echo "Nanozon | Results";
echo "</title>";

echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sakila";
$counter = 0;
$max = 12;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$filter = $_GET["filter"];

$sql = "SELECT itemNum,itemName,description,price
            FROM products
            WHERE description LIKE \"%$filter%\"
                OR itemName LIKE \"%$filter%\";";
$result = $conn->query($sql);

echo <<<_END

        <script type="text/javascript">

_END;
            $kmax = 0;
            if ($result->num_rows > 0)
                $kmax = $result->num_rows;
            
            for ($k = 1 ; $k <= $kmax ; ++$k)
            {
echo <<<_END
            function formValidation$k()
            {
                var valid$k = 1;
                var qty = document.forms["cart$k"]["qty$k"].value;
                var size = document.forms["cart$k"]["size$k"].value;
                if ((qty == 0)&&(size == '----'))
                {
                    valid$k = 0;
                    document.getElementById("ERR$k").innerHTML = "Please select a size and a quantity";
                }
                else if(qty == 0)
                {
                    valid$k = 0;
                    document.getElementById("ERR$k").innerHTML = "Please select a quantity";
                }
                else if(size == '----')
                {
                    valid$k = 0;
                    document.getElementById("ERR$k").innerHTML = "Please select a size";
                }
                else
                    document.getElementById("ERR$k").innerHTML = "";
                if (!valid$k)
                    return false;
            }
_END;
            }
echo <<<_END
        </script>

    <body>
        
_END;
if ($result->num_rows > 0) {

   echo "<h2 class='nanozon2'>You searched for";
   echo "<font class='nanozon2'> '$filter':\n </font></h2>";
   echo "<span id=\"prodlist\">";
   echo "<center>";
   echo "<table class ='results' align:'center'>";
          
    // output data of each row
    while(($row = $result->fetch_assoc()) && ($counter++ < $max)) {
        $itemNum = $row["itemNum"];
        $itemName  = $row["itemName"];
        $description = $row["description"];
        $price = $row["price"];
        for ($i = 0; $i <= $kmax; $i++)
        {
            $itemName .= "&nbsp;";
        }
        echo <<<_END
        <input id="product$counter" type="hidden" value="$itemNum" />
        <tr class ='results'>
        <td class ='results' style = 'width:120px;'>
        <center>
        <a class="thumbnail" href="#thumb">
        <img src='$itemNum.jpg' style='width:auto;height:100px;'>
        <span>
        <img src='$itemNum.jpg'style='width:auto;height:700px;'>
        <br>
        $itemName
        </span>
        </a>
        </center>
        </td>
        <td class ='results' style = 'width:150px;'>
        $itemName
        </td>
        <td class ='results' style = 'width:500px;'>
        $description
        </td>
        <td class ='results' style = 'width:110px;'>
        <center>
        <form name='cart$counter' method = 'post' action="Cart.php"enctype = 'multipart/form-data' onsubmit='return formValidation$counter()'>
        <input type='hidden' name='insert' value='yes'>
        <input type='hidden' name='itemName' value='$itemName'>
        <input type='hidden' name='counter' value='$counter'>
        <input type='hidden' name='itemNum' value='$itemNum'>
        <b>
        Qty:
        </b>
        <select class='results' name="qty$counter" size='1'>
_END;
            for ($i = 0; $i < 10; $i++)
            {
                echo "<option value = '$i'>$i</option>";
            }
echo <<<_END
                
        </select>
        <br><br>
        <b>
        Size:
        </b>
        <select class='results' name='size$counter' size='1'>
        <option value = '----'>----</option>
        <option value = 'XS'>XS</option> 
        <option value = 'S'>S</option>
        <option value = 'M'>M</option>
        <option value = 'L'>L</option>
        <option value = 'XL'>XL</option> 
        </select>
        </center>
        </td>
        <td  class ='results' style = 'width:150px;'>
        <input class="button" type = submit id="button$counter" value="ADD TO CART"/>
        </form>
        </td>
        <td class ='results'>
        <span class="error" id="ERR$counter"></span>
        </td>
        </tr>
_END;

    }
    echo "</table>";
    echo "</center>";
    echo "</span>";
    

} else {
    echo "<h1 class='nanozon'>We couldn't find a costume that matched your search '$filter' :(";
    echo "<br> Please search again.</h1>";
}
echo "</body>";
echo "</script>";


$conn->close();

?>
