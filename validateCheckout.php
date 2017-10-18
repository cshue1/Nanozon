    echo "<script type = 'text/javascript'>";
    echo <<<_END
    function formValidation()
    {
        var fn = document.getElementById("firstname");
        var ln = document.getElementById("name");
        var address = document.getElementById("address");
        var city = document.getElementById("city");
        var state = document.getElementById("state");
        var zip = document.getElementById("zip");
        var country = document.getElementById("country");
        var provider = document.getElementById("provider");
        var ccnum = document.getElementById("ccnum");
        var confirm = document.getElementById("confirm_ccnum");
        var month = document.getElementById("month");
        var year = document.getElementById("year");
        var cvv = document.getElementById("scnum");
        fail = validateFirstName(fn);
        fail += validateLastName(ln);
        fail += validateAddress(address);
        fail += validateCity(city);
        fail += validateState(state);
        fail += validateZip(zip);
        fail += validateCountry(country);
        fail += validateProvider(provider);
        fail += validateCCNum(ccnum);
        fail += validateConfirm(confirm,ccnum);
        fail += validateExp(month,year);
        fail += validateScnum(cvv);
        
        if (fail==="")
        {
            return true;        
        }
        else
        {
            alert(fail);
            focus();
            return false;
        }
    }
    function validateFirstName(fn)
    {
        if(fn==="")
        {
            return "First Name was not entered.";
        }
        else if (/[a-zA-Z]/.test(fn))
        {
            return "Please enter a valid name.";
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
            return "Last Name was not entered.";
        }
        else if (/[a-zA-Z-]/.test(ln))
        {
            return "Please enter a valid name.";
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
            return "Address was not entered.";
        }
        else if (/[a-zA-Z0-9-]/.test(address))
        {
            return "Only a-z, A-Z, 0-9, and - allowed in Address.";
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
            return "City was not entered.";
        }
        else if (/[a-zA-Z]/.test(city))
        {
            return "Please enter a valid city.";
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
            return "State was not selected.";
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
            return "Zipcode was not entered.";
        }
        else if (/[0-9]/.test(zip))
        {
            return "Please enter a vaild zipcode.";
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
            return "Country was not entered.";
        }
        else if (/[a-zA-Z]/.test(country))
        {
            return "Please enter a vaild country.";
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
            return "Provider was not selected.";
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
            return "Credit card number was not entered.";
        }
        else if (/[0-9]/.test(ccnum))
        {
            return "Please enter a vaild credit card number.";
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
            return "Credit card number was not entered.";
        }
        else if (confirm != ccnum)
        {
            return "Credit Card Numbers do not match.";
        }
        else
        {
            return true;
        }
    }
    function validateExp(month,year)
    {
        if(month=="MM")
        {
            return "Month was not selected.";
        }
        else if(year=="YYYY")
        {
            return "Year was not selected.";
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
            return "CVV was not entered.";
        }
        else
        {
            return true;
        }
    }
_END;
    echo "</script>";