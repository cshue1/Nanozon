<?php
    echo "<!doctype html>";
    echo "<title>";
    echo "Nanozon | Checkout";
    echo "</title>";
    echo "<html>";
    echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
    echo "<title>Checkout</title>";
    
    require_once 'NZ_SearchBar.php';
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    $totPrice = 0;

    echo "<table>";
    echo "<td valign='top'>";
    echo "<h1 class='nanozon'>Your Order</h1>";
    
    //echo "<script type = 'text/javascript' src='validateCheckout.js'></script>";
    echo "<table>";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT c.itemNum,c.qty,p.itemNum,p.itemName,p.description,p.price
            FROM cart as c,
                products as p
            WHERE c.itemNum = p.itemNum;";
    $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td style = 'width:120px;'>";
            echo "<center><img src='" . $row['itemNum']. ".jpg' style='width:auto;height:100px;'></center>";
            echo "</td>";
            echo "<td class='results' style = 'width:150px;'>";
            echo $row['itemName'];
            echo "</td>";
            echo "<td class='results' style = 'width:500px;'>";
            echo $row['description'];
            echo "</td>";
            echo "<td class='results'style = 'width:110px;'>";
            //echo "<center>";
            echo "$" . $row['price'];
            echo "<br>";
            echo "<font style='color:#808080;'>";
            echo "Qty: " . $row['qty'];
            echo "<br>";
            $total = $row['price'] * $row['qty'];
            echo "Price: $" . $total; 
            echo "<br>";
            echo "</font>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            $totPrice += $total;
        }
    }
    else
    {
        echo "<h1 class='nanozon'>";
        echo "Your cart is empty.";
        echo "</h1>";
    }

    

    echo "</table>";
    echo "<hr width = '100%' align='left' color=#FFA500>";  
    echo "<p align='right'>";
    echo "<font class='nanozon2' size='+2'>";
    echo "<b>";
    echo "Total Price: $";
    echo $totPrice;
    echo "</b>";
    echo "</font>";
    
    echo "</p>";
    echo "<form action='Cart.php'>";
    echo "<button class='button' type='submit'>";
    echo "Revise Order";
    echo "</button>";
    echo "</form>";
    echo "</td>";
    echo "<td class='nanozon' valign='top' width = '50%' style='padding-left:15px;'>";
    echo "<form name='billing' action = 'NZ_Confirm.php' method = 'post' align='justify' enctype = 'multipart/form-data'  onsubmit='return formValidation()'>";
    echo "<h1 class='nanozon'>";
    echo "Billing Address";
    echo "</h1>";
    echo "First Name:&nbsp&nbsp";
    echo "<input class='text' type='text' name='firstname' maxlength ='32' style='width:295px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRfirstname' class='error'></span>";
    
    echo "<br><br>";
    echo "Last Name:&nbsp&nbsp";
    echo "<input class='text' type='text' name='lastname' maxlength ='32' style='width:295px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRlastname' class='error'></span>";
    
    echo "<br><br>";
    echo "Street Address:&nbsp&nbsp";
    echo "<input class='text' type='text' name='address' maxlength ='70' style='width:400px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRaddress' class='error'></span>";
    
    echo "<br><br>";
    echo "City:&nbsp&nbsp";
    echo "<input class='text' type='text' name='city' maxlength ='32' style='width:295px;height:25px;' value = '' >";
    echo "&nbsp&nbsp&nbsp";
    echo "State:&nbsp&nbsp";
    echo "<select class='results' name='state' size='1' required>";
    echo "<option value = '---Select State---'>---Select State---</option>";
    echo "<option value = 'AL'>ALABAMA</option>  <option value = 'AK'>ALASKA</option>";
    echo "<option value = 'AZ'>ARIZONA</option>  <option value = 'AR'>ARKANSAS</option>";
    echo "<option value = 'CA'>CALIFORNIA</option>    <option value = 'CO'>COLORADO</option>";
    echo "<option value = 'CT'>CONNECTICUT</option>  <option value = 'DE'>DELAWARE</option>";
    echo "<option value = 'FL'>FLORIDA</option>  <option value = 'GA'>GEORGIA</option>";
    echo "<option value = 'HI'>HAWAII</option>    <option value = 'ID'>IDAHO</option>";
    echo "<option value = 'IL'>ILLINOIS</option>    <option value = 'IN'>INDIANA</option>";
    echo "<option value = 'IA'>IOWA</option>    <option value = 'KS'>KANSAS</option>";
    echo "<option value = 'KY'>KENTUCKY</option>    <option value = 'LA'>LOUISIANA</option>";
    echo "<option value = 'ME'>MAINE</option>  <option value = 'MD'>MARYLAND</option>";
    echo "<option value = 'MA'>MASSACHUSETTS</option>  <option value = 'MI'>Michigan</option>";
    echo "<option value = 'MI'>MINNESOTA</option>  <option value = 'MS'>MISSISSIPPI</option>";
    echo "<option value = 'MO'>MISSOURI</option>    <option value = 'MT'>MONTANA</option>";
    echo "<option value = 'NE'>NEBRASKA</option>    <option value = 'NV'>NEVADA</option>";
    echo "<option value = 'NH'>NEW HAMPSHIRE</option>  <option value = 'NJ'>NEW JERSEY</option>";
    echo "<option value = 'NM'>NEW MEXICO</option>    <option value = 'NY'>NEW YORK</option>";
    echo "<option value = 'NC'>NORTH CAROLINA</option>    <option value = 'ND'>NORTH DAKOTA</option>";
    echo "<option value = 'OH'>OHIO</option>    <option value = 'OK'>OKLAHOMA</option>";
    echo "<option value = 'OR'>OREGON</option>    <option value = 'PA'>PENNSYLVANIA</option>";
    echo "<option value = 'RI'>RHODE ISLAND</option>    <option value = 'SC'>SOUTH CAROLINA</option>";
    echo "<option value = 'SD'>SOUTH DAKOTA</option>    <option value = 'TN'>TENNESSEE</option>";
    echo "<option value = 'TS'>TEXAS</option>  <option value = 'UT'>UTAH</option>";
    echo "<option value = 'VT'>VERMONT</option>  <option value = 'VA'>VIRGINIA</option>";
    echo "<option value = 'WA'>WASHINGTON</option>    <option value = 'WA'>WEST VIRGINIA</option>";
    echo "<option value = 'WI'>WISCONSIN</option>  <option value = 'WY'>WYOMING</option>";
    echo "</select>";
    echo "<br>";
    echo "<span id='ERRcity' class='error'></span>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<span id='ERRstate' class='error'></span>";
    
    echo "<br><br>";
    echo "Zip Code:&nbsp&nbsp";
    echo "<input class='text' type='text' name='zip' maxlength ='5' style='width:100px;height:25px;' value = '' >";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "Country:&nbsp&nbsp";
    echo"<input class='text' type='text' name ='country' maxlength ='40' style = 'width:10;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRzip' class='error'></span>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<span id='ERRcountry' class='error'></span>";
    
    echo "<br><br>";
    echo "<h1 class='nanozon'>";
    echo "Payment Information";
    echo "</h1>";
    echo "Provider:&nbsp&nbsp";
    echo "<select class='results' name='CCProvider' size='1' >";
    echo "<option value = 'Select Provider'>Select Provider</option>";
    echo "<option value = 'AMEX'>AMEX</option>";
    echo "<option value = 'Capital One'>CAPITAL ONE</option>";
    echo "<option value = 'Chase>CHASE</option>";
    echo "<option value = 'Discover'>DISCOVER</option>";
    echo "<option value = 'Visa'>VISA</option>";
    echo "</select>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRCCProvider' class='error'></span>";
    
    echo "<br><br>";
    echo "Credit Card Number:&nbsp&nbsp";
    echo "<input class='text' type='text' name='ccnum' maxlength ='16' style='width:230px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRccnum' class='error'></span>";
    
    echo "<br><br>";
    echo "Confirm Credit Card Number:&nbsp&nbsp";
    echo "<input class='text' type='text' name='confirm_ccnum' maxlength ='16' style='width:230px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRconfirm_ccnum' class='error'></span>";
    
    echo "<br><br>";
    echo "Expiration Date:&nbsp&nbsp";
    echo "<select class='results' name='month' size='1' >";
    echo "<option value = 'MM'>MM</option>";
    for ($i = 01; $i <= 12; $i++)
        echo "<option value = '$i'>$i</option>";
        
    echo "</select>";
    echo "/";
    echo "<select class='results' name='year' size='1' >";
    echo "<option value = 'YYYY'>YYYY</option>";
    for ($i = 2016; $i <= 2030; $i++)
        echo "<option value = '$i'>$i</option>";

    echo "</select>";
    echo "&nbsp&nbsp&nbsp";
    echo "Security Code:&nbsp&nbsp";
    echo "<input class='text' type='scnum' name='scnum' maxlength ='4' style='width:100px;height:25px;' value = '' >";
    echo "<br>";
    echo "<span id='ERRexp' class='error'></span>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<span id='ERRscnum' class='error'></span>";
    
    echo "<br><br>";
    echo "<input class = 'button' type = 'submit' value = '&nbsp&nbsp&nbsp PAY &nbsp&nbsp&nbsp'>";
    echo "</input>";
    echo "</form>";
    echo "</td>";
    echo "</table>";
    
    echo "<script type = 'text/javascript'>";
    echo <<<_END
    function formValidation()
    {
        var valid = 1;
        var fn = document.forms["billing"]["firstname"].value;
        var ln = document.forms["billing"]["lastname"].value;
        var address = document.forms["billing"]["address"].value;
        var city = document.forms["billing"]["city"].value;
        var state = document.forms["billing"]["state"].value;
        var zip = document.forms["billing"]["zip"].value;
        var country = document.forms["billing"]["country"].value;
        var provider = document.forms["billing"]["CCProvider"].value;
        var ccnum = document.forms["billing"]["ccnum"].value;
        var confirm = document.forms["billing"]["confirm_ccnum"].value;
        var month = document.forms["billing"]["month"].value;
        var year = document.forms["billing"]["year"].value;
        var cvv = document.forms["billing"]["scnum"].value;
        

        if(fn==="")
        {
            valid = 0;
            document.getElementById("ERRfirstname").innerHTML = "First Name was not entered.";
        }
        else if (!/[a-zA-Z]/.test(fn))
        {
            valid = 0;
            document.getElementById("ERRfirstname").innerHTML = "Please enter a valid first name.";
        }
        else
        {
            document.getElementById("ERRfirstname").innerHTML = "";
        }

        if(ln==="")
        {
            valid = 0;
            document.getElementById("ERRlastname").innerHTML = "Last Name was not entered.";
        }
        else if (!/[a-zA-Z-]/.test(ln))
        {
            valid = 0;
            document.getElementById("ERRlastname").innerHTML = "Please enter a valid last name.";
        }
        else
        {
            document.getElementById("ERRlastname").innerHTML = "";
        }

        if(address==="")
        {
            valid = 0;
            document.getElementById("ERRaddress").innerHTML = "Address was not entered.";
        }
        else if (!/[a-zA-Z0-9-]/.test(address))
        {
            valid = 0;
            document.getElementById("ERRaddress").innerHTML = "Only a-z, A-Z, 0-9, and - allowed in Address.";
        }
        else
        {
            document.getElementById("ERRaddress").innerHTML = "";
        }
        
        if(city==="")
        {
            valid = 0;
            document.getElementById("ERRcity").innerHTML = "City was not entered.";
        }
        else if (!/[a-zA-Z]/.test(city))
        {
            valid = 0;
            document.getElementById("ERRcity").innerHTML = "Please enter a valid city.";
        }
        else
        {
            document.getElementById("ERRcity").innerHTML = "";
        }

        if(state=="---Select State---")
        {
            valid = 0;
            document.getElementById("ERRstate").innerHTML = "State was not selected.";
        }
        else
        {
            document.getElementById("ERRstate").innerHTML = "";
        }

        if(zip==="")
        {
            valid = 0;
            document.getElementById("ERRzip").innerHTML = "Zipcode was not entered.";
        }
        else if (!  /[0-9]/.test(zip))
        {
            valid = 0;
            document.getElementById("ERRzip").innerHTML = "Please enter a vaild zipcode.";
        }
        else
        {
            document.getElementById("ERRzip").innerHTML = "";
        }

        if(country==="")
        {
            valid = 0;
            document.getElementById("ERRcountry").innerHTML = "Country was not entered.";
        }
        else if (!/[a-zA-Z]/.test(country))
        {
            valid = 0;
            document.getElementById("ERRcountry").innerHTML = "Please enter a vaild country.";
        }
        else
        {
            document.getElementById("ERRcountry").innerHTML = "";
        }

        if(provider=="Select Provider")
        {
            valid = 0;
            document.getElementById("ERRCCProvider").innerHTML = "Provider was not selected.";
        }
        else
        {
            document.getElementById("ERRCCProvider").innerHTML = "";
        }

        if(ccnum==="")
        {
            valid = 0;
            document.getElementById("ERRccnum").innerHTML = "Credit card number was not entered.";
        }
        else if (!/[0-9]/.test(ccnum))
        {
            valid = 0;
            document.getElementById("ERRccnum").innerHTML = "Please enter a vaild credit card number.";
        }
        else
        {
            document.getElementById("ERRccnum").innerHTML = "";
        }

        if(confirm==="")
        {
            valid = 0;
            document.getElementById("ERRconfirm_ccnum").innerHTML = "Credit card number was not entered.";
        }
        else if (confirm != ccnum)
        {
            valid = 0;
            document.getElementById("ERRconfirm_ccnum").innerHTML = "Credit Card Numbers do not match.";
        }
        else
        {
            document.getElementById("ERRconfirm_ccnum").innerHTML = "";
        }

        if (month=="MM" && year=="YYYY")
        {
            valid = 0;
            document.getElementById("ERRexp").innerHTML = "Month and Year were not selected.";
        }
        else if(month=="MM")
        {
            valid = 0;
            document.getElementById("ERRexp").innerHTML = "Month was not selected.";
        }
        else if(year=="YYYY")
        {
            valid = 0;
            document.getElementById("ERRexp").innerHTML = "Year was not selected.";
        }
        else
        {
            document.getElementById("ERRexp").innerHTML = "";
        }

        if (cvv==="")
        {
            valid = 0;
            document.getElementById("ERRscnum").innerHTML = "CVV was not entered.";
        }
        else
        {
            document.getElementById("ERRscnum").innerHTML = "";
        }
            
        if (!valid)
            return false;

    }
_END;
    echo "</script>";
    echo "</html>";
?>