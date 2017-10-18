<?php
    echo "<!doctype html>";
    echo "<html>";
    
    require_once 'NZ_SearchBar.php';
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    $totPrice = 0;

    echo "<table>";
    echo "<td valign='top'>";
    echo "<h1>Your Order</h1>";
    
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
            echo "<center><img src='" . $row['itemNum']. ".jpg' style='width:100px;height:100px;'></center>";
            echo "</td>";
            echo "<td style = 'width:150px;'>";
            echo $row['itemName'];
            echo "</td>";
            echo "<td style = 'width:500px;'>";
            echo $row['description'];
            echo "</td>";
            echo "<td style = 'width:110px;'>";
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
        echo "There is nothing in your cart right now.";
    }

    

    echo "</table>";
    echo "<hr width = '100%' align='left' color=#FFA500>";  
    echo "<p align='right'>";
    echo "<font size='+2'>";
    echo "<b>";
    echo "Total Price: $";
    echo $totPrice;
    echo "</b>";
    echo "</font>";
    
    echo "</p>";
    echo "<form action='Cart.php'>";
    echo "<button style = 'background-color:#FFA500;height:50px;width:150px' type='submit'>";
    echo "<font size='+1.5'>";
    echo "<b>";
    echo "Revise Order";
    echo "</b>";
    echo "</font>";
    echo "</button>";
    echo "</form>";
    echo "</td>";
    echo "<td valign='top' width = '50%' style='padding-left:15px;'>";
    echo "<form name='billing' method = 'post' onsubmit='return formValidation()' action = 'NZ_Confirm.php' align='justify' required>";
    echo "<h1>";
    echo "Billing Address";
    echo "</h1>";
    echo "First Name:&nbsp&nbsp";
    echo "<input type='text' name='firstname' maxlength ='32' style='width:295px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRfirstname' class='error'></span>";
    
    echo "<br><br>";
    echo "Last Name:&nbsp&nbsp";
    echo "<input type='text' name='lastname' maxlength ='32' style='width:295px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRlastname' class='error'></span>";
    
    echo "<br><br>";
    echo "Street Address:&nbsp&nbsp";
    echo "<input type='text' name='address' maxlength ='70' style='width:400px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRaddress' class='error'></span>";
    
    echo "<br><br>";
    echo "City:&nbsp&nbsp";
    echo "<input type='text' name='city' maxlength ='32' style='width:295px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "State:&nbsp&nbsp";
    echo "<select name='state' size='1' style='height:25px;' required>";
    echo "<option value = '---Select State---'>--Select State---</option>";
    echo "<option value = 'Alabama'>Alabama</option>  <option value = 'Alaska'>Alaska</option>";
    echo "<option value = 'Arizona'>Arizona</option>  <option value = 'Arkansas'>Arkansas</option>";
    echo "<option value = 'California'>California</option>    <option value = 'Colorado'>Colorado</option>";
    echo "<option value = 'Connecticut'>Connecticut</option>  <option value = 'Delaware'>Delaware</option>";
    echo "<option value = 'Florida'>Florida</option>  <option value = 'Georgia'>Georgia</option>";
    echo "<option value = 'Hawaii'>Hawaii</option>    <option value = 'Idaho'>Idaho</option>";
    echo "<option value = 'Illinois'>Illinois</option>    <option value = 'Indiana'>Indiana</option>";
    echo "<option value = 'Iowa'>Iowa</option>    <option value = 'Kansas'>Kansas</option>";
    echo "<option value = 'Kentucky'>Kentucky</option>    <option value = 'Louisiana'>Louisiana</option>";
    echo "<option value = 'Maine'>Maine</option>  <option value = 'Maryland'>Maryland</option>";
    echo "<option value = 'Massachusetts'>Massachusetts</option>  <option value = 'Michigan'>Michigan</option>";
    echo "<option value = 'Minnesota'>Minnesota</option>  <option value = 'Mississippi'>Mississippi</option>";
    echo "<option value = 'Missouri'>Missouri</option>    <option value = 'Montana'>Montana</option>";
    echo "<option value = 'Nebraska'>Nebraska</option>    <option value = 'Nevada'>Nevada</option>";
    echo "<option value = 'New Hampshire'>New Hampshire</option>  <option value = 'New Jersey'>New Jersey</option>";
    echo "<option value = 'New Mexico'>New Mexico</option>    <option value = 'New York'>New York</option>";
    echo "<option value = 'North Carolina'>North Carolina</option>    <option value = 'North Dakota'>North Dakota</option>";
    echo "<option value = 'Ohio'>Ohio</option>    <option value = 'Oklahoma'>Oklahoma</option>";
    echo "<option value = 'Oregon'>Oregon</option>    <option value = 'Pennsylvania'>Pennsylvania</option>";
    echo "<option value = 'Rhode Island'>Rhode Island</option>    <option value = 'South Carolina'>South Carolina</option>";
    echo "<option value = 'South Dakota'>South Dakota</option>    <option value = 'Tennessee'>Tennessee</option>";
    echo "<option value = 'Texas'>Texas</option>  <option value = 'Utah'>Utah</option>";
    echo "<option value = 'Vermont'>Vermont</option>  <option value = 'Virginia'>Virginia</option>";
    echo "<option value = 'Washington'>Washington</option>    <option value = 'West Virgina'>West Virgina</option>";
    echo "<option value = 'Wisconsin'>Wisconsin</option>  <option value = 'Wyoming'>Wyoming</option>";
    echo "</select>";
    echo "<br>";
    echo "<span id='ERRcity' class='error'></span>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRstate' class='error'></span>";
    
    echo "<br><br>";
    echo "Zip Code:&nbsp&nbsp";
    echo "<input type='text' name='zip' maxlength ='5' style='width:100px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "Country:&nbsp&nbsp";
    echo"<input type='text' name ='country' maxlength ='40' style = 'width:10;height:25px;' required>";
    echo "<br>";
    echo "<span id='ERRzip' class='error'></span>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRcountry' class='error'></span>";
    
    echo "<br><br>";
    echo "<h1>";
    echo "Payment Information";
    echo "</h1>";
    echo "Provider:&nbsp&nbsp";
    echo "<select name='CCProvider' size='1' required>";
    echo "<option value = 'Select Provider'>Select Provider</option>";
    echo "<option value = 'AMEX'>AMEX</option>";
    echo "<option value = 'Capital One'>Capital One</option>";
    echo "<option value = 'Chase>Chase</option>";
    echo "<option value = 'Discover'>Discover</option>";
    echo "<option value = 'Visa'>Visa</option>";
    echo "</select>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRCCProvider' class='error'></span>";
    
    echo "<br><br>";
    echo "Credit Card Number:&nbsp&nbsp";
    echo "<input type='text' name='ccnum' maxlength ='16' style='width:230px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRccnum' class='error'></span>";
    
    echo "<br><br>";
    echo "Confirm Credit Card Number:&nbsp&nbsp";
    echo "<input type='text' name='confirm_ccnum' maxlength ='16' style='width:230px;height:25px;' required>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRconfirm_ccnum' class='error'></span>";
    
    echo "<br><br>";
    echo "Expiration Date:&nbsp&nbsp";
    echo "<select name='month' size='1' required>";
    echo "<option value = 'MM'>MM</option>";
    for ($i = 01; $i <= 12; $i++)
        echo "<option value = '$i'>$i</option>";
        
    echo "</select>";
    echo "/";
    echo "<select name='year' size='1'>";
    echo "<option value = 'YYYY'>YYYY</option>";
    for ($i = 2016; $i <= 2030; $i++)
        echo "<option value = '$i'>$i</option>";

    echo "</select>";
    echo "&nbsp&nbsp&nbsp";
    echo "Security Code:&nbsp&nbsp";
    echo "<input type='scnum' name='scnum' maxlength ='4' style='width:100px;height:25px;' required>";
    echo "<span id='ERRexp' class='error'></span>";
    echo "&nbsp&nbsp&nbsp";
    echo "<span id='ERRscnum' class='error'></span>";
    
    echo "<br><br>";
    echo "<font size='+1.5'>";
    echo "<b>";
    echo "<input type='submit' value = 'Pay' style = 'background-color:#FFA500;height:50px;width:150px' required>";
    echo "</b>";
    echo "</font>";
    
    /*echo "<font size='+1.5'>";
    echo "<b>";
    echo "Pay";
    echo "</b>";
    echo "</font>";*/
    echo "</input>";
    echo "</form>";
    echo "</td>";
    echo "</table>";
    
    echo "<script type = 'text/javascript'>";
    echo <<<_END
    function formValidation()
    {
        .forms["billing"]["name"].
        var fn = document.forms["billing"]["firstname"].value;
        var ln = document.forms["billing"]["lastname"].value;
        var address = document.forms["billing"]["address"].value;
        var city = document.forms["billing"]["city"].value;
        var state = document.forms["billing"]["state"].value;
        var zip = document.forms["billing"]["zip"].value;
        var country = document.forms["billing"]["country"].value;
        var provider = document.forms["billing"]["provider"].value;
        var ccnum = document.forms["billing"]["ccnum"].value;
        var confirm = document.forms["billing"]["confirm_ccnum"].value;
        var month = document.forms["billing"]["month"].value;
        var year = document.forms["billing"]["year"].value;
        var cvv = document.forms["billing"]["scnum"].value;
        
        validateFirstName(fn);
        validateLastName(ln);
        validateAddress(address);
        validateCity(city);
        validateState(state);
        validateZip(zip);
        validateCountry(country);
        validateProvider(provider);
        validateCCNum(ccnum);
        validateConfirm(ccnum,confirm);
        validateExp(month,year);
        validateScnum(cvv);

        }
    }
    function validateFirstName(fn)
    {
        if(fn==="")
        {
            document.getElementById("ERRfirstname").innerHTML = "First Name was not entered.";
        }
        else if (/[a-zA-Z]/.test(fn))
        {
            document.getElementById("ERRfirstname").innerHTML = "Please enter a valid first name.";
        }
        else
        {
            return true;
        }
    }
    function validateLastName(ln)
    {
        if(ln==="")
        {
            document.getElementById("ERRlastname").innerHTML = "Last Name was not entered.";
            return false;
        }
        else if (/[a-zA-Z-]/.test(ln))
        {
            document.getElementById("ERRlastname").innerHTML = "Please enter a valid last name.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateAddress(address)
    {
        if(address==="")
        {
            document.getElementById("ERRaddress").innerHTML = "Address was not entered.";
            return false;
        }
        else if (/[a-zA-Z0-9-]/.test(address))
        {
            document.getElementById("ERRaddress").innerHTML = "Only a-z, A-Z, 0-9, and - allowed in Address.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateCity(city)
    {
        if(city==="")
        {
            document.getElementById("ERRcity").innerHTML = "City was not entered.";
            return false;
        }
        else if (/[a-zA-Z]/.test(city))
        {
            document.getElementById("ERRcity").innerHTML = "Please enter a valid city.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateState(state)
    {
        if(state=="--Select State---")
        {
            document.getElementById("ERRstate").innerHTML = "State was not selected.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateZip(zip)
    {
        if(zip==="")
        {
            document.getElementById("ERRzip").innerHTML = "Zipcode was not entered.";
            return false;
        }
        else if (/[0-9]/.test(zip))
        {
            document.getElementById("ERRzip").innerHTML = "Please enter a vaild zipcode.";
            zip.focus();
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateCountry(country)
    {
        if(country==="")
        {
            document.getElementById("ERRcountry").innerHTML = "Country was not entered.";
            return false;
        }
        else if (/[a-zA-Z]/.test(country))
        {
            document.getElementById("ERRcountry").innerHTML = "Please enter a vaild country.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateProvider(provider)
    {
        if(provider=="Select Provider")
        {
            document.getElementById("ERRprovider").innerHTML = "Provider was not selected.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateCCNum(ccnum)
    {
        if(ccnum==="")
        {
            document.getElementById("ERRccnum").innerHTML = "Credit card number was not entered.";
            return false;
        }
        else if (/[0-9]/.test(ccnum))
        {
            document.getElementById("ERRccnum").innerHTML = "Please enter a vaild credit card number.";
            return false; 
        }
        else
        {
            return true;
        }
    }
    function validateConfirm(confirm,ccnum)
    {
        if(confirm==="")
        {
            document.getElementById("ERRconfirm_ccnum").innerHTML = "Credit card number was not entered.";
            return false;
        }
        else if (confirm != ccnum)
        {
            document.getElementById("ERRconfirm_ccnum").innerHTML = "Credit Card Numbers do not match.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateExp(month,year)
    {
        if (month=="MM" && year=="YYYY")
        {
            document.getElementById("ERRexp").innerHTML = "Month and Year were not selected.";
            return false;
        }
        else if(month=="MM")
        {
            document.getElementById("ERRexp").innerHTML = "Month was not selected.";
            return false;
        }
        else if(year=="YYYY")
        {
            document.getElementById("ERRexp").innerHTML = "Year was not selected.";
            return false;
        }
        else
        {
            return true;
        }
    }
    function validateScnum(cvv)
    {
        if (cvv==="")
        {
            document.getElementById("ERRscnum").innerHTML = "CVV was not entered.";
            return false;
        }
        else
        {
            return true;
        }
    }
_END;
    echo "</script>";
    echo >>>_END
    <style>
        span.error {
            color : red;
            size : '8pt';
        }
    </style>
_END;
    echo "</html>";
?>