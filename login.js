var attempt = 3;
var xmlhttp;

//load the database with a .asp file and use the .asp file to load the cookies
function loadDatabase(url, cfunc)
{
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = cfunc;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

//separate the function from loadDatabase
function myFunction()
{
    loadDatabase("connection.asp", function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {

        }
    });
}

//get the cookies
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

//validate the login
function validate() {
    var username = document.getElementById("sjsu-id").value;
    var password = document.getElementById("txt-password").value;

    var finalid;
    var finalpassword;
    
    //used to test the cookie
    document.cookie = "username=hi";
    document.cookie = "password=hi";

    finalid = getCookie("username");
    finalpassword = getCookie("password");

    if (username == finalid && password == finalpassword) {
        alert("Login successfully");
        window.location = "homepage.html"; 
        return false;
    }
    else {
        attempt--;
        alert("You have left " + attempt + " attempt;");
        if (attempt == 0) {
            document.getElementById("sjsu-id").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("submit").disabled = true;
            return false;
        }
    }
}