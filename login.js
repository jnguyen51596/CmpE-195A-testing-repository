var attempt = 3;
var xmlhttp;
var finalid;
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
function validate()
{

    loadDatabase("dbconnect.php", function ()
    {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {

            validate2();
        }
        else
        {

        }
    });
}

function validate2()
{
    var username = document.getElementById("sjsu-id").value;
    finalid = getCookie("username");
    if (username == finalid)
    {
        alert("Login Successful");
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
        document.getElementById("login").reset();
    }
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


function logout()
{
    document.cookie = "username= ; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    window.location = "sign-in.html";
}



