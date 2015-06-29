//get the cookies
$(document).ready(function ()
{
    $('#login').click(function ()
    {
        var username = $("#sjsu-id").val();
        var password = $("#txt-password").val();
        $.ajax({
            type: "POST",
            url: "../Actions/executeLoginCheck.php",
            data: "name=" + username + "&pwd=" + password,
            cache: false,
            success: function (data) {
                if (data == 'true') {
                    window.location = 'userHome.php';
                }
                else {
                    alert("Invalid");
                }
            }
        });

        return false;
    });

});

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
    window.location = "../Responders/sign-in.php";
}

