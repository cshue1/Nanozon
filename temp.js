function validate()
{
    fail = validateFirstName(form.firstname.value);
    fail += validateLastName(form.lastname.value);
    fail += validateAddress(form.address.value);
    fail += validateCity(form.city.value);
    fail += validateState(form.state.value);
    fail += validateZip(form.zip.value);
    fail += validateCountry(form.country.value);
    fail += validateProvider(form.provider.value);
    fail += validateCCNum(form.ccnum.value);
    fail += validateConfirm(form.ccnum.value,form.confirm_ccnum.value);
    fail += validateMonth(form.month.value);
    fail += validateYear(form.year.value);
    fail += validateScnum(form.scnum.value);
    
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
function validateFirstName(field)
{
    if(field==="")
    {
        return "First Name was not entered.\n";
    }
    else if (/[a-zA-Z]/.test(field))
    {
        return "Please enter a valid name.\n";
    }
    else
    {
        return "";
    }
}
function validateLastName(field)
{
    if(field==="")
    {
        return "Last Name was not entered.\n";
    }
    else if (/[a-zA-Z-]/.test(field))
    {
        return "Please enter a valid name.\n";
    }
    else
    {
        return "";
    }
}
function validateAddress(field)
{
    if(field==="")
    {
        return "Address was not entered.\n";
    }
    else if (/[a-zA-Z0-9-]/.test(field))
    {
        return "Only a-z, A-Z, 0-9, and - allowed in Address.\n";
    }
    else
    {
        return "";
    }
}
function validateCity(field)
{
    if(field==="")
    {
        return "City was not entered.\n";
    }
    else if (/[a-zA-Z]/.test(field))
    {
        return "Please enter a valid city.\n";
    }
    else
    {
        return "";
    }
}
function validateState(field)
{
    if(field=="--Select State---")
    {
        return "State was not selected.\n";
    }
    else
    {
        return "";
    }
}
function validateZip(field)
{
    if(field==="")
    {
        return "Zipcode was not entered.\n";
    }
    else if (/[0-9]/.test(field))
    {
        return "Please enter a vaild zipcode.\n";
    }
    else
    {
        return "";
    }
}
function validateCountry(field)
{
    if(field==="")
    {
        return "Country was not entered.\n";
    }
    else if (/[a-zA-Z]/.test(field))
    {
        return "Please enter a vaild country.\n";
    }
    else
    {
        return "";
    }
}
function validateProvider(field)
{
    if(field=="Select Provider")
    {
        return "Provider was not selected.\n";
    }
    else
    {
        return "";
    }
}
function validateCCNum(field)
{
    if(field==="")
    {
        return "Credit card number was not entered.\n";
    }
    else if (/[0-9]/.test(field))
    {
        return "Please enter a vaild credit card number.\n";
    }
    else
    {
        return "";
    }
}
function validateConfirm(field1,field2)
{
    if(field1==="")
    {
        return "Credit card number was not entered.\n";
    }
    else if (field1 != field2)
    {
        return "Credit Card Numbers do not match.\n";
    }
    else
    {
        return "";
    }
}
function validateMonth(field)
{
    if(field=="MM")
    {
        return "Month was not selected.\n";
    }
    else
    {
        return "";
    }
}
function validateYear(field)
{
    if(field=="YYYY")
    {
        return "Year was not selected.\n";
    }
    else
    {
        return "";
    }
}
function validateScnum(field)
{
    if (field==="")
    {
        return "CVV was not entered.\n";
    }
    else
    {
        return "";
    }
}