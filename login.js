var attempt = 3;
var xmlhttp;
var finalid;
var finalpassword;
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
    xmlhttp.open("POST", url, true);
    xmlhttp.send();
}

//separate the function from loadDatabase
function myFunction()
{
    loadDatabase("dbconnect.php", function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            finalid = getCookie("username");
            finalpassword = getCookie("password");
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

    //used to test the cookie
    document.cookie = "username=hi";
    document.cookie = "password=hi";

    //testing comment out later
//    finalid = getCookie("username");
//    finalpassword = getCookie("password");

    if (username == finalid && password == finalpassword) {
        alert("Login successfully");
        window.location = "homepage.html";
        return false;
    }
    else {
        document.cookie = "username= ; expires=Thu, 01 Jan 1970 00:00:00 UTC";
        document.cookie = "password= ; expires=Thu, 01 Jan 1970 00:00:00 UTC";
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