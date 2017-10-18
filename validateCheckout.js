function formValidation()
{
    var fn = document.billing.firstname;
    var ln = document.billing.lastname;
    var address = document.billing.address;
    var city = document.billing.city;
    var state = document.billing.state;
    var zip = document.billing.zip;
    var country = document.billing.country;
    var provider = document.billing.provider;
    var ccnum = document.billing.ccnum;
    var confirm = document.billing.confirm_ccnum;
    var month = document.billing.month;
    var year = document.billing.year;
    var cvv = document.billing.scnum;
    
    if (validateFirstName(fn))
    {
        if(validateLastName(ln))
        {
            if(validateAddress(address))
            {
                if(validateCity(city))
                {
                    if(validateState(state))
                    {
                        if(validateZip(zip))
                        {
                            if(validateCountry(country))
                            {
                                if(validateProvider(provider))
                                {
                                    if(validateCCNum(ccnum))
                                    {
                                        if(validateConfirm(ccnum,confirm))
                                        {
                                            if(validateExp(month,year))
                                            {
                                                if(validateScnum(cvv))
                                                {
                                                    return true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
}
function validateFirstName(fn)
{
    if(fn==="")
    {
        document.getElementByID("ERRfirstname").innerHTML = "First Name was not entered.";
        return false;
    }
    else if (/[a-zA-Z]/.test(fn))
    {
        document.getElementByID("ERRfirstname").innerHTML = "Please enter a valid name.";
        return false;
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
        document.getElementByID("ERRlastname").innerHTML = "Last Name was not entered.";
        ln.focus();
        return false;
    }
    else if (/[a-zA-Z-]/.test(ln))
    {
        document.getElementByID("ERRlastname").innerHTML = "Please enter a valid name.";
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
        document.getElementByID("ERRaddress").innerHTML = "Address was not entered.";
        return false;
    }
    else if (/[a-zA-Z0-9-]/.test(address))
    {
        document.getElementByID("ERRaddress").innerHTML = "Only a-z, A-Z, 0-9, and - allowed in Address.";
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
        document.getElementByID("ERRcity").innerHTML = "City was not entered.";
        return false;
    }
    else if (/[a-zA-Z]/.test(city))
    {
        document.getElementByID("ERRcity").innerHTML = "Please enter a valid city.";
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
        document.getElementByID("ERRstate").innerHTML = "State was not selected.";
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
        document.getElementByID("ERRzip").innerHTML = "Zipcode was not entered.";
        return false;
    }
    else if (/[0-9]/.test(zip))
    {
        document.getElementByID("ERRzip").innerHTML = "Please enter a vaild zipcode.";
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
        document.getElementByID("ERRcountry").innerHTML = "Country was not entered.";
        return false;
    }
    else if (/[a-zA-Z]/.test(country))
    {
        document.getElementByID("ERRcountry").innerHTML = "Please enter a vaild country.";
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
        document.getElementByID("ERRprovider").innerHTML = "Provider was not selected.";
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
        document.getElementByID("ERRccnum").innerHTML = "Credit card number was not entered.";
        return false;
    }
    else if (/[0-9]/.test(ccnum))
    {
        document.getElementByID("ERRccnum").innerHTML = "Please enter a vaild credit card number.";
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
        document.getElementByID("ERRconfirm_ccnum").innerHTML = "Credit card number was not entered.";
        return false;
    }
    else if (confirm != ccnum)
    {
        document.getElementByID("ERRconfirm_ccnum").innerHTML = "Credit Card Numbers do not match.";
        return false;
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
        document.getElementByID("ERRexp").innerHTML = "Month was not selected.";
        return false;
    }
    else if(year=="YYYY")
    {
        window.alert("Year was not selected.");
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
        document.getElementByID("ERRscnum").innerHTML = "CVV was not entered.";
        return false;
    }
    else
    {
        return true;
    }
}